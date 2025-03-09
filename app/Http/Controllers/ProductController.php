<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ProductList()
    {
        $products = Product::all();
        return $products;
    }

    public function ProductPage(Request $request)
    {
        $user_id = $request->header('id');
        $products = Product::where('user_id', $user_id)->get();
        $categories = Category::where('user_id', $user_id)->get();
        return View('pages.dashboard.product-page', compact('products','categories'));
    }

    public function CreateProduct(Request $request)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $unit = $request->input('unit');
        $img = $request->file('img');

        $file_name = $img->getClientOriginalName();
        $img_name = "{$user_id}-{$file_name}";
        $img_url = "uploads/{$img_name}";
        $img->move(public_path('uploads'),$img_name);

        return Product::create([
            'user_id'=> $user_id,
            'category_id'=> $category_id,
            'name'=> $name,
            'description'=> $description,
            'price'=> $price,
            'unit'=> $unit,
            'image'=> $img_url,
        ]);
    }

    public function UpdateProduct(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $unit = $request->input('unit');

        $product = Product::where('id',$product_id)
                ->where('user_id', $user_id)->first();
        if(!$product)
        {
            return response()->json([
                'message' => "Product not found",404
            ]);
        }

        if($request->hasFile('img')){
            $filePath = public_path($product->image);
            if(file_exists($filePath)){
                File::delete($filePath);
            }

            $img = $request->file('img');
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'),$img_name);
        }else{
            $img_url = $product->image;
        }

        $product->update([
            'category_id'=> $category_id,
            'name'=> $name,
            'description'=> $description,
            'price'=> $price,
            'unit'=> $unit,
            'image'=> $img_url,
        ]);

        return response()->json([
            'message' => "Product update successfully",
            'product' => $product
        ]);
    }

    public function DeleteProduct(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        $product = Product::where('id', $product_id)->first();
        if($product){
            $filePath = public_path($product->image);
            if(file_exists($filePath)){
                File::delete($filePath);
            }
        }
        return Product::where('id',$product_id)->where('user_id',$user_id)->delete();
    }
}
