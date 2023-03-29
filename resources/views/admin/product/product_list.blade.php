@extends('layouts.dashbord')

@section('content')
<!-- Container-fluid starts-->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            @if(session('prodelete'))
                <div class="alert alert-danger">{{ session('prodelete') }}</div>
            @endif
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>Products List</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a class="btn btn-solid" href="{{ route('add.product') }}">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="table_id">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Brand</th>
                                    <th>Current Qty</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Total Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{ asset('uplode/product') }}/{{ $product->product_img }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </td>

                                    <td>{{ $product->product_name }}</td>

                                    <td>{{ $product->rel_to_cat->category_name }}</td>

                                    <td>{{ $product->rel_to_subcat->subcategory_name }}</td>

                                    <td>{{ $product->rel_to_brand->brand_name }}</td>

                                    <td>{{ $product->quantity }}</td>

                                    <td class="td-price">Tk {{ $product->buy_price }}</td>

                                    @if($product->discount != null)
                                    <td class="td-price">{{ $product->discount }} %</td>
                                    @else
                                    <td>N/A</td>
                                    @endif

                                    <td class="td-price">Tk {{ $product->total_price }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('product.inventory', $product->id) }}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('product.delete', $product->id)}}">
                                                    <i class="ri-delete-bin-line"></i>
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
<!-- Container-fluid Ends-->

@endsection

