<?php

namespace App\Livewire;

use App\Models\Categorie;
use Livewire\Component;

class Category extends Component
{

    public function render()
    {

        $categories = Categorie::with('product')->get();
        return view('livewire.category', compact('categories'));
    }
}
