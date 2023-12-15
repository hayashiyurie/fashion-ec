<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_destination extends Model
{
    protected $fillable = [
        'customer_id',
        'destinations_name',
        'destinations_postcode',
        'destinations_address'
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
