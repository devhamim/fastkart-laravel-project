@extends('layouts.dashbord')

@section('content')
  <!-- Table Start -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Order List</h5>
                        <a href="#" class="btn btn-solid">Download all orders</a>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package order-table theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Order Code</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($order_list as $order)
                                        <tr data-bs-toggle="offcanvas" >

                                            <td>#{{ $order->order_id }}</td>

                                            <td>{{ $order->created_at->format('M,d,Y') }}</td>

                                            <td>
                                                @if($order->payment_method == 1)
                                                    Cash of Delevary
                                                @elseif ($order->payment_method == 2)
                                                    SSL Payment
                                                @elseif ($order->payment_method == 3)
                                                    Stripe
                                                @endif
                                            </td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>{{ number_format($order->grand_total) }} TK</td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('order.details', $order->id) }}">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
@endsection

