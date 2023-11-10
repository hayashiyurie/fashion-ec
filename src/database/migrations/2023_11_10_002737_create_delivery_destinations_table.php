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
        Schema::create('delivery_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->string('destinations_name')->comment('宛名');
            $table->string('destinations_postcode')->comment('配送先郵便番号');
            $table->string('destinations_address')->comment('配送先住所');
            $table->dateTime('signup_at')->comment('登録日');
            $table->dateTime('updated_at')->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_destinations');
    }
};
