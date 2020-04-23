<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class GamingController extends Controller
{
    public function index()
    {
        //
        $products = Product::all();
        $categories = Category::all();

        return view('gaming', compact('products'), compact('categories'));
    }
    public function all()
    {
        $products = Product::paginate(12);
        $categories = Category::paginate(6);
        
        return view('welcome', compact('categories'), compact('products'));
    }
}
