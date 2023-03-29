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
                            <a href="{{ route('customar.card') }}" class="nav-link active"><i data-feather="credit-card"></i> Saved Card</a>
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

                        <div class="tab-pane fade show" id="pills-card" role="tabpanel"
                            aria-labelledby="pills-card-tab">
                            <div class="dashboard-card">
                                <div class="title title-flex">
                                    <div>
                                        <h2>My Card Details</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                        data-bs-toggle="modal" data-bs-target="#editCard"><i data-feather="plus"
                                            class="me-2"></i> Add New Card</button>
                                </div>

                                <div class="row g-4">
                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>08/05</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>Audrey Carol</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="../assets/images/payment-icon/1.jpg"
                                                            class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#removeProfile"><i
                                                        class="far fa-minus-square"></i> delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details card-visa">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 1536</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>12/23</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>Leah Heather</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="../assets/images/payment-icon/2.jpg"
                                                            class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#removeProfile"><i
                                                        class="far fa-minus-square"></i> delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
                                        </div>
                                    </div>

                                    <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details dabit-card">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 1366</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>05/21</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>mark jecno</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="../assets/images/payment-icon/3.jpg"
                                                            class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#removeProfile"><i
                                                        class="far fa-minus-square"></i> delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
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
