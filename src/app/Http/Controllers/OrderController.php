<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\PaymentIntent;

class OrderController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret_key'));
    }

    public function order(Request $request)
    {
        // return response()->json(['orders' => Order::all()]);

        $paymentMethodId = $request->input('payment_method_id');
        $amount = $request->input('amount');

        // StripeのPaymentIntentを作成して支払いを確定させる
        $paymentIntent = $this->stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'JPY',
            'payment_method' => $paymentMethodId,
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

        // 支払いが成功した場合
        if ($paymentIntent->status === 'succeeded') {
            // 注文テーブルに注文情報を入れる
            $validatedData = $request->validate([
                'products' => 'required'
            ]);
            Order::create([
                'postage' => $validatedData['postage'],
                'billing_amount' => $validatedData['billing_amount'],
                'method_of_payment' => $validatedData['method_of_payment'],
                'destinations_name' => $validatedData['destinations_name'],
                'destinations_postcode' => $validatedData['destinations_postcode'],
                'destinations_address' => $validatedData['destinations_address'],
                'order_status' => $validatedData['order_status']
            ]);
            foreach ($validatedData['products'] as $product) {
                OrderProduct::create([
                    'product_id' => $validatedData['product_id'],
                    'order_id' => $validatedData['order_id'],
                    'number_of_products' => $validatedData['number_of_products'],
                    'tax_included_purchase_price' => $validatedData['tax_included_purchase_price'],
                    'order_product_status' => $validatedData['order_product_statu']
                ]);
            }
            // Order::create($paymentIntent->status);
            return response()->json(['success' => true, 'message' => 'Payment succeeded']);
        } else {
            return response()->json(['success' => false, 'message' => 'Payment failed']);
        }
    }
}
