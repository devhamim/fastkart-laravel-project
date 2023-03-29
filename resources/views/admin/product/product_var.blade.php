@extends('layouts.dashbord')

@section('content')
<!-- New Product Add Start -->
<div class="">
    {{-- Add --}}
    <div class="row">
        <div class="col-12">
            <div class="row">
                {{-- color add --}}
                {{-- <div class="col-sm-4 m-auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Color</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('color.store') }}" method="POST" >
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Color Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="color_name" type="text"
                                            placeholder="Color Name">
                                        @error('color_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Color Code</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="colorpicker" name="color_code" type="text"
                                            placeholder="Color Code">
                                        @error('color_code')
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
                </div> --}}
                {{-- size add --}}
                <div class="col-sm-7 m-auto">
                    @if(session('sizedel'))
                        <div class="alert alert-success">{{ session('sizedel') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Size Name</th>
                                    <th>Quantity</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sizes as $sl=>$size)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $size->size_name }}</td>

                                    <td>{{ $size->quantity }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('size.delete', $size->id) }}">
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
                <div class="col-sm-5 m-auto">
                    @if(session('sizsuccess'))
                        <div class="alert alert-success">{{ session('sizsuccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Size</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('size.store') }}" method="POST" >
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Size Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="size_name" type="text"
                                            placeholder="Size Name">
                                        @error('size_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Quantity</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="quantity" type="number"
                                            placeholder="Quantity">
                                        @error('quantity')
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
                {{-- size number add --}}
                {{-- <div class="col-sm-4 m-auto">
                    @if(session('sizsnuccess'))
                        <div class="alert alert-success">{{ session('sizsuccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product number Size</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('size.number.store') }}" method="POST" >
                            @csrf
                                <div class="mb-4 row align-items-center ">
                                    <label class="form-label-title col-sm-3 mb-0">Size Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="size_number" type="text"
                                            placeholder="Size Number">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- view --}}
    <div class="row">
        <div class="col-12">
            <div class="row">
                {{-- color add --}}
                {{-- <div class="col-sm-6 ">
                    @if(session('colordel'))
                        <div class="alert alert-success">{{ session('colordel') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($colors as $sl=>$color)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $color->color_name }}</td>

                                    <td style="background-color: {{ $color->color_code }}">{{ $color->color_code }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('color.delete', $color->id) }}">
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
                </div> --}}

                {{-- size add --}}
                {{-- <div class="col-sm-6 m-auto">
                    @if(session('sizedel'))
                        <div class="alert alert-success">{{ session('sizedel') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Size Name</th>
                                    <th>Quantity</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sizes as $sl=>$size)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $size->size_name }}</td>

                                    <td>{{ $size->quantity }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('size.delete', $size->id) }}">
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
                </div> --}}
                {{-- size Number --}}
                {{-- <div class="col-sm-3">
                    @if(session('sizendel'))
                        <div class="alert alert-success">{{ session('sizedel') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Size Number</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sizeNumber as $sl=>$size)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $size->size_number }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('sizen.delete', $size->id) }}">
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
                </div> --}}

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


