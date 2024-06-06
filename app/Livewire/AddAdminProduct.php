<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAdminProduct extends Component
{
    use WithFileUploads;
    public $brand_id;
    public $category_id;
    public $subcategory_id;
    public $is_active = 1;
    public $name;
    public $product_details;
    public $images = [];

    public $variants = [
        [
            'variant_name' => '',
            'sku' => '',
            'price' => '',
            'offer_price' => '',
            'stock' => '',
        ]
    ];


    protected $rules = [
        'name' => 'required',
        'product_details' => 'required',
        'images' => 'required',
        'brand_id' => 'required',
        'category_id' => 'required',


    ];

    public function addVariant()
    {
        $this->variants[] = [
            'variant_name' => '',
            'sku' => '',
            'price' => '',
            'offer_price' => '',
            'stock' => '',
        ];
    }

    public function removeVariant($index)
    {
        if ($index > 0) {

            unset($this->variants[$index]);
            $this->variants = array_values($this->variants); // Re-index the array
        }
    }
    public function submit()
    {
        $this->validate();

        // Add Product In Database 

        $product = Product::create([
            'store_id' => Auth::id(),
            'brand_id' => $this->brand_id,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->subcategory_id,
            'name' => $this->name,
            'product_details' => $this->product_details,
            'is_active' => $this->is_active,
            'is_variant' => true,
        ]);



        // Add Image In Data Base
        foreach ($this->images as $key => $image) {

            $imagePath = $image->store('products');

            ProductImages::create([
                'product_id' => $product->id,
                'image' => $imagePath,
                'is_default' => $key == 0 ? 1 : 0,

            ]);
        }

        // Add Variant In Data Base

        foreach ($this->variants as $i => $variantData) {
            if (!empty(array_filter($variantData))) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'name' => $variantData['variant_name'],
                    'sku' => $variantData['sku'],
                    'price' => $variantData['price'],
                    'offer_price' => $variantData['offer_price'],
                    'stock' => $variantData['stock'],
                    'is_default' => $i == 0 ? 1 : 0,
                ]);
            }
        }
    }
    public function render()

    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = [];
        if ($this->category_id) {
            $subcategories = SubCategory::where('category_id', $this->category_id)->get();
        };
        return view('livewire.add-admin-product', compact('brands', 'categories', 'subcategories'))->layout('layouts.app');
    }
}
