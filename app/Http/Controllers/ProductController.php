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
    public function index(Request $request)
    {
        $keys = ['name', 'stroke', 'price', 'created_at'];
        $products = Product::query();

        if ($title = $request->input('title')) {
            $products->title($title);
        }

        foreach ($keys as $key) {
            if ($order = $request->input($key)) {
                if ($order === 'asc') {
                    $products->asc($key);
                } elseif ($order === 'desc') {
                    $products->desc($key);
                }
            }
        }

        return view('index', [
            'products' => $products->latest()->paginate(10)
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
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        // Update product fields
        $product->name = $request->input('name');
        $product->stroke = $request->input('stroke');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $image_path = public_path('storage/') . $product->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            // Store new image
            $path = $request->file('image')->store('images/products', 'public');
            $product->image = $path;
        }

        // Save updated product
        $product->save();

        return redirect()->route('products.index')->with([
            'status' => 'SUCCESS',
            'message' => 'Updated Successfully!',
        ]);
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
