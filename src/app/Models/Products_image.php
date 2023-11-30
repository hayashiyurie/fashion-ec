<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Products_image extends Model
{
    use HasFactory, Notifiable;
    protected $table = "products_images";

    // @var array<int, string>
    protected $fillable = [
        'product_id',
        'image_id',
        'sort_order'
    ];

    public function image()
    {
        //Imageモデルのデータを取得する
        return $this->belongsTo(Image::class);
    }
}
