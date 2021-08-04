<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saigon Bakery</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
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

    @extends('user.base')
    @section('main-content')


    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
    <div>

        <div>
            <div class="container" style="padding: 30px 0;">
                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="/" class="link">home</a></li>
                        <li class="item-link"><span>User Review</span></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div id="review_form_wrapper">
                        <div id="comments">
                            <h2 class="woocommerce-Reviews-title">Add review for</h2>
                            <ol class="commentlist">
                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                    <div id="comment-20" class="comment_container">
                                        <img alt="" src="{{ asset('assets/images/products-img') }}/{{$orderItem->product->image}}" height="80" width="80">
                                        <div class="comment-text">

                                            <p class="meta">
                                                <strong class="woocommerce-review__author">{{$orderItem->product->name}}</strong>

                                            </p>

                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div id="review_form">
                                @if(Session::has('message'))
                                    <p class="aler alert-success" role="alert">{{Session::get('message')}}</p>
                                @endif
                            <div id="respond" class="comment-respond">
                                <form action="{{url('userreview/addreview')}}" id="commentform" class="comment-form" method="Post">
                                    @csrf
                                    <div class="comment-form-rating">
                                        <span>Your rating</span>
                                        <p class="stars">

                                            <label for="rated-1"></label>
                                            <input type="radio" id="rated-1" name="rating" value="1" >
                                            <label for="rated-2"></label>
                                            <input type="radio" id="rated-2" name="rating" value="2" >
                                            <label for="rated-3"></label>
                                            <input type="radio" id="rated-3" name="rating" value="3" >
                                            <label for="rated-4"></label>
                                            <input type="radio" id="rated-4" name="rating" value="4" >
                                            <label for="rated-5"></label>
                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked" >
                                            @error('rating') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <input type="hidden" name="order_item_id" value="{{$order_item_id}}">
                                    <p class="comment-form-comment">
                                        <label for="comment">Your review <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" id="comment" name="comment"></textarea>
                                        @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="submit">
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

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