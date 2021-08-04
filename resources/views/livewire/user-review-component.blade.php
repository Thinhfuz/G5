<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
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
    <div>

        <div>
            <div class="container" style="padding: 30px 0;">
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
                                <!-- @if(Session::has('message'))
                                    <p class="aler alert-success" role="alert">{{Session::get('message')}}</p>
                                @endif -->
                            <div id="respond" class="comment-respond">
                                <form wire:submit.prevent="addReview" id="commentform" class="comment-form">
                                    @csrf
                                    <div class="comment-form-rating">
                                        <span>Your rating</span>
                                        <p class="stars">

                                            <label for="rated-1"></label>
                                            <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                            <label for="rated-2"></label>
                                            <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                            <label for="rated-3"></label>
                                            <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                            <label for="rated-4"></label>
                                            <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                            <label for="rated-5"></label>
                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                            @error('rating') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>

                                    <p class="comment-form-comment">
                                        <label for="comment">Your review <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
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