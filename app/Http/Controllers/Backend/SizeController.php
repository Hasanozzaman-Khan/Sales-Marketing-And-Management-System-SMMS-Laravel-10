<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

/******* Models *********/
use App\Models\Size;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::get();
        return view('backend.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sizes|max:255',
        ]);
        Size::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'entry_by' => auth()->user()->id
        ]);

        return redirect()->route('size.index')->with('message','Size created successfully.');
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
        $size = Size::find($id);
        return view('backend.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:sizes,name,'.$id,
        ]);
        $size = Size::find($id);
        $size->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name),'entry_by' => auth()->user()->id]);

        return redirect()->route('size.index')->with('message','Size updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();

        return back()->with('message','Size deleted successfully.');
    }
}
