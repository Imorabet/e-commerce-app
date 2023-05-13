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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('Layouts.Admin.editProduct', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'pname' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'quantity' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'img' => 'nullable|image|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('pname');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->id_categories = $request->input('category');

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('public');
            $product->img = basename($path);
        }

        $product->save();

        return redirect()->route('product.all')->withToastSuccess('Product updated successfully.');
    }
}
