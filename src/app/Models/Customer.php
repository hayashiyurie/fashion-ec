<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'postcode',
        'address',
        'phone_number',
        'email',
        'password'
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function order()
    {
        //orderモデルのデータを取得する
        return $this->hasMany(Order::class, 'customer_id');
    }
}
