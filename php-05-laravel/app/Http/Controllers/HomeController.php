<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::all()->take(2);
        $products = Product::all()->take(6);
        notify()->success("Test", "Success");
        return view('home', compact('categories', 'products'));
    }
}
