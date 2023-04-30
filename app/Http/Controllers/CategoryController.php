<?php

namespace App\Http\Controllers;

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
}
