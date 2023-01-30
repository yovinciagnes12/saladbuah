<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function create_product()
    {
        return view('create_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'nama_paket_layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stock' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->nama_paket_layanan . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));


        Product::create([
            'nama_paket_layanan' => $request->nama_paket_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'image' => $path
        ]);

        return Redirect::route('index_product');
    }

    public function index_product()
    {
        $products = Product::all();
        return view('index_product', compact('products'));
    }

    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'nama_paket_layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stock' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->nama_paket_layanan . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));


        $product->update([
            'nama_paket_layanan' => $request->nama_paket_layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'image' => $path
        ]);

        return Redirect::route('show_product', $product);
    }   

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');

    }

    }

