<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

/******* Models *********/
use App\Models\Brand;



class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);
        Brand::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'entry_by' => auth()->user()->id
        ]);

        return redirect()->route('brand.index')->with('message','Brand created successfully.');
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
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:brands,name,'.$id,
        ]);
        $brand = Brand::find($id);
        $brand->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name),'entry_by' => auth()->user()->id]);

        return redirect()->route('brand.index')->with('message','Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return back()->with('message','Brand deleted successfully.');
    }
}
