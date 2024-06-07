<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AdminProductList extends Component
{
    public $search;
    public function render()
    {
        $query = Product::with(['variants', 'category', 'brand', 'images' => function ($query) {
            $query->where('is_default', true);
        }]);
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $products = $query->orderBy('id', 'asc')->paginate(10);
        // dd($products);

        return view('livewire.admin-product-list', compact('products'))->layout('layouts.app');
    }
}
