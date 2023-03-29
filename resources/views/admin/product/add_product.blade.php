@extends('layouts.dashbord')

@section('content')
<!-- New Product Add Start -->
 <!-- New Product Add Start -->
 <div class="">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 m-auto">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form class="theme-form theme-form-2 mega-form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>


                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Product
                                        Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="product_name" type="text"
                                            placeholder="Product Name">
                                            @error('product_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                    </div>

                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Product
                                        Type</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="product_type" name="state">
                                            <option disabled>Static Menu</option>
                                            <option value="simple">Simple</option>
                                            <option value="classified">Classified</option>
                                        </select>
                                        @error('product_type')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Category</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" id="category_id" name="category_id">
                                            <option value="">-- Category Menu --</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Subcategory</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" id="subcategory_id" name="subcategory_id">
                                            <option value="">-- Subcategory Menu --</option>
                                        </select>
                                        @error('subcategory_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Brand</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="brand_id">
                                            <option >Brand Menu</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="unit">
                                            <option >Unit Menu</option>
                                            <option value="kilogram">Kilogram</option>
                                            <option value="pieces">Pieces</option>
                                        </select>
                                        @error('unit')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" name="exchange"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" checked="" name="refund"><span
                                                class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Description</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Description</label>
                                        <div class="col-sm-9">
                                            {{-- <div id="editor"></div> --}}
                                            <textarea name="long_desp" id="summernote" class="form-control" placeholder="Long Description"></textarea>
                                            @error('long_desp')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Images</h5>
                            </div>
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Images</label>
                                    <div class="col-sm-9">
                                        <input name="product_img" class="form-control form-choose" type="file"
                                            id="formFile">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Thumbnail
                                        Image</label>
                                    <div class="col-sm-9">
                                        <input name="thumbnail[]" class="form-control form-choose" type="file"
                                            id="formFileMultiple1" multiple>
                                    </div>
                                </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Videos</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Video
                                        Provider</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option>Vimeo</option>
                                            <option>Youtube</option>
                                            <option>Dailymotion</option>
                                            <option>Vimeo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Video
                                        Link</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text"
                                            placeholder="Video Link">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product variations</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Option
                                        Name</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option>Color</option>
                                            <option>Size</option>
                                            <option>Material</option>
                                            <option>Style</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Option
                                        Value</label>
                                    <div class="col-sm-9">
                                        <div class="bs-example">
                                            <input type="text" class="form-control"
                                                placeholder="Type tag & hit enter" id="#inputTag"
                                                data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <a href="#" class="add-option"><i class="ri-add-line me-2"></i> Add Another
                                Option</a>
                        </div>
                    </div> --}}

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Shipping</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Weight
                                        (kg)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" placeholder="Weight">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                        (cm)</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="state">
                                            <option>Length</option>
                                            <option>Width</option>
                                            <option>Height</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Inventory</h5>
                            </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">SKU</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="sku" type="text">
                                        @error('sku')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Quantity</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="quantity" type="number">
                                        @error('quantity')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                            {{-- <table class="table variation-table table-responsive-sm aaaa">
                                <thead>
                                    <tr>
                                        <th scope="col">Color</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-control" name="color_name" id="colorpicker" type="text" placeholder="0">
                                        </td>
                                        <td>
                                            <input class="form-control" name="size_name" type="text" placeholder="0">
                                        </td>
                                        <td>
                                            <input class="form-control" name="quantity" type="number" placeholder="0">
                                        </td>
                                        <td><button id="remove" class="text-danger border-0 "><i class="ri-delete-bin-line"></i></button></td>
                                    </tr>
                                </tbody>
                            </table> --}}
                            {{-- <button  id="add_another" class="text-success border-0"><i class="ri-add-line me-2"></i> Add Another
                                Option</button> --}}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Price</h5>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">price</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="buy_price" type="number" placeholder="0">
                                    @error('buy_price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">Discount</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="discount" type="number" placeholder="0">
                                </div>

                            </div>
                            {{-- <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 form-label-title">Total Price</label>
                                <div class="col-sm-5">
                                    <input class="form-control" name="total_price" type="number" placeholder="0">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 m-auto mb-5">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->
<!-- New Product Add End -->
@endsection

@section('footer_script')
    <script>
        $('.fa').click(function(){
            var icon = $(this).attr('data-icon');
            $('#icon').attr('value', icon);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,
            });
        });
    </script>
    {{-- <script>

        // add
        $('#add_another').click(function(){
            var html = '';
            html += '<tr>';
            html += '<td><input class="form-control" name="color" type="number" placeholder="0"></td>';
            html += '<td><input class="form-control" name="size" type="number" placeholder="0"></td>';
            html += '<td><input class="form-control" name="quantity" type="number" placeholder="0"></td>';
            html += '<td><button id="remove" class="text-danger border-0 "><i class="ri-delete-bin-line"></i></button></td>';
            html += '</tr>';
            $('tbody').append(html);
        });

        // remove
        $(document).on('click', '#remove', function(){
            $(this).closest('tr').remove();
        });
    </script> --}}

    {{-- category connect subcategory --}}

    <script>
        $('#category_id').change(function(){
           var category_id = $(this).val();

           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url: '/getsubcategory',
            type: 'POST',
            data: {'category_id' : category_id},
            success: function(data){
                $('#subcategory_id').html(data);
            }
        });
        });


    </script>

{{-- color piker --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('#colorpicker').colorpicker();
</script>
@endsection



