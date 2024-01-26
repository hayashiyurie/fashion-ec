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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable()->after('id');
            $table->foreign('customer_id')->references('id')->on('customers')->comment('会員ID');
            // $table->text('customer_id')->nullable()->change();//todo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            // 既にテーブルの対象カラムにNULLを登録しているならば必要
            // DB::statement('UPDATE `orders` SET `customer_id` = "" WHERE `customer_id` IS NULL');//todo?
            // $table->text('customer_id')->nullable(false)->change();//todo
        });
    }
};
