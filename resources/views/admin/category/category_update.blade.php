@extends('layouts.dashbord')

@section('content')
<!-- New Product Add Start -->
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    @if(session('cat_up'))
                        <div class="alert alert-success" >{{ session('cat_up') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Category Update</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{ route('category.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                    <div class="col-sm-9">
                                        {{-- category hidden id --}}
                                        <input name="category_id" type="hidden" value="{{ $category_info->id }}">

                                        <input class="form-control" name="category_name" type="text"
                                            placeholder="Category Name" value="{{ $category_info->category_name }}">

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
                                                <img width="100" id="blah" src="{{ asset('uplode/category') }}/{{ $category_info->category_img }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-3 form-label-title">Select Category Icon</div>
                                    <div class="col-sm-9">
                                        <div class="dropdown icon-dropdown">
                                            <div class="my-3">
                                                <input type="text" id="icon" class="form-control" name="category_icon" placeholder="Category Icon" value="{{ $category_info->category_icon }}">

                                                @php
                                                        $icons = [
                                                        'fa-apple',
                                                        'fa-language',
                                                        'fa-fax',
                                                        'fa-recycle',
                                                        'fa-car',
                                                        'fa-taxi',
                                                        'fa-tree',
                                                        'fa-file-audio-o',
                                                        'fa-file-video-o',
                                                        'fa-font-awesome',
                                                        'fa-shopping-bag',
                                                        'fa-paint-brush',
                                                        'fa-book',
                                                        'fa-bed',
                                                        'fa-cutlery',
                                                        'fa-futbol-o',
                                                        'fa-mobile',
                                                        'fa-television',
                                                        'fa-bolt',
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

