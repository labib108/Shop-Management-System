<?php

namespace App\Http\Controllers;

use App\Models\category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function CategoryPage()
    {
        $categories = category::all();
        return view('pages.dashboard.category-page',compact('categories'));
    }
    public function CreateCategory(Request $request)
    {
        $user_id = $request->header('id');
        return category::create([
            'category_name' => $request->input('name'),
            'user_id' => $user_id
        ]);
    }
    public function updateCategory(Request $request)
    {
        $category_name = $request->input('name');
        $categoryId = $request->input('id');
        /*\Log::info("Updating Category ID: {$categoryId} with Name: {$category_name}");*/
        $updated = DB::table('categories')
            ->where('id', $categoryId)
            ->update(['category_name' => $category_name]);

        if ($updated) {
            return response()->json([
                'status' => 200,
                'message' => 'Category updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Category not found or not updated!',
            ]);
        }
    }
    public function DeleteCategory($id )
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['status' => 200, 'message' => 'Category deleted successfully!']);
        } else {
            return response()->json(['status' => 404, 'message' => 'Category not found!']);
        }
    }

}
