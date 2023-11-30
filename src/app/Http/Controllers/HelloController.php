<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
    public function hello()
    {
        // return view("welcome");
        return response()->json(['users' => User::all()]);
        //return response()->json(['users' => 'table']);
    }
}
