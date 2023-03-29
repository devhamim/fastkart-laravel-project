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
                    @if(session('invdel'))
                        <div class="alert alert-danger">{{ session('invdel') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($productInventory as $sl=>$inventory)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $inventory->rel_to_pot->product_name }}</td>


                                    <td>{{ $inventory->quantity }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('inventory.delete', $inventory->id) }}">
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
                    @if(session('seccess'))
                        <div class="alert alert-success">{{ session('seccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Inventory</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('inventory.store') }}" method="POST" >
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                    <div class="col-sm-9">
                                        <input name="product_id" type="hidden" value="{{ $products->first()->id }}">
                                        <input class="form-control" type="text"
                                            placeholder="Product Name" value="{{ $products->first()->product_name }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Quantity</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="quantity" type="text"
                                            placeholder="Quantity">
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


