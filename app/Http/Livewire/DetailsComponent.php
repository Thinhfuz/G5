<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        //dd(Cart::add($product_id, $product_name, 1, $product_price));
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
        // 
    }

    public function render()
    {
        $products = Product::where('slug', $this->slug)->first();

        if ($products->quantity > 10) {
            $stockLevel = '<div class="badge badge-success">In Stock</div>';
        } elseif ($products->quantity <= 10 && $products->quantity > 0) {
            $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
        } else {
            $stockLevel = '<div class="badge badge-danger">Not Available</div>';
        }

        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $products->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component', ['products' => $products, 'stockLevel' => $stockLevel, 'popular_products' => $popular_products, 'related_products' => $related_products])->layout('layouts.base');
    }
}
