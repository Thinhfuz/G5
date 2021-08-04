<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ ('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    @livewireStyles
</head>

<body class="home-page home-01 ">


    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>




    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>detail</span></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">
                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">

                                    <li data-thumb="{{ asset('assets/images/products-img')}}/{{$products->image}}">
                                        <img src="{{ asset('assets/images/products-img') }}/{{$products->image}}" alt="{{$products->name}}" />
                                    </li>

                                    <?php
                                    $images = json_decode($products->images);
                                    ?>
                                    @foreach ($images as $image)
                                    @if($image)
                                    <li data-thumb="{{ asset('assets/images/products-img')}}/{{$image}}">
                                        <img src="{{ asset('assets/images/products-img') }}/{{$image}}" alt="{{$products->name}}" />
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="detail-info">
                            <?php
                            $avg = 0;
                            $count = 0;
                            foreach ($products->available_rating as $orderItem) {

                                $avg = $avg + $orderItem->review->rating;
                                $count++;
                            }
                            if ($count > 0) {
                                $avg = $avg / $count;
                            }



                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $avg)
                                    echo ("<i class='fa fa-star' aria-hidden='true'></i>");
                                else
                                    echo ("<i class='fa fa-star color-gray' aria-hidden='true'></i>");
                            }


                            ?>
                            <a href="#" class="count-review">{{$count}} reviews ({{$avg}}/5)</a>

                            <h2 class="product-name">{{ $products->name }}</h2>
                            <div class="short-desc">
                                {{ $products->short_description }}
                            </div>
                            <div class="wrap-social">
                                <a class="link-socail" href="#"></a>
                            </div>
                            <div class="wrap-price"><span class="product-price">${{ $products->regular_price }}</span></div><br><br>
                            <div>Availability: {!! $stockLevel !!}</div>
                            @if($products->quantity > 0)
                            <div class="wrap-butons">
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$products->id}},'{{$products->name}}', {{$products->regular_price}})">Add to Cart</a>
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <a href="/" class="btn btn-wishlist">Add Wishlist</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    {{ $products->description }}
                                </div>
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">
                                        <style>
                                            .width-20-percent {
                                                width: 20%;
                                            }

                                            .width-40-percent {
                                                width: 40%;
                                            }

                                            .width-60-percent {
                                                width: 60%;
                                            }

                                            .width-80-percent {
                                                width: 80%;
                                            }

                                            .width-100-percent {
                                                width: 100%;
                                            }
                                        </style>

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{$count}} reviews for <span>{{$products->name}}</span></h2>
                                            <ol class="commentlist">
                                                @foreach($products->available_rating as $orderItem)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        <img alt="" src="{{ asset('assets/images/author-avata.jpg') }}" height="80" width="80">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span class="width-{{ $orderItem->review->rating *20 }}-percent">Rated <strong class="rating">{{ $orderItem->review->rating *20 }}</strong> out of 5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="woocommerce-review__author"> User </strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$orderItem->review->comment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @foreach ($popular_products as $p_product)

                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{route('product.details', ['slug'=>$p_product->slug]) }}" title="{{$p_product->name}}">
                                                <figure><img src="{{ asset('assets/images/products-img') }}/{{$p_product->image}}" alt="{{$p_product->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details', ['slug'=>$p_product->slug]) }}" class="product-name"><span>{{$p_product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$p_product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>

                <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Related Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>

                                @foreach ($related_products as $r_product)


                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details', ['slug'=>$r_product->slug]) }}" title="{{ $r_product->name }}">
                                            <figure><img src="{{ asset('assets/images/products-img') }}/{{ $r_product->image }}" width="214" height="214" alt="{{ $r_product->name }}"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details', ['slug'=>$r_product->slug]) }}" class="product-name"><span>{{ $r_product->name }}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{ $r_product->regular_price }}</span></div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>



    <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    @livewireScripts
</body>

</html>