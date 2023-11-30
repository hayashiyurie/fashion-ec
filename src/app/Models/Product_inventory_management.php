<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product_inventory_management extends Model
{
    use HasFactory, Notifiable;
    protected $table = "product_inventory_managements";

    protected $fillable = [
        'product_id',
        'number_of_stock',
    ];

    protected $guarded = [
        'signup_at',
        'updated_at',
        'deleted_at'
    ];
}
