<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Delivery_destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    //配送先一覧表示API
    public function deliveryDestinationList(Request $request)
    {
        return response()->json(['delivery_destinations' => Delivery_destination::all()]);
    }
}
