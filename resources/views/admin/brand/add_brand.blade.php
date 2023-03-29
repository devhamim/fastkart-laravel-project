@extends('layouts.dashbord')

@section('content')
<!-- New Product Add Start -->
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Brand Information</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="brand_name" type="text"
                                            placeholder="Brand Name">
                                        @error('brand_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Brand
                                        Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="brand_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                            @error('brand_img')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
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

