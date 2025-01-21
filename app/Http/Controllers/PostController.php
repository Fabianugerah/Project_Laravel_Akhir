<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('post.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'stock'=>'required',
            'price'=>'required'
            
        ]);

        $input = $request->all();

        $product = Product::create($input);

        return back()->with('success',' Product berhasil ditambahkan.');
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
        $product = Product::findOrFail($id);
        return view('post.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'stock'=>'required',
            'price'=>'required',
        ]);

        $product = Product::find($id)->update($request->all());

        return back()->with('success',' Data telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return back()->with('success',' Penghapusan telah berhasil.');
    }
}
