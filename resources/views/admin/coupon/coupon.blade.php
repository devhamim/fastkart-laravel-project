@extends('layouts.dashbord')

@section('content')
<!-- New Product Add Start -->
<div class="">
    {{-- Add --}}
    <div class="row">
        <div class="col-12">
            <div class="row">
                {{-- Product inventory view --}}
                <div class="col-sm-7">
                    @if(session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Coupon Name</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Titel</th>
                                    <th>Coupon Image</th>
                                    <th>Expiry Date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($coupons as $sl=>$coupon)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $coupon->discount }}</td>

                                    <td>{{ $coupon->coupon_code }}</td>

                                    @if($coupon->coupon_titel == '')
                                        <td>N/A</td>
                                    @else
                                        <td>{{ $coupon->coupon_titel }}</td>
                                    @endif

                                    @if($coupon->coupon_img == '')
                                        <td>N/A</td>
                                    @else
                                        <td>{{ $coupon->coupon_img }}</td>
                                    @endif

                                    <td>{{ $coupon->expiry_date }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('coupon.delete', $coupon->id) }}">
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
                {{-- Product inventory --}}
                <div class="col-sm-5 m-auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Inventory</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Discount</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Discount %" name="discount">
                                        @error('discount')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Coupon Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Coupon Code" name="coupon_code">
                                            @error('coupon_code')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Coupon Titel</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Coupon Titel" name="coupon_titel">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Coupon Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="coupon_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date"
                                            placeholder="Expiry Date" name="expiry_date">
                                            @error('expiry_date')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->
@endsection

@section('footer_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('#colorpicker').colorpicker();
    </script>
@stop


