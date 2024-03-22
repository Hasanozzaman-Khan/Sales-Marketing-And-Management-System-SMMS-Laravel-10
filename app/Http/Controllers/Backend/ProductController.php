<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Storage;

/******* Models *********/
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;

/******* Requests *********/
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductUpdateRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        return view('backend.product.create', compact('categories', 'brands', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $feature_image = $request->file('feature_image')->store('public/product');
        $first_image = $request->file('first_image')->store('public/product');
        $second_image = $request->file('second_image')->store('public/product');

        Product::create([
            'user_id' => auth()->user()->id,
            'name' => $name = $request->name,
            'slug' => Str::slug($name),

            'feature_image' => $feature_image,
            'first_image' => $first_image,
            'second_image' => $second_image,

            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'size_id' => $request->size_id,
            'description' => $request->description,

            'stock' => $request->stock,
            'price' => $request->price,
            'is_discounted' => $request->is_discounted,
            'discount' => $request->discount,
            'discounted_price' => round($request->price - (($request->price * $request->discount) / 100)),

            'product_condition' => $request->product_condition,
            'listing_location' => $request->listing_location,
            'phone_number' => $request->phone_number,

            'published' => 0,
            'link' => $request->link,
            'type' => '',
            'status' => 0,

        ]);

        return redirect()->route('product.index')->with('message','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        return view('backend.product.edit', compact('product', 'categories', 'brands', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::find($id);

        $data = $request->all();

        $featureImage = $product->feature_image;
        if($request->hasFile('feature_image')){
            Storage::delete($product->feature_image);
            $featureImage = $request->file('feature_image')->store('public/product');
        }


        $firstImage = $product->first_image;
        if($request->hasFile('first_image')){
            Storage::delete($product->first_image);
            $firstImage = $request->file('first_image')->store('public/product');
        }
        $secondImage = $product->second_image;
        if($request->hasFile('second_image')){
            Storage::delete($product->second_image);
            $secondImage = $request->file('second_image')->store('public/product');
        }

        $data['feature_image'] = $featureImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;

        $product->update($data);
        return redirect()->route('product.index')->with('message','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        Storage::delete($product->feature_image);
        Storage::delete($product->first_image);
        Storage::delete($product->second_image);

        $product->delete();

        return back()->with('message','Product deleted successfully.');
    }




    public function stockUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        $prevStock = $product->stock;
        $newStock = $request->stock;

        $data['stock'] = $prevStock + $newStock;

        $product->update($data);

        return back()->with('message','Stock updated successfully.');
    }
}
