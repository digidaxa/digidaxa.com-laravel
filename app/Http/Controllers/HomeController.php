<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Products::latest()->get());
        return view('home.index', [
            'siteName' => 'Digidaxa',
            'title' => 'Beranda',
            'products' => Products::latest()->get(),
            'categories' => Category::all()
        ]);
    }
    
    public function about()
    {
        return view('home.about', [
            'siteName' => 'Digidaxa',
            'title' => 'Tentang Kami'
        ]);
    }

    public function faq()
    {
        return view('home.faq', [
            'siteName' => 'Digidaxa',
            'title' => 'Frequently Asked Questions (FAQ)'
        ]);
    }

    public function career()
    {
        return view('home.career', [
            'siteName' => 'Digidaxa',
            'title' => 'Karir'
        ]);
    }

    public function why()
    {
        return view('home.why', [
            'siteName' => 'Digidaxa',
            'title' => 'Mengapa harus Digidaxa?'
        ]);
    }

    public function collab()
    {
        return view('home.collab', [
            'siteName' => 'Digidaxa',
            'title' => 'Berkolaborasi dengan Kami'
        ]);
    }


    public function terms()
    {
        return view('home.terms', [
            'siteName' => 'Digidaxa',
            'title' => 'Syarat dan Ketentuan'
        ]);
    }


    public function privacy()
    {
        return view('home.privacy', [
            'siteName' => 'Digidaxa',
            'title' => 'Kebijakan Privasi'
        ]);
    }

    

    public function products(Products $product)
    {
        return view('home.products.single', [
            'siteName' => 'Digidaxa',
            'title' => $product['name'],
            'product' => $product,
        ]);
    }
}
