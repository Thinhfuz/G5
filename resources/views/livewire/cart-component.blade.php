
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if(Cart::instance('cart')->count() > 0)
            <div class="wrap-iten-in-cart">
                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{Session::get('success_message')}}
                    </div>
                @endif
                @if (Cart::instance('cart')->count() > 0)
                
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach (Cart::instance('cart')->content() as $item)
                        
                    
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ ('assets/images/products-img') }}/{{$item->model->image}}" alt="{{ $item->model->name }}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">${{ $item->model->regular_price }}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{ $item->qty }}" max="10" data-max="10" pattern="[0-9]*" >
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price">${{ $item->subtotal }}</p></div>
                        <div class="delete">
                            <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach										
                </ul>
                @else 
                    <p>No Item In Cart</p>
                @endif
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>

                    @if(Session::has('coupon'))
                        <p class="summary-info"><span class="title">Tax 10%</span><b class="index">${{ Cart::instance('cart')->tax() }}</b></p>
                        <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}}<a href="" wire:click.prvent="removeCoupon">)</a></span><b class="index"> -${{number_format($discount, 2)}}</b>
                            <a href="#" wire:click.prevent="removeCoupon" class="btn btn-delete" title="">
                                <span class="text-danger">>> Remove Coupon <i class="fa fa-times text-danger"></i> <<</span>
                            </a>
                        </p>

                        {{-- <p class="summary-info"><span class="title">Subtotal with Discount</span><b class="index">${{number_format($subtotalAfterDiscount, 2)}}</b></p> --}}

                        {{-- <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span><b class="index">${{number_format($taxAfterDiscount, 2)}}</b></p> --}}

                        <h4 class="title-box"></h4>
                        <h4 class="summary-info"><span class="title-box">Total</span><b class="index">${{number_format($totalAfterDiscount, 2)}}</b></h4>
                    
                    @else
                        <p class="summary-info"><span class="title">Tax 10%</span><b class="index">${{ Cart::instance('cart')->tax() }}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <h4 class="summary-info total-info "><span class="title-box">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></h4>
                    @endif
                    
                </div>
                
                <br><br>
                <div class="checkout-info">
                    @if(!Session::has('coupon'))
                        <div class="summary-item">
                            <form class="title-box" wire:submit.prevent="applyCouponCode">
                                @csrf
                                @if(Session::has('coupon_message'))
                                    <div class="alert alert-danger" role="alert">{{Session::get('coupon_message')}}</div>
                                @endif
                                <p class="row-in-form">
                                    <input type="text" name="couponCode" wire:model="couponCode" placeholder="Discount Code">
                                    <button type="submit" class="btn btn-small">Apply</button>
                                </p>
                                
                            </form>
                        </div>
                    @endif
                    <a class="btn btn-checkout" href="{{ route('checkout.index') }}" wire:click.prevent="checkout">CHECK OUT</a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a> 
                </div>
                <br><br>
                <div class="update-clear">
                    <a class="btn btn-update" href="/shop">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            @else
                <div class="text-center" style="padding: 30px 0;">
                    <img src="{{url('assets/images/oops.png')}}" width="330" height="330" alt="">
                    <h1 style="font-size: 35px; color: #791812; font-weight: bold; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">oops!</h1>
                    <h3 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Your Cart Is Empty...</h4> <br>
                    <a href="/shop" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shop Now</a>
                </div>
            @endif
                <br>

            {{-- MOST VIEW PRODUCT --}}
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        @foreach ($related_products as $r_product)
                            
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="{{$r_product->name}}">
                                    <figure><img src="{{ ('assets/images/products-img') }}/{{$r_product->image}}" width="214" height="214" alt="{{$r_product->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$r_product->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{$r_product->regular_price}}</span></div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>
