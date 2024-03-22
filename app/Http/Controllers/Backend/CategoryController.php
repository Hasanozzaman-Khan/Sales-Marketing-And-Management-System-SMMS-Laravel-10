<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Storage;
// use Illuminate\Support\Facades\Storage;

/******* Requests *********/
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\CategoryUpdateRequest;
// use Illuminate\Support\Facades\Validator;

/******* Models *********/
use App\Models\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $image = $request->file('image')->store('public/category');

        Category::create([
            'name' => $name = $request->name,
            'image' => $image,
            'slug' => Str::slug($name),
            'entry_by' => auth()->user()->id
        ]);

        return redirect()->route('category.index')->with('message','Category created successfully.');
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
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/category');
            $category->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name), 'image'=>$image, 'entry_by' => auth()->user()->id]);
        }else {
            $category->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name),'entry_by' => auth()->user()->id]);
        }
        return redirect()->route('category.index')->with('message','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (Storage::delete($category->image)) {
            $category->delete();
        }
        return back()->with('message','Category deleted successfully.');
    }
}
