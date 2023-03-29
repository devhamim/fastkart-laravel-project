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
                                    <th>Banner Image</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($off_banner as $sl=>$banner)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $banner->fbanner_offer }}</td>

                                    <td>{{ $banner->fbanner_titel }}</td>

                                    <td >
                                        <img style="width: 100%" src="{{ asset('uplode/banner/off_banner') }}/{{ $banner->fbanner_img }}" alt="">
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('off.banner.delete', $banner->id) }}">
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
                {{-- banner top --}}
                <div class="col-sm-5">
                    @if(session('fsuccess'))
                        <div class="alert alert-success">{{ session('fsuccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Top Banner</h5>
                            </div>
                            <form class="theme-form theme-form-2 mega-form" action="{{ route('off.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Off Banner Offer</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="fbanner_offer" type="text"
                                            placeholder="Off Banner Offer">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Off Banner Titel</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="fbanner_titel" type="text"
                                            placeholder="Off Banner Titel">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Off Banner
                                        Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="fbanner_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('fbanner_img')
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
