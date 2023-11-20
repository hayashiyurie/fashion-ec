<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInventoryManagementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $product_inventory_managementID = DB::table('product_inventory_managements')->insertGetId([
        //     'product_id' => $productId,
        //     'number_of_stock' => rand(0.30),
        //     'signup_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'deleted_at' => new DateTime(),
        // ]);
    }
}
