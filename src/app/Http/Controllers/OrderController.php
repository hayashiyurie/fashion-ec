<?php

namespace App\Http\Controllers;

use App\Models\Delivery_destination;
use App\Models\Order;
use App\Models\OrderProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use App\Models\Products_image;
use App\Models\Image;

class OrderController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret_key'));
    }

    public function order(Request $request)
    {
        $paymentMethodId = $request->input('payment_method_id');
        $amount = $request->input('amount');
        $deliveryDestinationId = $request->input('delivery_destination_id');

        // StripeのPaymentIntentを作成して支払いを確定させる
        $paymentIntent = $this->stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'JPY',
            'payment_method' => $paymentMethodId,
            // 'confirmation_method' => 'manual',
            // 'confirm' => true,
            'automatic_payment_methods' => [
                'enabled' => true,
                'allow_redirects' => 'never',
            ],
        ]);
        $paymentIntent->confirm();


        // 支払いが成功した場合
        if ($paymentIntent->status === 'succeeded') {
            // 注文テーブルに注文情報を入れる
            $validatedData = $request->validate([
                'products' => 'required'
            ]);
            $deliveryDestination = Delivery_destination::find($deliveryDestinationId);
            DB::transaction(function () use ($amount, $deliveryDestination, $validatedData) {
                $order = new Order;
                $order->fill([
                    'postage' => 400, //TODO: 商品毎の送料を使うようにする
                    'billing_amount' => $amount,
                    'method_of_payment' => 'card',
                    'destinations_name' => $deliveryDestination->destinations_name,
                    'destinations_postcode' => $deliveryDestination->destinations_postcode,
                    'destinations_address' => $deliveryDestination->destinations_address,
                    'order_status' => '配送準備中'
                ])->save();
                foreach ($validatedData['products'] as $product) {
                    OrderProduct::create([
                        'product_id' => $product['product_id'],
                        'order_id' => $order->id,
                        'number_of_products' => $product['quantity'],
                        'tax_included_purchase_price' => $product['sum_price'],
                        'order_product_status' =>  '配送準備中' // TODO: コード値で持たせる方がいい？
                    ]);
                }
            });
            return response()->json(['success' => true, 'message' => 'Payment succeeded']);
        } else {
            return response()->json(['success' => false, 'message' => 'Payment failed']);
        }
    }
}
