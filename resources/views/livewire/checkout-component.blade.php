
<main id="main" class="main-site">
    <div style="margin-left: 5%">
        {{-- class="container" --}}
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        
        <div class=" main-content-area">
            <form action="" wire:submit.prevent="placeOrder">
                <div class="row">

                    <div class="col-md-6 wrap-show-advance-info-box style-1">
                        {{-- Delivery Method --}}
                        <div class="choose-payment-methods">
                            <h3 class="title-box">Shipping Address</h3> 
                            {{-- <label class="payment-method item-link">
                                <input name="delivery-method" id="ship" value="ship" type="radio" wire:model="delivery">
                                <span><i class="fa fa-truck" aria-hidden="true"></i> Ship</span>
                            </label>
                            <label class="payment-method">
                                <input name="delivery-method" id="pickup" value="pickup" type="radio" wire:model="delivery">
                                <span><i class="fa fa-archive" aria-hidden="true"></i> Pick up</span>
                            </label> --}}
                        </div>
                        
                        {{-- @if($delivery == 'ship') --}}
                        {{-- Billing --}}
                        <div class="wrap-address-billing">
                            <br>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Line1<span>*</span></label>
                                    <input type="text" name="line1" value="" placeholder="Street Apartment Number" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p><p class="row-in-form">
                                    <label for="phone">Line2<span>*</span></label>
                                    <input type="text" name="line2" value="" placeholder="Street Apartment Number" wire:model="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="country">
                                    @error('country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Province<span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Province" wire:model="province">
                                    @error('province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                {{-- <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p> --}}
                            </div>
                        </div>
                        {{-- @endif --}}

                        {{-- Pick up --}}
                        {{-- @if($delivery == 'pickup')
                        <div style="padding-top: 10%">
                            <a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png') }}" width="500" height="100" alt="mercado"></a>
                            <h3>Pickup locations</h3> <br><br>
                            <div style="padding: 2% 2%; border-color: red 2px">
                                <h4><i class="fa fa-archive" aria-hidden="true"></i>  590 CMT8 TPHCM</h4>
                                <h4><i class="fa fa-phone-square" aria-hidden="true"></i>  0650 123 456</h4>
                                <h4><i class="fa fa-cutlery" aria-hidden="true"></i>  Usually ready in 4 hours.</h4>
                            </div>
                        </div>
                        @endif --}}
                    </div>
                    
                    {{-- Customer Order --}}
                    <div class="col-md-6">
                        <div class="summary summary-checkout">
                            <div class="wrap-show-advance-info-box style-1" style="margin-top: -2%">
                                <h3 class="title-box">Your Order</h3>
                            </div>
                            <div class="checkout-table-container">
                                
                                <div class="wrap-iten-in-cart">
                                    @if (Cart::instance('cart')->count() > 0)
                                        <ul class="products-cart">
                                            @foreach (Cart::instance('cart')->content() as $item)
                                                
                                            <li class="pr-cart-item">
                                                <div class="product-image">
                                                    <figure><img src="{{ ('assets/images/products-img') }}/{{$item->model->image}}" alt="{{ $item->model->name }}"></figure>
                                                </div>
                                                <div class="product-name">
                                                    <h4 style="">{{ $item->model->name }}</h4>
                                                    
                                                        <p class="price">${{ $item->model->regular_price }}</p>
                                                    
                                                </div>
                                                <div class="quantity">
                                                    {{-- <div class="quantity-input">
                                                        <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" >
                                                    </div> --}}
                                                    <h5 style="padding-left: 50%">{{ $item->qty }}</h5>
                                                </div>
                                                
                                                <div class="price-field sub-total"><p class="price">${{ $item->subtotal }}</p></div>
                                            </li>
                                            @endforeach										
                                        </ul>
                                    @else 
                                        <p>No Item In Cart</p>
                                    @endif
                                </div>
                            </div>
        
                            
                            {{-- Payment Method --}}
                            <div class="summary-item payment-method">
                                <h4>Payment Method</h4>
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                        <span>Cash On</span>
                                        <span class="payment-desc">Order Now Pay On Pickup or Delivery</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                        <span>Debit/Credit Card</span>
                                    </label>
                                    @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                @if($paymentmode == 'card')
                                <div class="wrap-address-billing">
                                    @if(Session::has('stripe_error'))
                                        <div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
                                    @endif
                                    <p class="row-in-form">
                                        <label>Card Number: 4242424242424242</label>
                                        <input type="text" name="card_no" maxlength="16" size="16" placeholder="Card Number" wire:model="card_no">
                                        @error('card_no')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
        
                                    <p class="row-in-form">
                                        <label>Expiry Month:</label>
                                        <input type="text" name="exp_month" maxlength="2" size="2" value="" placeholder="MM" wire:model="exp_month">
                                        @error('exp_month')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
        
                                    <p class="row-in-form">
                                        <label>Expiry Year:</label>
                                        <input  type="text" name="exp_year" maxlength="4" size="4" value="" placeholder="YYYY" wire:model="exp_year">
                                        @error('exp_year')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    
                                    <p class="row-in-form">
                                        <label>CVC:</label>
                                        <input type="text" maxlength="3" size="3" name="cvc" value="" placeholder="CVC" wire:model="cvc">
                                        @error('cvc')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                </div>
                                @endif
                                {{-- <p class="summary-info"><span class="title">Check / Money order</span></p>
                                <p class="summary-info"><span class="title">Credit Cart (saved)</span></p> --}}
                                
                                {{-- Lấy tổng hóa đơn --}}
                                {{-- {{Cart::instance('cart')->total()}} --}}
                                
                                <!-- Modal HTML -->
                                {{-- <div id="myModal" class="modal fade">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>				
                                                <h4 class="modal-title">Are you sure?</h4>	
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>      --}}
                            </div>

                            {{-- BILL TOTAL --}}
                            <div class="summary-item shipping-method">
                                {{-- @if (Cart::instance('cart')->count() > 0) --}}
                                    
                                    <p class="summary-info"><span class="title">Subtotal:</span><span style="padding-left: 27%;">${{ Cart::instance('cart')->subtotal() }}</span></p>
                                    <p class="summary-info"><span class="title">Tax:</span><span style="padding-left: 39%;">${{ Cart::instance('cart')->tax() }}</span></p>
                                    
                                    {{-- @if(Session::has('coupon'))
                                    <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}}<a href="" wire:click.prvent="removeCoupon"><i class="fa fa-times text-danger"></i>)</a></span><b class="index"> -${{number_format($discount, 2)}}</b></p>
                                    @endif --}}
                                    
                                    @if(Session::has('coupon'))
                                        
                                        <p class="summary-info">
                                            <span class="title" style="color: red">Discount ({{Session::get('coupon')['code']}})<a href="" wire:click.prvent="removeCoupon"></a></span>
                                            <b class="index" style="padding-left: 10%; font-size: 15.5px; color: red;"> - ${{Session::get('checkout')['discount']}}</b>
                                        </p>

                                        {{-- <p class="summary-info"><span class="title">Subtotal with Discount</span><b class="index">${{number_format($subtotalAfterDiscount, 2)}}</b></p> --}}

                                        {{-- <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span><b class="index">${{number_format($taxAfterDiscount, 2)}}</b></p> --}}

                                        
                                    
                                    @else
                                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                    @endif




                                    @if(Session::has('checkout'))
                                    <h4 class="title-box"></h4>
                                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price" style="font-size: 21px">${{Session::get('checkout')['total']}}</span></p>
                                    @endif
                                {{-- @endif --}}
                                
                                <button type="submit" class="btn btn-medium">ORDER NOW</button>
                                {{-- <a href="#myModal" data-toggle="modal"> --}}
                            </div>
                        </div>
                    </div>
                    
                    {{-- @if($ship_to_different)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Shipping Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                    @error('s_firstname') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                    @error('s_lastname') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                                    @error('s_email') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                                    @error('s_mobile') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Line1<span>*</span></label>
                                    <input type="text" name="line1" value="" placeholder="Street Apartment Number" wire:model="s_line1">
                                    @error('s_line1') <span class="text-danget">{{$message}}</span> @enderror
                                </p><p class="row-in-form">
                                    <label for="phone">Line2<span>*</span></label>
                                    <input type="text" name="line2" value="" placeholder="Street Apartment Number" wire:model="s_line2">
                                    @error('s_line2') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="s_country">
                                    @error('s_country') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Province<span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Province" wire:model="s_province"> 
                                    @error('s_province') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                    @error('s_city') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                    @error('s_zipcode') <span class="text-danget">{{$message}}</span> @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif --}}
                </div>
                
                

             </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>

