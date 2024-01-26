<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    /**
     * 注文履歴
     */
    public function orderHistory(Request $request)
    {
        $customerId = $request->customerId;
        $orderHistory = Order::with(['customer'])

            ->when($customerId, function ($query, $customerId) {
                return $query->where('customer_id', '=', $customerId);
            })->get();

        return response()->json([
            'orderHistory' => $orderHistory,
        ]);
    }

    /**
     * 注文詳細履歴
     */
    public function searchHistoryDetails(Request $request, $id)
    {
        $orderId = $request->orderId;
        $order = Order::with(['customer', 'deliveryDestination'])
            ->when($orderId, function ($query, $orderId) {
                return $query->where('order_id', '=', $orderId);
            })->find($id);

        $orderId = $request->OrderId;
        $orderProducts = OrderProduct::with(['product.productImages.image'])
            ->when($orderId, function ($query, $orderId) {
                return $query->where('order_id', '=', $orderId);
            })->get();

        return response()->json([
            'order' => $order,
            'orderProducts' => $orderProducts
        ]);
    }
}
