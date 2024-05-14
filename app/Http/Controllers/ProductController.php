<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'products' => Product::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
        }

        $product = new Product;
        $product->name = $request->name;
        $product->stroke = $request->stroke;
        $product->price = $request->price;
        $product->image = $path;
        $product->save();

        return redirect()->route('products.index')->with([
            'status' => 'SUCCESS',
            'message' => 'Product created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product.edit', [
            'product' => Product::find($id)
        ]);
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

        $product = Product::find($id);
        $product->delete();

        $image_path = public_path('storage/') . $product->image;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }


        return redirect()->route('products.index')->with([
            'status' => 'DELETE',
            'message' => 'Delete Successfully!',
        ]);
    }
}
