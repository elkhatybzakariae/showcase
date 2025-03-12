<?php

namespace App\Livewire;

use App\Models\Product; // Import Product model
use Carbon\Carbon;
use Livewire\Component;

class Billboard extends Component
{
    public $lastProducts;

    public function mount()
    {
        $this->lastProducts = Product::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->latest()
            ->first();
    }
    public function render()
    {
        return view('livewire.billboard', [
            'lastProducts' => $this->lastProducts
        ]);
    }
}
