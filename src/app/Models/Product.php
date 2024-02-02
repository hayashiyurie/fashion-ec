<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Notifiable;
    protected $table = "products";

    // @var array<int, string>
    protected $fillable = [
        'product_name',
        'explanation',
        'tax_included_price',
        'jan_code',
        'sku_code'
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function productImages()
    {
        //Products_imageモデルのデータを取得する
        return $this->hasMany(Products_image::class);
    }

    public function productInventoryManagement()
    {
        //Products_imageモデルのデータを取得する
        return $this->hasOne(Product_inventory_management::class);
    }
    public function genre()
    {
        //Genreモデルのデータを取得する
        return $this->belongsTo(Genre::class);
    }
    public function orderProduct()
    {
        //orderProductsモデルのデータを取得する
        return $this->hasOne(OrderProduct::class);
    }
}
