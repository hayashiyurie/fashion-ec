<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'postage',
        'billing_amount',
        'method_of_payment',
        'destinations_name',
        'destinations_postcode',
        'destinations_address',
        'order_status',
    ];
}
