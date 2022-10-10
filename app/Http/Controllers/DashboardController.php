<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Products;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'siteName' => 'Digidaxa 3D Management',
            'title' => 'Dashboard',
            'countProduct' => Products::count(),
            'countCategory' => Category::count()
        ]);
    }
}
