@extends('layouts.dashbord')

@section('content')
<!-- tracking table start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="title-header title-header-block package-card">
                        <div>
                            {{-- <h5>Order {{ $orders->order_id }}</h5> --}}
                        </div>
                        <div class="card-order-section">
                            <ul>
                                {{-- <li>{{ $order_detailss->created_at->format('M.d,Y') }}</li> --}}
                                {{-- <li>{{ App\Models\orderProduct::where('order_id', $order_detailss->order_id)->count() }} items</li> --}}
                                {{-- <li>Total {{ number_format($orders->grand_total) }}</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Items</th>
                                                <th class="text-end" colspan="2">
                                                    <a href="javascript:void(0)"
                                                        class="theme-color">Edit
                                                        Items</a>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            {{ $order }}
                                            {{-- {{ $order->rel_to_orpro}} --}}
                                            @foreach ($order as $order_list)
                                            <tr class="table-order">
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <img src="assets/images/profile/1.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <p>Product Name</p>
                                                    {{-- <h5>{{ $order_list->rel_to_orpro->quantity }} ffff</h5> --}}
                                                </td>
                                                <td>
                                                    <p>Quantity</p>
                                                    {{-- <h5>{{ $order_list->rel_to_orderpro->quantity }}</h5> --}}
                                                </td>
                                                <td>
                                                    <p>Price</p>
                                                    <h5>$63.54</h5>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h5>Subtotal :</h5>
                                                </td>
                                                <td>
                                                    <h4>$55.00</h4>
                                                </td>
                                            </tr>

                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h5>Shipping :</h5>
                                                </td>
                                                <td>
                                                    <h4>$12.00</h4>
                                                </td>
                                            </tr>

                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h5>Tax(GST) :</h5>
                                                </td>
                                                <td>
                                                    <h4>$10.00</h4>
                                                </td>
                                            </tr>

                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h4 class="theme-color fw-bold">Total Price :</h4>
                                                </td>
                                                <td>
                                                    <h4 class="theme-color fw-bold">$6935.00</h4>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="order-success">
                                    <div class="row g-4">
                                        <h4>summery</h4>
                                        <ul class="order-details">
                                            <li>Order ID: 5563853658932</li>
                                            <li>Order Date: October 22, 2018</li>
                                            <li>Order Total: $907.28</li>
                                        </ul>

                                        <h4>shipping address</h4>
                                        <ul class="order-details">
                                            <li>Gerg Harvell</li>
                                            <li>568, Suite Ave.</li>
                                            <li>Austrlia, 235153 Contact No. 48465465465</li>
                                        </ul>

                                        <div class="payment-mode">
                                            <h4>payment method</h4>
                                            <p>Pay on Delivery (Cash/Card). Cash on delivery (COD)
                                                available. Card/Net banking acceptance subject to device
                                                availability.</p>
                                        </div>

                                        <div class="delivery-sec">
                                            <h3>expected date of delivery: <span>october 22, 2018</span>
                                            </h3>
                                            <a href="order-tracking.html">track order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tracking table end -->
@endsection

