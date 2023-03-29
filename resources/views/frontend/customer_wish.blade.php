@extends('frontend.master')

@section('content')

<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>User Dashboard</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- User Dashboard Section Start -->
<section class="user-dashboard-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <div class="dashboard-left-sidebar">
                    <div class="close-button d-flex d-lg-none">
                        <button class="close-sidebar">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="profile-box">
                        <div class="cover-image">
                            @if(Auth::guard('customer')->user()->customer_cover_img == null)
                                <img src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64(); }}" class="img-fluid blur-up lazyload"
                                alt="">
                            @endif
                        </div>

                        <div class="profile-contain">
                            <div class="profile-image">
                                <div class="position-relative">
                                    @if(Auth::guard('customer')->user()->customer_img == null)
                                        <img src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64(); }}"
                                    @endif
                                        class="blur-up lazyload update_img" alt="">
                                    <div class="cover-icon">
                                        <i class="fa-solid fa-pen">
                                            <input type="file" onchange="readURL(this,0)">
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-name">
                                <h3>{{ Auth::guard('customer')->user()->name }}</h3>
                                <h6 class="text-content">{{ Auth::guard('customer')->user()->email }}</h6>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.dashbord') }}" class="nav-link "><i data-feather="home"></i>
                                DashBoard</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.order') }}" class="nav-link"><i data-feather="shopping-bag"></i>Order</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.wish') }}" class="nav-link active"><i data-feather="heart"></i>
                                Wishlist</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.card') }}" class="nav-link"><i data-feather="credit-card"></i> Saved Card</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.address') }}" class="nav-link"><i data-feather="map-pin"></i>
                                Address</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customer.profile') }}" class="nav-link"><i data-feather="user"></i>
                                Profile</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="{{ route('customar.privacy') }}" class="nav-link"><i data-feather="shield"></i>
                                Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xxl-9 col-lg-8">
                <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                    Menu</button>
                <div class="dashboard-right-sidebar">
                    <div>

                        <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                            aria-labelledby="pills-wishlist-tab">
                            <div class="dashboard-wishlist">
                                <div class="title">
                                    <h2>My Wishlist History</h2>
                                    <span class="title-leaf title-leaf-gray">
                                        <svg class="icon-width bg-gray">
                                            <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="row g-sm-4 g-3">
                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/2.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Vegetable</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Cheesy feet
                                                        cheesy grin brie. Mascarpone cheese and wine hard cheese the
                                                        big cheese everyone loves smelly cheese macaroni cheese
                                                        croque monsieur.</p>
                                                    <h6 class="unit mt-1">250 ml</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$08.02</span>
                                                        <del>$15.15</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/3.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Vegetable</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Peanut Butter Bite Premium Butter Cookies
                                                            600 g</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Feta taleggio
                                                        croque monsieur swiss manchego cheesecake dolcelatte
                                                        jarlsberg. Hard cheese danish fontina boursin melted cheese
                                                        fondue.</p>
                                                    <h6 class="unit mt-1">350 G</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$04.33</span>
                                                        <del>$10.36</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/4.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Snacks</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">SnackAmor Combo Pack of Jowar Stick and
                                                            Jowar Chips</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Lancashire
                                                        hard cheese parmesan. Danish fontina mozzarella cream cheese
                                                        smelly cheese cheese and wine cheesecake dolcelatte stilton.
                                                        Cream cheese parmesan who moved my cheese when the cheese
                                                        comes out everybody's happy cream cheese red leicester
                                                        ricotta edam.</p>
                                                    <h6 class="unit mt-1">570 G</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$12.52</span>
                                                        <del>$13.62</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/5.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Snacks</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                                        </h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Cheddar
                                                        cheddar pecorino hard cheese hard cheese cheese and biscuits
                                                        bocconcini babybel. Cow goat paneer cream cheese fromage
                                                        cottage cheese cauliflower cheese jarlsberg.</p>
                                                    <h6 class="unit mt-1">100 G</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$10.25</span>
                                                        <del>$12.36</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/6.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Vegetable</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Fantasy Crunchy Choco Chip Cookies</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Bavarian
                                                        bergkase smelly cheese swiss cut the cheese lancashire who
                                                        moved my cheese manchego melted cheese. Red leicester paneer
                                                        cow when the cheese comes out everybody's happy croque
                                                        monsieur goat melted cheese port-salut.</p>
                                                    <h6 class="unit mt-1">550 G</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$14.25</span>
                                                        <del>$16.57</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/7.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Vegetable</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Melted cheese
                                                        babybel chalk and cheese. Port-salut port-salut cream cheese
                                                        when the cheese comes out everybody's happy cream cheese
                                                        hard cheese cream cheese red leicester.</p>
                                                    <h6 class="unit mt-1">1 Kg</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$12.68</span>
                                                        <del>$14.69</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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

                                    <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                        <div class="product-box-3 theme-bg-white h-100">
                                            <div class="product-header">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="../assets/images/cake/product/2.png"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="product-header-top">
                                                        <button class="btn wishlist-button close_button">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-footer">
                                                <div class="product-detail">
                                                    <span class="span-name">Vegetable</span>
                                                    <a href="product-left-thumbnail.html">
                                                        <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                    </a>
                                                    <p class="text-content mt-1 mb-2 product-content">Squirty cheese
                                                        cottage cheese cheese strings. Red leicester paneer danish
                                                        fontina queso lancashire when the cheese comes out
                                                        everybody's happy cottage cheese paneer.</p>
                                                    <h6 class="unit mt-1">250 ml</h6>
                                                    <h5 class="price">
                                                        <span class="theme-color">$08.02</span>
                                                        <del>$15.15</del>
                                                    </h5>
                                                    <div class="add-to-cart-box mt-2">
                                                        <button class="btn btn-add-cart addcart-button"
                                                            tabindex="0">Add
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- User Dashboard Section End -->


 <!-- Deal Box Modal Start -->
 <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <div>
                 <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                 <p class="mt-1 text-content">Recommended deals for you.</p>
             </div>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="deal-offer-box">
                 <ul class="deal-offer-list">
                     <li class="list-1">
                         <div class="deal-offer-contain">
                             <a href="shop-left-sidebar.html" class="deal-image">
                                 <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                     alt="">
                             </a>

                             <a href="shop-left-sidebar.html" class="deal-contain">
                                 <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                 <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                             </a>
                         </div>
                     </li>

                     <li class="list-2">
                         <div class="deal-offer-contain">
                             <a href="shop-left-sidebar.html" class="deal-image">
                                 <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                     alt="">
                             </a>

                             <a href="shop-left-sidebar.html" class="deal-contain">
                                 <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                 <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                             </a>
                         </div>
                     </li>

                     <li class="list-3">
                         <div class="deal-offer-contain">
                             <a href="shop-left-sidebar.html" class="deal-image">
                                 <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                     alt="">
                             </a>

                             <a href="shop-left-sidebar.html" class="deal-contain">
                                 <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                 <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                             </a>
                         </div>
                     </li>

                     <li class="list-1">
                         <div class="deal-offer-contain">
                             <a href="shop-left-sidebar.html" class="deal-image">
                                 <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                     alt="">
                             </a>

                             <a href="shop-left-sidebar.html" class="deal-contain">
                                 <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                 <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- Deal Box Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
 <div class="setting-box">
     <button class="btn setting-button">
         <i class="fa-solid fa-gear"></i>
     </button>

     <div class="theme-setting-2">
         <div class="theme-box">
             <ul>
                 <li>
                     <div class="setting-name">
                         <h4>Color</h4>
                     </div>
                     <div class="theme-setting-button color-picker">
                         <form class="form-control">
                             <label for="colorPick" class="form-label mb-0">Theme Color</label>
                             <input type="color" class="form-control form-control-color" id="colorPick"
                                 value="#0da487" title="Choose your color">
                         </form>
                     </div>
                 </li>

                 <li>
                     <div class="setting-name">
                         <h4>Dark</h4>
                     </div>
                     <div class="theme-setting-button">
                         <button class="btn btn-2 outline" id="darkButton">Dark</button>
                         <button class="btn btn-2 unline" id="lightButton">Light</button>
                     </div>
                 </li>

                 <li>
                     <div class="setting-name">
                         <h4>RTL</h4>
                     </div>
                     <div class="theme-setting-button rtl">
                         <button class="btn btn-2 rtl-unline">LTR</button>
                         <button class="btn btn-2 rtl-outline">RTL</button>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </div>

 <div class="back-to-top">
     <a id="back-to-top" href="#">
         <i class="fas fa-chevron-up"></i>
     </a>
 </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- Add address modal box start -->
<div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <form>
                 <div class="form-floating mb-4 theme-form-floating">
                     <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                     <label for="fname">First Name</label>
                 </div>
             </form>

             <form>
                 <div class="form-floating mb-4 theme-form-floating">
                     <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                     <label for="lname">Last Name</label>
                 </div>
             </form>

             <form>
                 <div class="form-floating mb-4 theme-form-floating">
                     <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                     <label for="email">Email Address</label>
                 </div>
             </form>

             <form>
                 <div class="form-floating mb-4 theme-form-floating">
                     <textarea class="form-control" placeholder="Leave a comment here" id="address"
                         style="height: 100px"></textarea>
                     <label for="address">Enter Address</label>
                 </div>
             </form>

             <form>
                 <div class="form-floating mb-4 theme-form-floating">
                     <input type="email" class="form-control" id="pin" placeholder="Enter Pin Code">
                     <label for="pin">Pin Code</label>
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
             <button type="button" class="btn theme-bg-color btn-md text-white" data-bs-dismiss="modal">Save
                 changes</button>
         </div>
     </div>
 </div>
</div>
<!-- Add address modal box end -->

<!-- Location Modal Start -->
<div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel1">Choose your Delivery Location</h5>
             <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="location-list">
                 <div class="search-input">
                     <input type="search" class="form-control" placeholder="Search Your Area">
                     <i class="fa-solid fa-magnifying-glass"></i>
                 </div>

                 <div class="disabled-box">
                     <h6>Select a Location</h6>
                 </div>

                 <ul class="location-select custom-height">
                     <li>
                         <a href="javascript:void(0)">
                             <h6>Alabama</h6>
                             <span>Min: $130</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Arizona</h6>
                             <span>Min: $150</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>California</h6>
                             <span>Min: $110</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Colorado</h6>
                             <span>Min: $140</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Florida</h6>
                             <span>Min: $160</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Georgia</h6>
                             <span>Min: $120</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Kansas</h6>
                             <span>Min: $170</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Minnesota</h6>
                             <span>Min: $120</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>New York</h6>
                             <span>Min: $110</span>
                         </a>
                     </li>

                     <li>
                         <a href="javascript:void(0)">
                             <h6>Washington</h6>
                             <span>Min: $130</span>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- Location Modal End -->

<!-- Edit Profile Start -->
<div class="modal fade theme-modal" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel2"
 aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel2">Edit Profile</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="row g-4">
                 <div class="col-xxl-12">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="pname" value="Jack Jennas">
                             <label for="pname">Full Name</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-6">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="email" class="form-control" id="email1" value="vicki.pope@gmail.com">
                             <label for="email1">Email address</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-6">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input class="form-control" type="tel" value="4567891234" name="mobile" id="mobile"
                                 maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                     this.value.slice(0, this.maxLength);">
                             <label for="mobile">Email address</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-12">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="address1"
                                 value="8424 James Lane South San Francisco">
                             <label for="address1">Add Address</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-12">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="address2" value="CA 94080">
                             <label for="address2">Add Address 2</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-4">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <select class="form-select" id="floatingSelect1"
                                 aria-label="Floating label select example">
                                 <option selected>Choose Your Country</option>
                                 <option value="kindom">United Kingdom</option>
                                 <option value="states">United States</option>
                                 <option value="fra">France</option>
                                 <option value="china">China</option>
                                 <option value="spain">Spain</option>
                                 <option value="italy">Italy</option>
                                 <option value="turkey">Turkey</option>
                                 <option value="germany">Germany</option>
                                 <option value="russian">Russian Federation</option>
                                 <option value="malay">Malaysia</option>
                                 <option value="mexico">Mexico</option>
                                 <option value="austria">Austria</option>
                                 <option value="hong">Hong Kong SAR, China</option>
                                 <option value="ukraine">Ukraine</option>
                                 <option value="thailand">Thailand</option>
                                 <option value="saudi">Saudi Arabia</option>
                                 <option value="canada">Canada</option>
                                 <option value="singa">Singapore</option>
                             </select>
                             <label for="floatingSelect">Country</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-4">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <select class="form-select" id="floatingSelect">
                                 <option selected>Choose Your City</option>
                                 <option value="kindom">India</option>
                                 <option value="states">Canada</option>
                                 <option value="fra">Dubai</option>
                                 <option value="china">Los Angeles</option>
                                 <option value="spain">Thailand</option>
                             </select>
                             <label for="floatingSelect">City</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-4">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="address3" value="94080">
                             <label for="address3">Pin Code</label>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-animation btn-md fw-bold"
                 data-bs-dismiss="modal">Close</button>
             <button type="button" data-bs-dismiss="modal"
                 class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
         </div>
     </div>
 </div>
</div>
<!-- Edit Profile End -->

<!-- Edit Card Start -->
<div class="modal fade theme-modal" id="editCard" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel8">Edit Card</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="row g-4">
                 <div class="col-xxl-6">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="finame" value="Mark">
                             <label for="finame">First Name</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-6">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <input type="text" class="form-control" id="laname" value="Jecno">
                             <label for="laname">Last Name</label>
                         </div>
                     </form>
                 </div>

                 <div class="col-xxl-4">
                     <form>
                         <div class="form-floating theme-form-floating">
                             <select class="form-select" id="floatingSelect12"
                                 aria-label="Floating label select example">
                                 <option selected>Card Type</option>
                                 <option value="kindom">Visa Card</option>
                                 <option value="states">MasterCard Card</option>
                                 <option value="fra">RuPay Card</option>
                                 <option value="china">Contactless Card</option>
                                 <option value="spain">Maestro Card</option>
                             </select>
                             <label for="floatingSelect12">Card Type</label>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-animation btn-md fw-bold"
                 data-bs-dismiss="modal">Cancel</button>
             <button type="button" class="btn theme-bg-color btn-md fw-bold text-light">Update Card</button>
         </div>
     </div>
 </div>
</div>
<!-- Edit Card End -->

<!-- Remove Profile Modal Start -->
<div class="modal fade theme-modal remove-profile" id="removeProfile" tabindex="-1"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header d-block text-center">
             <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="remove-box">
                 <p>The permission for the use/group, preview is inherited from the object, object will create a
                     new permission for this object</p>
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
             <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                 data-bs-target="#removeAddress" data-bs-toggle="modal">Yes</button>
         </div>
     </div>
 </div>
</div>
<div class="modal fade theme-modal remove-profile" id="removeAddress" tabindex="-1"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fa-solid fa-xmark"></i>
             </button>
         </div>
         <div class="modal-body">
             <div class="remove-box text-center">
                 <h4 class="text-content">It's Removed.</h4>
             </div>
         </div>
         <div class="modal-footer pt-0">
             <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                 data-bs-dismiss="modal">Close</button>
         </div>
     </div>
 </div>
</div>
<!-- Remove Profile Modal End -->
@endsection
