<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('number_of_products')->comment('商品の個数');
            $table->string('tax_included_purchase_price')->comment('購入時価格(税込)');
            $table->string('order_product_status')->comment('注文商品ステータス');
            $table->dateTime('signup_at')->comment('登録日');
            $table->dateTime('updated_at')->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
