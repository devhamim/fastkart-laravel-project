@extends('layouts.dashbord')

@section('content')
<div class="">
    <div class="row">
        <div class="col-12">
            <div class="row">
                {{-- banner view --}}
                <div class="col-sm-7">
                    @if(session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Banner Offer</th>
                                    <th>Banner Titel</th>
                                    <th>Banner Hig</th>
                                    <th>Banner Descreption</th>
                                    <th>Banner Image</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($banners as $sl=>$banner)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $banner->banner_offer }}</td>

                                    <td>{{ $banner->banner_titel }}</td>

                                    <td>{{ $banner->banner_hi }}</td>

                                    <td>{{ $banner->banner_des }}</td>

                                    <td >
                                        <img style="width: 100%" src="{{ asset('uplode/banner') }}/{{ $banner->banner_img }}" alt="">
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('banner.delete', $banner->id) }}">
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
                {{-- banner add --}}
                <div class="col-sm-5">
                    @if(session('bsuccess'))
                        <div class="alert alert-success">{{ session('bsuccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Banner</h5>
                            </div>
                            <form class="theme-form theme-form-2 mega-form" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Banner Offer</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="banner_offer" type="text"
                                            placeholder="Banner Offer">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Banner Titel</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="banner_titel" type="text"
                                            placeholder="Banner Titel">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Banner Highlight</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="banner_hi" type="text"
                                            placeholder="Banner Highlight">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Banner Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="banner_des" type="text"
                                            placeholder="Banner Description">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Banner
                                        Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="banner_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('banner_img')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
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
@endsection
