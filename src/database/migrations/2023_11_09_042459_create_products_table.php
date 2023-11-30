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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained('genres');
            $table->string('product_name')->comment('商品の名前');
            $table->string('explanation')->comment('説明');
            $table->string('tax_included_price')->comment('税込価格');
            $table->string('jan_code')->comment('janコード');
            $table->string('sku_code')->comment('skuコード');
            $table->dateTime('created_at')->nullable()->comment('登録日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
