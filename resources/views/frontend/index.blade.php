@extends('frontend.master')

@section('content')
<!-- Home Section Start -->
<section class="home-section pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xl-8 ratio_65">
                <div class="home-contain h-100">
                    <div class="h-100">
                        <img src="{{ asset('uplode/banner') }}/{{ $banners->first()->banner_img }}" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-center-left w-75">
                        <div>
                            <h6>Exclusive offer <span>{{ $banners->first()->banner_offer }}</span></h6>
                            <h1 class="text-uppercase">{{ $banners->first()->banner_titel }} <span class="daily">{{ $banners->first()->banner_hi }}</span></h1>
                            <p class="w-75 d-none d-sm-block">{{ $banners->first()->banner_des }}</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">Shop Now <i
                                    class="fa-solid fa-right-long icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 ratio_65">
                <div class="row g-4">
                    @foreach ($top_banner->take(2) as $tbanner)
                    <div class="col-xl-12 col-md-6">
                        <div class="home-contain">
                            <img src="{{ asset('uplode/banner/top_banner') }}/{{ $tbanner->tbanner_img }}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-center-left home-p-sm w-75">
                                <div>
                                    <h2 class="mt-0 text-danger">{{ $tbanner->tbanner_offer }} <span class="discount text-title">OFF</span>
                                    </h2>
                                    <h3 class="theme-color">{{ $tbanner->tbanner_titel }} </h3>
                                    <h6 class="theme-color">{{ $tbanner->tbanner_hi }} </h6>
                                    <p class="w-75">{{ $tbanner->tbanner_des }}</p>
                                    <a href="shop-left-sidebar.html" class="shop-button">Shop Now <i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->

<!-- Banner Section Start -->
<section class="banner-section ratio_60 wow fadeInUp">
    <div class="container-fluid-lg">
        <div class="banner-slider">
            @foreach ($butttom_banner as $bbanner)
                <div>
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('uplode/banner/buttom_banner') }}/{{ $bbanner->bbanner_img }}" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details">
                            <div class="banner-box">
                                <h6 class="text-danger">{{ $bbanner->bbanner_offer }}</h6>
                                <h5>{{ $bbanner->bbanner_titel }}</h5>
                                <h6 class="text-content">{{ $bbanner->bbanner_hi }}</h6>
                            </div>
                            <a href="shop-left-sidebar.html" class="banner-button text-white">Shop Now <i
                                    class="fa-solid fa-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                <div class="p-sticky">
                    <div class="category-menu">
                        <h3>Category</h3>
                        <ul class="pb-3">
                            @foreach ($categorys as $category)
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">{{ $category->category_name }}</a>
                                    </h5>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <ul class="value-list">
                            <li>
                                <div class="category-list">
                                    <h5 class="ms-0 text-title">
                                        <a href="shop-left-sidebar.html">Value of the Day</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <h5 class="ms-0 text-title">
                                        <a href="shop-left-sidebar.html">Top 50 Offers</a>
                                    </h5>
                                </div>
                            </li>
                            <li class="mb-0">
                                <div class="category-list">
                                    <h5 class="ms-0 text-title">
                                        <a href="shop-left-sidebar.html">New Arrivals</a>
                                    </h5>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="ratio_156 section-t-space">
                        <div class="home-contain hover-effect">
                            <img src="{{ asset('uplode/banner/') }}/{{ $banners->first()->banner_img }}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h6 class="text-yellow home-banner">Seafood</h6>
                                    <h3 class="text-uppercase fw-normal"><span
                                            class="theme-color fw-bold">Freshes</span> Products</h3>
                                    <h3 class="fw-light">every hour</h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_medium section-t-space">
                        <div class="home-contain hover-effect">
                            <img src="{{ asset('uplode/banner/buttom_banner') }}/{{ $butttom_banner->first()->bbanner_img }}" class="img-fluid blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h4 class="text-yellow text-exo home-banner">Organic</h4>
                                    <h2 class="text-uppercase fw-normal mb-0 text-russo theme-color">fresh</h2>
                                    <h2 class="text-uppercase fw-normal text-title">Vegetables</h2>
                                    <p class="mb-3">Super Offer to 50% Off</p>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-t-space">
                        <div class="category-menu">
                            <h3>Trending Products</h3>

                            <ul class="product-list border-0 p-0 d-block">
                                @foreach ($products->take(4) as $product)
                                <li>
                                    <div class="offer-product">
                                        <a href="{{ route('product.details', $product->slug) }}" class="offer-image">
                                            <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="{{ route('product.details', $product->slug) }}" class="text-title">
                                                    <h6 class="name">{{ $product->product_name }}</h6>
                                                </a>
                                                <span>{{ $product->product_type }}</span>
                                                <h6 class="price theme-color">TK {{ $product->total_price }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="section-t-space">
                        <div class="category-menu">
                            <h3>Customer Comment</h3>

                            <div class="review-box">
                                <div class="review-contain">
                                    <h5 class="w-75">We Care About Our Customer Experience</h5>
                                    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly
                                        used to demonstrate the visual form of a document or a typeface without
                                        relying on meaningful content.</p>
                                </div>

                                <div class="review-profile">
                                    <div class="review-image">
                                        <img src="{{ asset('frontend_asset/images/vegetable/review/1.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </div>
                                    <div class="review-detail">
                                        <h5>Tina Mcdonnale</h5>
                                        <h6>Sale Manager</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9 col-xl-8">
                <div class="title title-flex">
                    <div>
                        <h2>Top Save Today</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>Don't miss this opportunity at a special discount just for this week.</p>
                    </div>
                    <div class="timing-box">
                        <div class="timing">
                            <i data-feather="clock"></i>
                            <h6 class="name">Expires in :</h6>
                            <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                <ul>
                                    <li>
                                        <div class="counter">
                                            <div class="days">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="hours">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="minutes">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="seconds">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-b-space">
                    <div class="product-border border-row overflow-hidden">
                        <div class="product-box-slider no-arrow">
                            @foreach ($products as $product)
                            @if($product->discount != null)
                                <div>
                                    <div class="row m-0">
                                        <div class="col-12 px-0">
                                            <div class="product-box">
                                                <div class="product-image">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <ul class="product-option">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="View">
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#view">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>

                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Compare">
                                                            <a href="compare.html">
                                                                <i data-feather="refresh-cw"></i>
                                                            </a>
                                                        </li>

                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Wishlist">
                                                            <a href="wishlist.html" class="notifi-wishlist">
                                                                <i data-feather="heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <form action="">
                                                <div class="product-detail">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        <h6 class="name">{{ $product->product_name }}</h6>
                                                    </a>

                                                    <h5 class="sold text-content">
                                                        <span class="theme-color price">TK {{ $product->total_price }}</span>
                                                    @if($product->discount != null)
                                                        <del>TK {{ $product->buy_price }}</del>
                                                    @endif
                                                    </h5>

                                                    <div class="product-rating mt-sm-2 mt-1">
                                                        <ul class="rating">
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star"></i>
                                                            </li>
                                                        </ul>

                                                        <h6 class="theme-color">{{ $product->product_type }}</h6>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                    <div class="add-to-cart-box">
                                                        <a href="{{ route('product.details', $product->slug) }}" class="btn btn-add-cart addcart-button">View</a>

                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="title">
                    <h2>Bowse by Categories</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                        </svg>
                    </span>
                    <p>Top Categories Of The Week</p>
                </div>

                <div class="category-slider-2 product-wrapper no-arrow">
                    @foreach ($categorys as $category)
                    <div>
                        <a href="shop-left-sidebar.html" class="category-box ">
                            <div>
                                <img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" class="blur-up lazyload" alt="">
                                <h5>{{ $category->category_name }}</h5>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="section-t-space section-b-space">
                    <div class="row g-md-4 g-3">
                        @foreach ($off_banner->slice(0, 2) as $fbanner)
                            <div class="col-md-6">
                                <div class="banner-contain hover-effect">
                                    <img src="{{ asset('uplode/banner/off_banner') }}/{{ $fbanner->fbanner_img }}" class="bg-img blur-up lazyload"
                                        alt="">
                                    <div class="banner-details p-center-left p-4">
                                        <div>
                                            <h3 class="text-exo">{{ $fbanner->fbanner_offer }}</h3>
                                            <h4 class="text-russo fw-normal theme-color mb-2">{{ $fbanner->fbanner_titel }}</h4>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="title d-block">
                    <h2>Food Cupboard</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                        </svg>
                    </span>
                    <p>A virtual assistant collects the products from your list</p>
                </div>

                <div class="product-border overflow-hidden wow fadeInUp">
                    <div class="product-box-slider no-arrow">
                    @foreach ($products as $product)
                        <div>
                            <div class="row m-0">
                                <div class="col-12 px-0">
                                    <div class="product-box">
                                        <div class="product-image">
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>
                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Compare">
                                                    <a href="compare.html">
                                                        <i data-feather="refresh-cw"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Wishlist">
                                                    <a href="wishlist.html" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-detail">
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                <h6 class="name h-100">{{ $product->product_name }}</h6>
                                            </a>

                                            <h5 class="sold text-content">
                                                <span class="theme-color price">{{ $product->total_price }}</span>
                                            @if($product->discount != null)
                                                <del>{{ $product->buy_price }}</del>
                                            @endif
                                            </h5>

                                            <div class="product-rating mt-sm-2 mt-1">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                </ul>

                                                <h6 class="theme-color">{{ $product->product_type }}</h6>
                                            </div>

                                            <div class="add-to-cart-box">
                                                <button class="btn btn-add-cart addcart-button">Add
                                                    <span class="add-icon">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </span>
                                                </button>
                                                <div class="cart_qty qty-box">
                                                    <div class="input-group">
                                                        <button type="button" class="qty-left-minus"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input"
                                                            type="text" name="quantity" value="0">
                                                        <button type="button" class="qty-right-plus"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

                @if($coupon->first()->expiry_date > Carbon\Carbon::now()->format('Y-m-y'))
                    <div class="section-t-space">
                        <div class="banner-contain">
                            <img src="{{ asset('uplode/coupon') }}/{{ $coupon->first()->coupon_img }}" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-details p-center p-4 text-white text-center">
                                <div>
                                    <h3 class="lh-base fw-bold offer-text">{{ $coupon->first()->coupon_titel }}</h3>
                                    <h6 class="coupon-code">Use Code : {{ $coupon->first()->coupon_code }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="section-t-space section-b-space">
                    <div class="row g-md-4 g-3">
                        <div class="col-xxl-8 col-xl-12 col-md-7">
                            <div class="banner-contain hover-effect">
                                <img src="{{ asset('uplode/banner/top_banner') }}/{{ $top_banner->first()->tbanner_img }}" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="banner-details p-center-left p-4">
                                    <div>
                                        <h2 class="text-kaushan fw-normal theme-color">Get Ready To</h2>
                                        <h3 class="mt-2 mb-3">TAKE ON THE DAY!</h3>
                                        <p class="text-content banner-text">In publishing and graphic design, Lorem
                                            ipsum is a placeholder text commonly used to demonstrate.</p>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-12 col-md-5">
                            <a href="shop-left-sidebar.html" class="banner-contain hover-effect h-100">
                                <img src="{{ asset('uplode/banner/buttom_banner') }}/{{ $butttom_banner->first()->bbanner_img }}" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="banner-details p-center-left p-4 h-100">
                                    <div>
                                        <h2 class="text-kaushan fw-normal text-danger">20% Off</h2>
                                        <h3 class="mt-2 mb-2 theme-color">SUMMRY</h3>
                                        <h3 class="fw-normal product-name text-title">Product</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="title d-block">
                    <div>
                        <h2>Our best Seller</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>A virtual assistant collects the products from your list</p>
                    </div>
                </div>

                <div class="best-selling-slider product-wrapper wow fadeInUp">
                    <div>
                        <ul class="product-list">
                            @foreach ($products->slice(3,3) as $product)
                            <li>
                                <div class="offer-product">
                                    <a href="{{ route('product.details', $product->slug) }}" class="offer-image">
                                        <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="{{ route('product.details', $product->slug) }}" class="text-title">
                                                <h6 class="name">{{ $product->product_name }}</h6>
                                            </a>
                                            <span>{{ $product->product_type }}</span>
                                            <h6 class="price theme-color">TK {{ $product->total_price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <ul class="product-list">
                            @foreach ($products->slice(0,3) as $product)
                            <li>
                                <div class="offer-product">
                                    <a href="{{ route('product.details', $product->slug) }}" class="offer-image">
                                        <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="{{ route('product.details', $product->slug) }}" class="text-title">
                                                <h6 class="name">{{ $product->product_name }}</h6>
                                            </a>
                                            <span>{{ $product->product_type }}</span>
                                            <h6 class="price theme-color">TK {{ $product->total_price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <ul class="product-list">
                            @foreach ($products->slice(6,3) as $product)
                            <li>
                                <div class="offer-product">
                                    <a href="{{ route('product.details', $product->slug) }}" class="offer-image">
                                        <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}"
                                            class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="offer-detail">
                                        <div>
                                            <a href="{{ route('product.details', $product->slug) }}" class="text-title">
                                                <h6 class="name">{{ $product->product_name }}</h6>
                                            </a>
                                            <span>{{ $product->product_type }}</span>
                                            <h6 class="price theme-color">TK {{ $product->total_price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="section-t-space">
                    <div class="banner-contain hover-effect">
                        <img src="{{ asset('frontend_asset/images/vegetable/banner/21.jpg') }}" class="bg-img blur-up lazyload" alt="">
                        <div class="banner-details p-center banner-b-space w-100 text-center">
                            <div>
                                <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                <h2 class="banner-title">VEGETABLE</h2>
                                <h5 class="lh-sm mx-auto mt-1 text-content">Save up to 5% OFF</h5>
                                <button onclick="location.href = 'shop-left-sidebar.html';"
                                    class="btn btn-animation btn-sm mx-auto mt-sm-3 mt-2">Shop Now <i
                                        class="fa-solid fa-arrow-right icon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="title section-t-space">
                    <h2>Featured Blog</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                        </svg>
                    </span>
                    <p>A virtual assistant collects the products from your list</p>
                </div>

                <div class="slider-3-blog ratio_65 no-arrow product-wrapper">
                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="../assets/images/vegetable/blog/1.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>20 March, 2022</h6>
                                <h5>Fresh Vegetable Online</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="../assets/images/vegetable/blog/2.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>10 April, 2022</h6>
                                <h5>Fresh Combo Fruit</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="../assets/images/vegetable/blog/3.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>10 April, 2022</h6>
                                <h5>Nuts to Eat for Better Health</h5>
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="blog-box">
                            <div class="blog-box-image">
                                <a href="blog-detail.html" class="blog-image">
                                    <img src="../assets/images/vegetable/blog/1.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                </a>
                            </div>

                            <a href="blog-detail.html" class="blog-detail">
                                <h6>20 March, 2022</h6>
                                <h5>Fresh Vegetable Online</h5>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Newsletter Section Start -->
<section class="newsletter-section section-b-space">
    <div class="container-fluid-lg">
        <div class="newsletter-box newsletter-box-2">
            <div class="newsletter-contain py-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                            <div class="newsletter-detail">
                                <h2>Join our newsletter and get...</h2>
                                <h5>$20 discount for your first order</h5>
                                <div class="input-box">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Your Email">
                                    <i class="fa-solid fa-envelope arrow"></i>
                                    <button class="sub-btn  btn-animation">
                                        <span class="d-sm-block d-none">Subscribe</span>
                                        <i class="fa-solid fa-arrow-right icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter Section End -->
@endsection
