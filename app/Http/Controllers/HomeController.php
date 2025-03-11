<?php

namespace App\Http\Controllers;

// use App\Livewire\Category;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing()
    {
        // $breads = [
        //     ['title' => 'Liste des Villes', 'url' => null],
        //     ['text' => 'Villes', 'url' => null], // You can set the URL to null for the last breadcrumb
        // ];
        $categories = Categorie::with('product')->get();
        return view('landing', compact('categories'));
    }
    public function about()
    {
        // $breads = [
        //     ['title' => 'Liste des Villes', 'url' => null],
        //     ['text' => 'Villes', 'url' => null], // You can set the URL to null for the last breadcrumb
        // ];
        return view('about');
    }
    public function cat($id)
    {
        $category = Categorie::where('id_Cat',$id)->first();
        return view('cat',compact('category'));
    }
    public function product($id)
    {
        $Products = Product::where('id_Cat',$id)->get();
        return view('product',compact('Products'));
    }
}
