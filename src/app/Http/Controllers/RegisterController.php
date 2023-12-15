<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // \Log::info($request);
        $validatedData = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'password' => 'required|string|min:8',
        ]);

        Customer::create([
            'last_name' => $validatedData['last_name'],
            'first_name' => $validatedData['first_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),

        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    // public function store(Request $request)
    // {
    //     $inputs = $request->validate([
    //         'last_name' => 'required|string|max:255',
    //         'first_name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     try {
    //         $customer = new Customer();
    //         $customer->last_name = $inputs['last_name'];
    //         $customer->first_name = $inputs['first_name'];
    //         $customer->email = $inputs['email'];
    //         $customer->password = $inputs['password'];
    //         $customer->save();
    //         return redirect()->route('customer_register')->with('message', '登録が完了しました！');
    //     } catch (\Exception $e) {
    //         return back()->with('message', '登録に失敗しました。' . $e->getMessage());
    //     }
    //     return redirect()->route('register');
    // }
}
