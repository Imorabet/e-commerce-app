<?php

namespace App\Http\Controllers;
use Alert;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        $products=Product::take(3)->get();
        return view('welcome', ['categories' => $categories,'products'=>$products]);
    }
    public function getCategories(){
        $categories=Category::all();
        return view('Layouts.Admin.categories',['categories' => $categories]);
    }
    public function add(Request $request){
        $request->validate([
            'cname' => 'string|required',
            'description' => 'string|required',
        ]);
        $category = Category::create([
            'name' => $request->cname,
            'description' => $request->description,
        ]);

        $category->save();

        return redirect()->route('category.all');
    
    }
    public function destroy($id)
{
    $category = Category::find($id);
    if ($category) {
        $category->delete();
    }
    return redirect()->route('category.all');
}

}
