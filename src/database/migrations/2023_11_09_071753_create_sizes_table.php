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
        Schema::create('size_genres', function (Blueprint $table) {
            $table->id();
            $table->string('size_genre_name')->comment('サイズジャンル名');
            $table->dateTime('created_at')->nullable()->comment('登録日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
            // $table->string('shoe_size')->comment('靴のサイズ');
            // $table->string('earring_size')->comment('ピアスのサイズ');
            // $table->string('necklace_size')->comment('ネックレスのサイズ');
        });

        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size_genre_id')->constrained('size_genres');
            $table->string('size')->comment('サイズ');
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
        Schema::dropIfExists('size_genres');
        Schema::dropIfExists('sizes');
    }
};
