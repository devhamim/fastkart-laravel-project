@extends('frontend.master')

@section('content')
 <!-- Breadcrumb Section Start -->
 <section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Checkout</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout section Start -->
<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
    <form action="{{ route('chackout.store') }}" method="POST">
        @csrf
        <div class="row g-sm-4 g-3">
            <div class="col-lg-8">
                <div class="left-sidebar-checkout">
                    <div class="checkout-detail-box">
                        <ul>
                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                        class="lord-icon">
                                    </lord-icon>
                                </div>
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h4>Delivery Address</h4>
                                    </div>

                                    <div class="checkout-detail">
                                        <div class="row g-4">

                                            <div class="col-xxl-12 col-lg-12 col-md-12">
                                                <div class="delivery-address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="hidden" name="{{ $customer_address->first()->id }}"
                                                                id="flexRadioDefault1">
                                                        </div>

                                                        {{-- <div class="label">
                                                            <label>Home</label>
                                                        </div> --}}

                                                        <ul class="delivery-address-detail">
                                                            <li>
                                                                <h4 class="fw-500">{{ $customer_address->first()->name }}</h4>
                                                                <input type="hidden" name="name" value="{{ $customer_address->first()->name }}">
                                                                <input type="hidden" name="customer_id" value="{{ $customer_address->first()->id }}">
                                                            </li>

                                                            @if($customer_address->first()->address != null)
                                                                <li>
                                                                <p class="text-content"><span
                                                                        class="text-title">Address
                                                                        : </span>{{ $customer_address->first()->address }}, {{ $customer_address->first()->rel_to_city->name }}, {{ $customer_address->first()->rel_to_country->name }}</p>
                                                                        <input type="hidden" name="address" value="{{ $customer_address->first()->address }}">
                                                                        <input type="hidden" name="city_id" value="{{ $customer_address->first()->city_id }}">
                                                                        <input type="hidden" name="country_id" value="{{ $customer_address->first()->country_id }}">
                                                            </li>
                                                            @else
                                                            <li>
                                                                <p class="text-content"><span
                                                                        class="text-title">Address
                                                                        : </span><input type="hidden" name="address"></p>
                                                                        @error('number')
                                                                        <strong class="text-danger">Address Require</strong>
                                                                        @enderror

                                                            </li>
                                                            @endif
                                                            <li>
                                                                <h6 class="text-content"><span
                                                                        class="text-title">Zip Code
                                                                        :</span> {{ $customer_address->first()->zip }}</h6>
                                                                        <input type="hidden" name="zip" value="{{ $customer_address->first()->zip }}">
                                                            </li>
                                                            @if($customer_address->first()->number != null)
                                                            <li>
                                                                <h6 class="text-content mb-0"><span
                                                                        class="text-title">Phone
                                                                        :</span> {{ $customer_address->first()->number }}</h6>
                                                                        <input type="hidden" name="number" value="{{ $customer_address->first()->number }}">
                                                            </li>
                                                            @else
                                                            <li>
                                                                <p class="text-content"><span
                                                                        class="text-title">Number
                                                                        : </span><input type="hidden" name="number"></p>
                                                                @error('number')
                                                                <strong class="text-danger">Phone number Require</strong>
                                                                @enderror

                                                            </li>
                                                            @endif

                                                            <li>
                                                                <h6 class="text-content mb-0"><span
                                                                        class="text-title">Email
                                                                        :</span> {{ $customer_address->first()->email }}</h6>
                                                                        <input type="hidden" name="email" value="{{ $customer_address->first()->email }}">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                        trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                        class="lord-icon">
                                    </lord-icon>
                                </div>

                                <div class="checkout-box">
                                    @if(session('pament'))
                                        <div class="alert alert-success">{{ session('pament') }}</div>
                                    @endif
                                    <div class="checkout-title">
                                        <h4>Payment Option</h4>
                                    </div>

                                    <div class="checkout-detail">
                                        <div class="accordion accordion-flush custom-accordion"
                                            id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingFour">
                                                    <div class="accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="cash"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="payment_method" value="1" id="cash" > Cash
                                                                On Delivery</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="accordion-item">
                                                <div class="accordion-header" >
                                                    <div class="accordion-button collapsed">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="ssl"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="payment_method" value="2" id="cash" > SSL Pay</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingOne">
                                                    <div class="accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="credit"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="payment_method" value="2" id="credit">
                                                                Credit or Debit Card</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <div class="payment-method">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="text" class="form-control"
                                                                            id="credit2"
                                                                            placeholder="Enter Credit & Debit Card Number">
                                                                        <label for="credit2">Enter Credit & Debit
                                                                            Card Number</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-4">
                                                                <div
                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="expiry" placeholder="Enter Expiry Date">
                                                                    <label for="expiry">Expiry Date</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-4">
                                                                <div
                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                    <input type="text" class="form-control" id="cvv"
                                                                        placeholder="Enter CVV Number">
                                                                    <label for="cvv">CVV Number</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-xxl-4">
                                                                <div
                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                    <input type="password" class="form-control"
                                                                        id="password" placeholder="Enter Password">
                                                                    <label for="password">Password</label>
                                                                </div>
                                                            </div>

                                                            <div class="button-group mt-0">
                                                                <ul>
                                                                    <li>
                                                                        <button
                                                                            class="btn btn-light shopping-button">Cancel</button>
                                                                    </li>

                                                                    <li>
                                                                        <button class="btn btn-animation">Use This
                                                                            Card</button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingTwo">
                                                    <div class="accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="banking"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="payment_method" value="3" id="banking">Net
                                                                Banking</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <h5 class="text-uppercase mb-4">Select Your Bank
                                                        </h5>
                                                        <div class="row g-2">
                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank1">
                                                                    <label class="form-check-label"
                                                                        for="bank1">Industrial & Commercial
                                                                        Bank</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank2">
                                                                    <label class="form-check-label"
                                                                        for="bank2">Agricultural Bank</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank3">
                                                                    <label class="form-check-label" for="bank3">Bank
                                                                        of America</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank4">
                                                                    <label class="form-check-label"
                                                                        for="bank4">Construction Bank Corp.</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank5">
                                                                    <label class="form-check-label" for="bank5">HSBC
                                                                        Holdings</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="bank6">
                                                                    <label class="form-check-label"
                                                                        for="bank6">JPMorgan Chase & Co.</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="select-option">
                                                                    <div class="form-floating theme-form-floating">
                                                                        <select
                                                                            class="form-select theme-form-select"
                                                                            aria-label="Default select example">
                                                                            <option value="hsbc">HSBC Holdings
                                                                            </option>
                                                                            <option value="loyds">Lloyds Banking
                                                                                Group</option>
                                                                            <option value="natwest">Nat West Group
                                                                            </option>
                                                                            <option value="Barclays">Barclays
                                                                            </option>
                                                                            <option value="other">Others Bank
                                                                            </option>
                                                                        </select>
                                                                        <label>Select Other Bank</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingThree">
                                                    <div class="accordion-button collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="wallet"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="payment_method" value="4" id="wallet">My
                                                                Wallet</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <h5 class="text-uppercase mb-4">Select Your Wallet
                                                        </h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <label class="form-check-label"
                                                                        for="amazon"><input
                                                                            class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="amazon">Amazon Pay</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="gpay">
                                                                    <label class="form-check-label"
                                                                        for="gpay">Google Pay</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="airtel">
                                                                    <label class="form-check-label"
                                                                        for="airtel">Airtel Money</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="paytm">
                                                                    <label class="form-check-label"
                                                                        for="paytm">Paytm Pay</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="jio">
                                                                    <label class="form-check-label" for="jio">JIO
                                                                        Money</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="free">
                                                                    <label class="form-check-label"
                                                                        for="free">Freecharge</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="right-side-summery-box">
                    <div class="summery-box-2">
                        <div class="summery-header">
                            <h3>Order Summery</h3>
                        </div>

                        <ul class="summery-contain">
                            @foreach ($cards as $card)
                            <li>
                                <img src="{{ asset('uplode/product') }}/{{ $card->rel_to_pro->product_img }}"
                                    class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                <h4 style="width: 60%">{{ $card->rel_to_pro->product_name }} <span>X {{ $card->quantity }}</span></h4>
                                <h4 class="price">TK {{ number_format($card->rel_to_pro->total_price) }}</h4>
                            </li>
                            @endforeach
                        </ul>

                        <ul class="summery-total">
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">TK {{ number_format(session('subtotal')) }}</h4>
                                <input type="hidden" name="subtotal" value="{{ session('subtotal') }}">
                            </li>

                            <li>
                                <h4>Shipping</h4>
                                <h4 class="price">(+) TK {{ session('shipping') }}</h4>
                                <input type="hidden" name="shipping" value="{{ session('shipping') }}">
                            </li>

                            <li>
                                <h4>Coupon/Code</h4>
                                <h4 class="price">(-) {{ session('discount') }}%</h4>
                                <input type="hidden" name="discount" value="{{ session('discount') }}">
                            </li>

                            <li class="list-total">
                                <h4>Total (BDT)</h4>
                                <h4 class="price">TK {{ number_format(session('grand_total')) }}</h4>
                                <input type="hidden" name="grand_total" value="{{ session('grand_total') }}">
                            </li>
                        </ul>
                    </div>

                    <div class="checkout-offer">
                        <div class="offer-title">
                            <div class="offer-icon">
                                <img src="../assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                            </div>
                            <div class="offer-name">
                                <h6>Available Offers</h6>
                            </div>
                        </div>

                        <ul class="offer-detail">
                            <li>
                                <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                            </li>
                            <li>
                                <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                            </li>
                        </ul>
                    </div>

                    <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
<!-- Checkout section End -->
@endsection
