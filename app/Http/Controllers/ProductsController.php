<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Products;
use App\Models\Category;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.list', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Product List',
            'products' => Products::latest()->get()
            // 'products' => Products::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function products(Products $product)
    {
        // $product = Products::find($id);
        // $product = Products::where('user_id', auth()->user()->id)->find($id);

        return view('admin.products.detail', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Detail Produk '. $product['name'],
            'product' => $product,
        ]);
    }
    
    public function view3D(Products  $product)
    {
        return view('admin.products.view3d', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => '3D View '. $product,
            'product' => $product
        ]);
    }
    
    public function viewAR(Products  $product)
    {
        return view('admin.products.viewar', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'AR View '. $product,
            'product' => $product
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Products::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
    
    public function add()
    {
        return view('admin.products.add', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Product Add',
            'categories' => Category::all()
        ]);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required','unique:products', 'max:255'],
            'category_id' => ['required'],
            'file' => ['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $filename =  $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs(
            'models', $filename
        );
        if ($request->oldFile){
            Storage::delete($request->oldFile);
        }
        $validatedData['file'] = $path;

        Products::create($validatedData);

        return redirect('/admin/products/list')->with('messageSuccess', 'New product has been added!');
    }

    public function delete(Products $product)
    {
        if($product->file) {
            Storage::delete($product->file);
        }

        Products::destroy($product->id);
        return redirect('/admin/products/list')->with('messageSuccess', 'Product has been deleted!');
    }

    public function edit(Products $product)
    {
        return view('admin.products.edit', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Product Edit',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Products $product)
    {
        if($request->slug === $product->slug) {
            $rules = [
                'name' => ['required', 'max:255'],
                'category_id' => ['required']
            ];
        } else {
            $rules['slug'] = ['required','unique:products', 'max:255'];
        }
        
        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            $filename =  $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'models', $filename
            );
            if ($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $path;
        }

        $validatedData['user_id'] = auth()->user()->id;

        Products::where('id', $product->id)
        ->update($validatedData);

        return redirect('/admin/products/list')->with('messageSuccess', 'Product has been updated!');
    }
}
