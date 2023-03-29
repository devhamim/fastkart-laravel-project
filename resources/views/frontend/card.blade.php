@extends('frontend.master')

@section('content')
 <!-- Breadcrumb Section Start -->
 <section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Cart</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <tbody>
                                @php
                                    $total = 0;
                                    $subtotal = 0;
                                @endphp
                                @foreach ($producr_cards as $product)
                                <tr class="product-box-contain">
                                    <td class="product-detail">
                                        <div class="product border-0">
                                            <a href="{{ route('product.details', $product->rel_to_pro->slug) }}" class="product-image">
                                                <img src="{{ asset('uplode/product') }}/{{ $product->rel_to_pro->product_img }}" class="img-fluid blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-detail">
                                                <ul>
                                                    <li style="width: 100px" class="name">
                                                        <a href="{{ route('product.details', $product->rel_to_pro->slug) }}">{{ $product->rel_to_pro->product_name }}</a>
                                                    </li>

                                                    <li class="text-content"><span class="text-title">Sold
                                                            By:</span> {{ $product->rel_to_pro->rel_to_brand->brand_name }}</li>

                                                    <li class="text-content"><span
                                                            class="text-title">Quantity</span> -  {{ $product->quantity }} KG</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="price">
                                        <h4 class="table-title text-content">Price</h4>
                                        <h5>TK {{ number_format($product->rel_to_pro->total_price) }}
                                            @if($product->rel_to_pro->discount != null)
                                                <del class="text-content">TK {{ number_format($product->rel_to_pro->buy_price) }}</del>
                                            @endif
                                        </h5>
                                        @if($product->rel_to_pro->discount != null)
                                            <h6 class="theme-color">You Save : TK {{ number_format($product->rel_to_pro->buy_price-$product->rel_to_pro->total_price) }}</h6>
                                        @endif
                                    </td>

                                    <td class="quantity">
                                        <h4 class="table-title text-content">Qty</h4>
                                        <div class="quantity-price">
                                            <div class="cart_qty">
                                                <div class="input-group">
                                                    <h5 class="text-white">{{ $product->quantity }} KG</h5>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @php
                                        $total = $product->rel_to_pro->total_price*$product->quantity;
                                        $subtotal += $product->rel_to_pro->total_price*$product->quantity;
                                    @endphp
                                    <td class="subtotal">
                                        <h4 class="table-title text-content">Total</h4>
                                        <h5>TK {{ number_format($total) }}</h5>
                                    </td>

                                    <td class="save-remove">
                                        <h4 class="table-title text-content">Action</h4>
                                        <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                        <a class="remove close_button" href="{{ Route('card.delete', $product->id) }}">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="summery-box p-sticky">
                    <div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                    <form action="{{ route('product.card') }}" method="GET">
                        <div class="coupon-cart">
                            <h6 class="text-content mb-2">Coupon Apply</h6>
                            <div class="mb-3 coupon-box input-group">
                                <input type="text" class="form-control" name="coupon" value="{{ @$_GET['coupon'] }}"d="exampleFormControlInput1"
                                    placeholder="Enter Coupon Code Here...">
                                <button class="btn-apply">Apply</button>
                            </div>
                        </div>
                        @if($message)
                            <strong class="text-warning">{{ $message }}</strong>
                        @endif
                        </form>

                        <ul>

                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">TK {{ number_format($subtotal) }}</h4>
                            </li>

                            <li>
                                <h4>Coupon Discount</h4>
                                <h4 class="price">(-) {{ $discount }}%</h4>
                            </li>

                            <li class="align-items-start">
                                @php

                                    if ($subtotal < 500) {
                                        $shipping =  500 * 0.05;
                                    } else {
                                        $shipping = $subtotal * 0.05;
                                    }

                                    $discountedPrice = $subtotal + $shipping;
                                @endphp
                                <h4>Shipping</h4>
                                <h4 class="price text-end">
                                    (+) {{ $shipping }}
                                </h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        @php
                            $grand_total = $discountedPrice-$discountedPrice*$discount/100;
                        @endphp
                        <li class="list-total border-top-0">
                            <h4>Total (BDT)</h4>
                            <h4 class="price theme-color">TK {{ number_format($grand_total) }}</h4>

                        </li>
                    </ul>
                    @php
                        session([
                            'subtotal'=>$subtotal,
                            'grand_total'=>$grand_total,
                            'shipping'=>$shipping,
                            'discount'=>$discount,
                        ]);
                    @endphp

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button onclick="location.href = '{{ route('chackout') }}';"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>

                            <li>
                                <button onclick="location.href = 'index.html';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection
