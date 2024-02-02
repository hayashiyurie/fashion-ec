<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'postage',
        'billing_amount',
        'method_of_payment',
        'destinations_name',
        'destinations_postcode',
        'destinations_address',
        'order_status',
    ];
    public function product()
    {
        //Productモデルのデータを取得する
        return $this->hasMany(Product::class);
    }
    public function productImages()
    {
        //Products_imageモデルのデータを取得する
        return $this->hasMany(Products_image::class);
    }
    // public function sizes()
    // {
    //     //sizeモデルのデータを取得する
    //     return $this->belongsTo(Size::class);
    // }
    // public function colors()
    // {
    //     //colorモデルのデータを取得する
    //     return $this->belongsTo(Color::class);
    // }
    public function customer()
    {
        //customerモデルのデータを取得する
        return $this->belongsTo(Customer::class);
    }
    public function orderProduct()
    {
        //orderProductsモデルのデータを取得する
        return $this->hasMany(OrderProduct::class);
    }
    public function deliveryDestination()
    {
        //Delivery_destinstionモデルのデータを取得する
        return $this->belongsTo(Delivery_destination::class);
    }
}
