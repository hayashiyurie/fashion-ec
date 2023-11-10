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
            $table->string('last_name_kana')->comment('フリガナ(姓)');
            $table->string('first_name_kana')->comment('フリガナ(名)');
            $table->string('postcode')->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('phone_number')->comment('電話番号');
            $table->string('email')->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->dateTime('signup_at')->comment('登録日');
            $table->dateTime('updated_at')->comment('更新日');
            $table->dateTime('deleted_at')->comment('削除日');
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
