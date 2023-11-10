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
        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('size_id')->after('id')->constrained('sizes');
            $table->foreignId('color_id')->after('size_id')->constrained('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_size_id_foreign');
            $table->dropForeign('products_color_id_foreign');
            $table->dropColumn('size_id');
            $table->dropColumn('color_id');
        });
    }
};
