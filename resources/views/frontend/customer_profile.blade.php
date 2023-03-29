@extends('frontend.master')

@section('content')
<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>User Dashboard</h2>
                    <div class="text-center m-auto d-flex justify-content-center w-100">
                        @if(session('pass'))
                            <div class="alert alert-warning">{{ session('pass') }}</div>
                        @endif
                    </div>
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
                            @else
                                <img src="{{ asset('uplode/customer_cover') }}/{{ Auth::guard('customer')->user()->customer_cover_img }}" class="img-fluid blur-up lazyload"
                                alt="">
                            @endif
                        </div>

                        <div class="profile-contain">
                            <div class="profile-image">
                                <div class="position-relative">
                                    @if(Auth::guard('customer')->user()->customer_img == null)
                                        <img src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64(); }}">
                                    @else
                                        <img src="{{ asset('uplode/customer_profile') }}/{{ Auth::guard('customer')->user()->customer_img }}">
                                    @endif
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
                            <a href="{{ route('customar.wish') }}" class="nav-link"><i data-feather="heart"></i>
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
                            <a href="{{ route('customer.profile') }}" class="nav-link active"><i data-feather="user"></i>
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
                        <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="dashboard-profile">
                                <div class="title">
                                    <h2>My Profile</h2>
                                    <span class="title-leaf">
                                        <svg class="icon-width bg-gray">
                                            <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                        </svg>
                                    </span>
                                </div>

                                <div class="profile-detail dashboard-bg-box">
                                    <div class="dashboard-title">
                                        <h3>Profile Name</h3>
                                    </div>
                                    <div class="profile-name-detail">
                                        <div class="d-sm-flex align-items-center d-block">
                                            <h3>{{ Auth::guard('customer')->user()->name }}</h3>
                                            <div class="product-rating profile-rating">
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
                                                        <i data-feather="star"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#editProfile">Edit</a>
                                    </div>

                                    <div class="location-profile">
                                        <ul>
                                            <li>
                                                <div class="location-box">
                                                    <i data-feather="map-pin"></i>
                                                    <h6>Downers Grove, IL</h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="location-box">
                                                    <i data-feather="mail"></i>
                                                    <h6>{{ Auth::guard('customer')->user()->email }}</h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="location-box">
                                                    <i data-feather="check-square"></i>
                                                    <h6>Licensed for 2 years</h6>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="profile-description">
                                        <p>Residences can be classified by and how they are connected to
                                            neighbouring residences and land. Different types of housing tenure can
                                            be used for the same physical type.</p>
                                    </div>
                                </div>

                                <div class="profile-about dashboard-bg-box">
                                    <div class="row">
                                        <div class="col-xxl-7">
                                            <div class="dashboard-title mb-3">
                                                <h3>Profile About</h3>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        {{-- @if(Auth::guard('customer')->user()->address  == null)
                                                            <span class="text-danger me-2">Please Add Your Information*</span>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                        @else --}}
                                                        <tr>
                                                            <td>Gender :</td>
                                                            <td>{{ Auth::guard('customer')->user()->gender }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Birthday :</td>
                                                            <td>{{ Auth::guard('customer')->user()->birthday }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number :</td>
                                                            <td>
                                                                <a href="javascript:void(0)">{{ Auth::guard('customer')->user()->number }}</a>
                                                            </td>
                                                        </tr>
                                                        @if(Auth::guard('customer')->user()->address != null)
                                                            @if(Auth::guard('customer')->user()->country_id != null)
                                                                @if(Auth::guard('customer')->user()->city_id != null)
                                                                <td>Address :</td>
                                                                <td>{{ Auth::guard('customer')->user()->address }}, {{ Auth::guard('customer')->user()->rel_to_city->name }}, {{ Auth::guard('customer')->user()->rel_to_country->name }}</td>
                                                                @else
                                                                    <td>Address :</td>
                                                                    <td>{{ Auth::guard('customer')->user()->address }}, {{ Auth::guard('customer')->user()->rel_to_country->name }}</td>
                                                                @endif

                                                            @else
                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>{{ Auth::guard('customer')->user()->address }}</td>
                                                                </tr>
                                                            @endif

                                                        @else
                                                            <td>Address :</td>
                                                            <td>
                                                                <span class="text-danger me-2">Please Add Your Information*</span>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                            </td>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="dashboard-title mb-3">
                                                <h3>Login Details</h3>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Email :</td>
                                                            <td>
                                                                <a href="javascript:void(0)">{{ Auth::guard('customer')->user()->email }}
                                                                    <span data-bs-toggle="modal"
                                                                        data-bs-target="#editProfile">Edit</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password :</td>
                                                            <td>
                                                                <a href="javascript:void(0)">●●●●●●
                                                                    <span data-bs-toggle="modal"
                                                                        data-bs-target="#editProfile">Edit</span></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xxl-5">
                                            <div class="profile-image">
                                                <img src="../assets/images/inner-page/dashboard-profile.png"
                                                    class="img-fluid blur-up lazyload" alt="">
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
            <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-xxl-12">
                        <div class="form-floating theme-form-floating">
                            <input type="text" name="name" class="form-control" id="pname" value="{{ Auth::guard('customer')->user()->name }}">
                            <label for="pname">Full Name</label>
                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <div class="form-floating theme-form-floating">
                            <input type="email" name="email" class="form-control" id="email1" value="{{ Auth::guard('customer')->user()->email }}">
                            <label for="email1">Email address</label>
                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <div class="form-floating theme-form-floating">
                            <select name="gender" id="" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="men">Man</option>
                            <option value="woman">Woman</option>
                            <option value="other">Other</option>
                            </select>
                            <label for="">Gender</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating theme-form-floating">
                            <input type="number" name="number" class="form-control" id="number" value="{{ Auth::guard('customer')->user()->number }}">
                            <label for="number">Phone number</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating theme-form-floating">
                            <input type="date" name="birthday" class="form-control" id="birthday"
                                value="{{ Auth::guard('customer')->user()->birthday }}">
                            <label for="birthday">Birthday</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating theme-form-floating">
                            <input type="text" name="address" class="form-control" id="address"
                                value="{{ Auth::guard('customer')->user()->address }}">
                            <label for="address">Add Address</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating theme-form-floating">
                            <input type="file" name="customer_img" class="form-select" id="customer_img"
                                value="">
                            <label for="customer_img">Add Profile Image</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating theme-form-floating">
                            <input type="file" name="customer_cover_img" class="form-select" id="customer_cover_img"
                                value="">
                            <label for="customer_cover_img">Add Cover Image</label>
                        </div>
                    </div>

                    <div class="col-xxl-4">
                        <div class="form-floating theme-form-floating">
                            <select class="form-select" name="country_id" id="country_id">
                                <option value="">Choose Your Country</option>
                                @foreach ($countrys as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <label>Country</label>
                        </div>
                    </div>

                    <div class="col-xxl-4">
                        <div class="form-floating theme-form-floating">
                            <select class="form-select" name="city_id" id="city_id">
                                <option value="">Choose Your City</option>

                            </select>
                            <label>City</label>
                        </div>
                    </div>

                    <div class="col-xxl-4">
                        <div class="form-floating theme-form-floating">
                            <input type="text" name="zip" class="form-control" value="{{ Auth::guard('customer')->user()->zip }}">
                            <label>Zip Code</label>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="form-floating theme-form-floating">
                            <input type="password" name="old_password" class="form-control">
                            <label>Old Password</label>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="form-floating theme-form-floating">
                            <input type="password" name="password" class="form-control">
                            <label>New Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                    </div>
                </div>
            </form>
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

@section('footer_script')
<script>
    $('#country_id').change(function(){
        var country_id = $(this).val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                type:'POST',
                url:'/getcity',
                data:{'country_id':country_id},
                success:function(data){
                    $('#city_id').html(data);
                }
            });

    });
</script>
@endsection
