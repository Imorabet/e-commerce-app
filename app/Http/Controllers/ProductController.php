<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getData()
    {
        $categories = Category::all();
        $products = Product::all();

        return [
            'categories' => $categories,
            'products' => $products
        ];
    }

    public function index()
    {
        $data = $this->getData();

        return view('products', $data);
    }

    public function getProducts()
    {
        $data = $this->getData();
        return view('Layouts.Admin.products', $data);
    }

    public function getCategories()
    {
        $data = $this->getData();
        return view('Layouts.Admin.add', $data);
    }
    public function add(Request $request)
    {

        $request->validate([
            'pname' => 'string|required',
            'price' => 'required|numeric',
            'description' => 'string|required',
            'quantity' => 'required|numeric',
            'category' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $imageFile = $request->file('img');
        $filename = $imageFile->getClientOriginalName();
        $extension = strtolower($imageFile->getClientOriginalExtension());
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        if (!in_array($extension, $allowedExtensions)) {
            return redirect()->back()->withErrors(['img' => 'Only PNG, JPG and JPEG images are allowed.']);
        }
        $imageFile->move(public_path('storage'), $filename);

        $product = Product::create([
            'name' => $request->pname,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'id_categories' => $request->category,
            'img' => $filename
        ]);

        $product->save();

        return redirect()->route('product.all');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return redirect()->route('product.all');
    }
}
