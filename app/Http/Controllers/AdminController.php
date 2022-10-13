<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'siteName' => 'Digidaxa',
            'title' => 'Admin',
            'countProduct' => Products::count(),
            'countCategory' => Category::count()
        ]);
    }
}
