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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->comment('姓');
            $table->string('first_name')->comment('名');
            $table->string('last_name_kana')->nullable()->comment('フリガナ(姓)');
            $table->string('first_name_kana')->nullable()->comment('フリガナ(名)');
            $table->string('postcode')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->string('phone_number')->nullable()->comment('電話番号');
            $table->string('email')->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
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
        Schema::dropIfExists('customers');
    }
};
