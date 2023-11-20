<?php

namespace Database\Seeders;

use App\Models\products_image;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\size_genre;
use App\Models\ProductTable;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class ProductTableSheeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // \App\Models\Product::factory(5)->create();
        $sizeGenre = new size_genre;
        $sizeGenre->fill(['size_genre_name' => 'shoes'])->save();

        $sizeId = DB::table('sizes')->insertGetId([
            'size' => 'm',
            'size_genre_id' => $sizeGenre->id,
        ]);

        $colorId = DB::table('colors')->insertGetId([
            'color_name' => Str::random(10)
        ]);

        $genreId = DB::table('genres')->insertGetId([
            'genre_name' => Str::random(10),
            'signup_at' => new Carbon(),
            'updated_at' => new Carbon(),
            'deleted_at' => new Carbon(),
        ]);

        $imageId = DB::table('images')->insertGetId([
            'path' => "/images/products/knitBeige.png",
            'signup_at' => new Carbon(),
            'updated_at' => new Carbon(),
            'deleted_at' => new Carbon(),
        ]);

        $productId = DB::table('products')->insertGetId([
            'size_id' => $sizeId,
            'color_id' => $colorId,
            'genre_id' => $genreId,
            'product_name' => Str::random(10),
            'explanation'  => Str::random(15),
            'tax_included_price'  => '2200円',
            'jan_code'  => Str::random(10),
            'sku_code'  => Str::random(10),
            'signup_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => new DateTime(),
        ]);

        $products_imageId = DB::table('products_images')->insertGetId([
            'product_id' => $productId,
            'image_id' => $imageId,
            'sort_order' => '1'
        ]);

        $product_inventory_managementID = DB::table('product_inventory_managements')->insertGetId([
            'product_id' => $productId,
            'number_of_stock' => '25',
            'signup_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => new DateTime(),
        ]);
    }
}
