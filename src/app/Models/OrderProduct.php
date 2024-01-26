<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'number_of_products',
        'tax_included_purchase_price',
        'order_product_status'
    ];
    public function product()
    {
        //Productsモデルのデータを取得する
        return $this->belongsTo(Product::class);
    }
    public function productImages()
    {
        //Products_imageモデルのデータを取得する
        return $this->hasMany(Products_image::class);
    }
    public function order()
    {
        //Ordersモデルのデータを取得する
        return $this->belongsTo(Order::class);
    }
}
