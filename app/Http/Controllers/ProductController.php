<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:products',
            'price'         => 'required',
            'description'   => 'required',
            'image'         => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if ($file) {
            Product::create([
                'name'          => $request->name,
                'price'         => $request->price,
                'description'   => $request->description,
                'image'         => $file->getClientOriginalName(), 
            ]);

            //Move Uploaded File
            $destinationPath = 'img';
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {

            Product::create([
                'name'          => $request->name,
                'price'         => $request->price,
                'description'   => $request->description,
                'image'         => "cover.jpg",
            ]);
        }
        
        \Session::flash('produk_add','Data produk berhasil di tambah');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = Product::findOrFail($product)->first();
        return view('products.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = Product::findOrFail($product)->first();
        return view('products.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required|unique:products',
            'price'         => 'required',
            'description'   => 'required',
            'image'         => 'sometimes|max:8000',
        ]);

        $file = $request->file('image');

        if ($file) {
            Product::where('id',$id)->update([
                'name'          => $request->name,
                'price'         => $request->price,
                'description'   => $request->description,
                'image'         => $file->getClientOriginalName(),  
            ]);

            //Move Uploaded File
            $destinationPath = 'img';
            $file->move($destinationPath,$file->getClientOriginalName());
        } else {
            Product::where('id',$id)->update([
                'name'          => $request->name,
                'price'         => $request->price,
                'description'   => $request->description,
                'image'         => "cover.jpg",
            ]);
        }
        
        \Session::flash('product_update','Data Product berhasil di ubah');

        return redirect()->route('products.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::where('id',$id)->first();
        //File::delete('uploads/'.$book->image_cover); // menghapus gambar dari public_path().
        $data->delete();

        \Session::flash('product_delete','Data produk berhasil di hapus');

        return redirect()->route('products.index');
    }
}
