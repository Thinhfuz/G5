<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        //$products = Product::where($hotseller, ''= 'true');, ['products'=>$products]
        // $products = Product::all();
        $banhmi_products = Product::where('category_id', 4)->get();
        $featured_products = Product::where('featured', 1)->get();
        return view('livewire.home-component', ['featured_products'=>$featured_products, 'banhmi_products'=>$banhmi_products])->layout('layouts.base');
    }
}
