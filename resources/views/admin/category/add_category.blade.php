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
                                <h5>Category Information</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="category_name" type="text"
                                            placeholder="Category Name">
                                        @error('category_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Category
                                        Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="category_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('category_img')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-3 form-label-title">Select Category Icon</div>
                                    <div class="col-sm-9">
                                        <div class="dropdown icon-dropdown">
                                            <div class="my-3">
                                                <input type="text" id="icon" class="form-control" name="category_icon" placeholder="Category Icon">
                                                @error('category_icon')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                                @php
                                                        $icons = [

                                                        'fa-glass',
                                                        'fa-music',
                                                        'fa-heart',
                                                        'fa-user',
                                                        'fa-check',
                                                        'fa-times',
                                                        'fa-home',
                                                        'fa-file-o',
                                                        'fa-clock-o',
                                                        'fa-arrow-circle-o-down',
                                                        'fa-arrow-circle-o-up',
                                                        ];
                                                        @endphp
                                                <div class="my-3" style="font-family: fontawesome; font-size: 22px; " >
                                                    @foreach ($icons as $icon)
                                                        <i class="fa {{ $icon }} px-1" data-icon="{{ $icon }}"></i>
                                                    @endforeach
                                                </div>

                                            </div>
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

@section('footer_script')
    <script>
        $('.fa').click(function(){
            var icon = $(this).attr('data-icon');
            $('#icon').attr('value', icon);
        });
    </script>
@endsection

