<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAdminProduct extends Component
{
    use WithFileUploads;
    public $brand_id;
    public $product_id;
    public $category_id;
    public $subcategory_id;
    public $is_active = 1;
    public $name;
    public $product_details;
    public $images = [];
    public $imagesPath = [];
    public $variants = [
        [
            'variant_name' => '',
            'sku' => '',
            'price' => 0,
            'offer_price' => 0,
            'stock' => 0,
        ]
    ];


    protected $rules = [
        'name' => 'required',
        'product_details' => 'required',
        'brand_id' => 'required',
        'category_id' => 'required',
        'variants' => 'required|array|min:1',
        // 'variants.*.price' => 'required|numeric',
        // 'variants.*.variant_name' => 'required',
        // 'variants.*.sku' => 'required',
        // 'variants.*.offer_price' => 'required|numeric',
        // 'variants.*.stock' => 'required|numeric',




    ];

    protected $messages = [
        'variants' => 'Minimum One Variant Is Required',
    ];

    public function addVariant()
    {
        $this->variants[] = [
            'variant_name' => '',
            'sku' => '',
            'price' => 0,
            'offer_price' => 0,
            'stock' => 0,
            'disable_sku' => false,
        ];
    }

    public function mount($id)
    {
        $data = Product::find($id);
        $this->brand_id = $data->brand_id;
        $this->product_id = $data->id;
        $this->category_id = $data->category_id;
        $this->subcategory_id = $data->sub_category_id;
        $this->is_active = $data->is_active;
        $this->name = $data->name;
        $this->product_details = $data->product_details;
        $this->imagesPath = $data->images;

        $this->variants = [];

        foreach ($data->variants as $variant) {
            $this->variants[] = [
                'variant_name' => $variant->name,
                'sku' => $variant->sku,
                'price' => $variant->price,
                'offer_price' => $variant->offer_price,
                'stock' => $variant->stock,
                'disable_sku' => true, // Add this line

            ];
        }
    }



    public function submit()
    {
        $this->validate();



        // Add Product In Database 

        $product = Product::find($this->product_id);
        $product->brand_id = $this->brand_id;
        $product->category_id = $this->category_id;
        $product->sub_category_id = $this->subcategory_id;
        $product->is_active = $this->is_active;
        $product->name = $this->name;
        $product->product_details = $this->product_details;
        $product->save();

        // Add Image In Data Base

        foreach ($this->images as $key => $img) {

            ProductImages::create([
                'product_id' => $this->product_id,
                'image' => $img->store('products'),
                'is_default' => $key == 0 ? 1 : 0,
            ]);
        }




        // Handle variants
        foreach ($this->variants as $key => $variant) {

            $price = $variant['price'] === '' ? 0 : $variant['price'];
            $offer_price = $variant['offer_price'] === '' ? 0 : $variant['offer_price'];
            $stock = $variant['stock'] === '' ? 0 : $variant['stock'];

            ProductVariant::updateOrCreate(
                ['product_id' => $this->product_id, 'sku' => $variant['sku']],
                [
                    'name' => $variant['variant_name'],
                    'offer_price' => $offer_price,
                    'price' => $price,
                    'stock' => $stock,
                    'is_default' => $key == 0,
                ]
            );
        }

        return redirect()->route('admin_product')->with('success', 'Product Updated Successfully');
    }

    public function deleteImage($id)
    {
        $data = ProductImages::find($id);
        if ($data->image && Storage::exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();
        $this->dispatch('deleteImage');
    }
    #[On('deleteImage')]
    public function render()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $subcategories = [];
        if ($this->category_id) {
            $subcategories = SubCategory::where('category_id', $this->category_id)->get();
        };
        // dd($this->brand_id);
        return view('livewire.edit-admin-product', compact('brands', 'categories', 'subcategories'))->layout('layouts.app');
    }
}
