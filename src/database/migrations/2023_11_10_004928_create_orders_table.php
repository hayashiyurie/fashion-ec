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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('postage')->comment('送料');
            $table->integer('billing_amount')->comment('請求額');
            $table->string('method_of_payment')->comment('支払い方法');
            $table->string('destinations_name')->comment('宛名');
            $table->string('destinations_postcode')->comment('配送先郵便番号');
            $table->string('destinations_address')->comment('配送先住所');
            $table->string('order_status')->comment('注文ステータス');
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
        Schema::dropIfExists('orders');
    }
};
