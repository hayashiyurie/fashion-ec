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

        $order = Order::with(['customer'])->find($id);

        $orderProducts = OrderProduct::with(['product.productImages.image'])
            ->when($id, function ($query, $id) {
                return $query->where('order_id', '=', $id);
            })->get();

        return response()->json([
            'orderDetail' => $order,
            'orderProducts' => $orderProducts
        ]);
    }
}
