<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Products_image;
use App\Models\Image;
use App\Models\Product_inventory_management;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genreId = $request->genreId;
        //productsテーブルのproduct_idと一致するproducts_imageテーブルからproduct_idとimage_idを取得します。
        $products = Product::with(['productImages.image', 'productInventoryManagement'])

            ->when($genreId, function ($query, $genreId) {
                return $query->where('genre_id', '=', $genreId);
            })->get();

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $image = $request->file('image');
        // $path = '';
        // if (isset($image)) {
        //     $path = $image->store('images', 'public');
        // }
        // return view('images.index', ['path' => $path]);

        // $image = new Image;

        // // name属性が'thumbnail'のinputタグをファイル形式に、画像をpublic/images/productsに保存
        // $image_path = $request->file('path')->store('public/images/products');

        // // 上記処理にて保存した画像に名前を付け、userテーブルのthumbnailカラムに、格納
        // $image->path = basename($image_path);

        // $image->save();

        // return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
