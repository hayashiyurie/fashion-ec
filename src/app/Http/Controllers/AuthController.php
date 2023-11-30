<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login'
            ], 401);
        }

        $customer = Customer::where('email', $request['email'])->firstOrFail();
        $request->session()->regenerate();
        return response()->json([
            'access' => $customer,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
    }

    // public function me(Request $request)
    // {
    //     return $request->customoer();
    // }
}
