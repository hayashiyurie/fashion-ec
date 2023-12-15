<?php

namespace App\Http\Controllers;

use App\Models\Delivery_destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function storeDeliveryDestination(Request $request)
    {

        $validatedData = $request->validate([
            'destinations_name' => 'required|string|max:255',
            'destinations_postcode' => 'required|string|max:9',
            'destinations_address' => 'required|string|max:225',
            // 'phone_number' => 'required|string|regex:/^0[789]0\d{8}$/',
        ]);

        Delivery_destination::create([
            'customer_id' => Auth::user()->id,
            'destinations_name' => $validatedData['destinations_name'],
            'destinations_postcode' => $validatedData['destinations_postcode'],
            'destinations_address' => $validatedData['destinations_address'],
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
