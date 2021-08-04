<?php

namespace App\Http\Livewire;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
//use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    
    public function increaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function checkout() {
        if(Auth::check()) {
            return redirect('checkout');

        } else {
            return redirect()->route('login');
        }
        // return redirect('checkout');
    }

    public function setAmountForCheckout() {
        if(!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        
        if(session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'total' => $this->totalAfterDiscount,
        ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
        ]);
        }
    }

    public function destroy($rowId) {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item Has Been Removed');
    }

    public function destroyAll() {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function applyCouponCode() {
        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        //dd($coupon);
        if(!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);

        //dd(session('coupon'));
    }

    public function calculateDiscounts() {
        
        if(session()->has('coupon')) {
            if(session()->get('coupon')['type'] == 'fixed') {
                
                $this->discount = session()->get('coupon')['value'];
                
            } else {

                $this->discount = ((int)Cart::instance('cart')->subtotal() * (int)session()->get('coupon')['value'])/100;

            }
            //$this->subtotalAfterDiscount = (int)Cart::instance('cart')->subtotal() + (int)Cart::instance('cart')->tax() - (int)$this->discount ;
            // $this->taxAfterDiscount = ((int)$this->subtotalAfterDiscount * (int)config('cart.tax'))/100;
            //$this->totalAfterDiscount = (int)$this->subtotalAfterDiscount;

            $this->subtotalAfterDiscount = (int)Cart::instance('cart')->subtotal();
            $this->taxAfterDiscount = ((int)$this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = ((int)$this->subtotalAfterDiscount + ((int)$this->taxAfterDiscount) - (int)$this->discount);
        } else {
            session()->flash('coupon_message', 'NULL Coupon');
            
        }
    }

    public function removeCoupon() {
        session()->forget('coupon');
    }

    public function render() 
    {
        //dd(session('coupon'));
        if(session()->has('coupon')) {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
                session()->flash('coupon_message', 'CART VALUE MUST BE GREATER THAN COUPON');
            } else {
                $this->calculateDiscounts();
            }
        }
        $products = Product::all();
        $related_products = Product::inRandomOrder()->limit(4)->get();
        $this->setAmountForCheckout();
        return view('livewire.cart-component', ['products'=>$products, 'related_products'=>$related_products])->layout('layouts.base');
    }
}
