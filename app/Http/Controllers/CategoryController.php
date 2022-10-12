<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.list', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Product Category',
            'categories' => Category::all()
        ]);

    }

    public function add()
    {
        return view('admin.categories.add', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Category Add'
        ]);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required','unique:categories', 'max:255']
        ]);

        Category::create($validatedData);

        return redirect('/admin/products/categories')->with('messageSuccess', 'New category has been added!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Category Edit',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        if($request->slug === $category->slug) {
            $rules = [
                'name' => ['required', 'max:255']
            ];
        } else {
            $rules['slug'] = ['required','unique:categories', 'max:255'];
        }
        
        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
        ->update($validatedData);

        return redirect('/admin/products/categories')->with('messageSuccess', 'Category has been updated!');
    }
    
    public function delete(Category $category)
    {
        $CategoryInUse = Category::where('id', $category->id)->withCount('products')->get()[0]->products_count;
        
        if($CategoryInUse) {
            return redirect('/admin/products/categories')->with('messageFail', 'Category can\'t be deleted, because in use on the product!');
        } else {
            Category::destroy($category->id);
            return redirect('/admin/products/categories')->with('messageSuccess', 'Category has been deleted!');
        }

    }
}
