<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing()
    {
        // $villes = Ville::query()->orderBy('created_at','desc')->get();
        // $breads = [
        //     ['title' => 'Liste des Villes', 'url' => null],
        //     ['text' => 'Villes', 'url' => null], // You can set the URL to null for the last breadcrumb
        // ];
        return view('landing');
    }
    public function about()
    {
        // $breads = [
        //     ['title' => 'Liste des Villes', 'url' => null],
        //     ['text' => 'Villes', 'url' => null], // You can set the URL to null for the last breadcrumb
        // ];
        return view('about');
    }
}
