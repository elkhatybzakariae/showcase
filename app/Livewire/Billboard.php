<?php

namespace App\Livewire;

use App\Models\Product; // Import Product model
use Carbon\Carbon;
use Livewire\Component;

class Billboard extends Component
{
    public $lastProducts;
    public $cards;

    public function mount()
    {
        // Fetch all products
        $this->lastProducts = Product::all();
        // $this->lastProducts = Product::whereMonth('created_at', Carbon::now()->month)
        // ->whereYear('created_at', Carbon::now()->year)
        // ->latest()
        // ->first();

        // Initialize an empty array for cards
        $this->cards = [];

        // Loop through each product and add it to the cards array
        foreach ($this->lastProducts as $lP) {
            $this->cards[] = [
                'id' => $lP->id_Pr, // Use the product ID
                'image' =>asset('storage/' . $lP->pic),
                'title' => $lP->proName, // Use the product name as the title
                'description' => $lP->description, // Use the product description
                'price' => $lP->price, // Use the product price
                // 'link' => route('product.show', $lP->id_Pr), // Generate a link to the product
            ];
        }
    }
    public function render()
    {
        return view('livewire.billboard', [
            'lastProducts' => $this->lastProducts,
            'lastProductsJson' => $this->lastProducts->toJson(),
            'cards' => $this->cards,
        ]);
    }
}
