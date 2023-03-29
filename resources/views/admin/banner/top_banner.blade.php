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
                                @foreach ($tbanners as $sl=>$banner)
                                <tr>
                                    <td>{{ $sl+1 }}</td>

                                    <td>{{ $banner->tbanner_offer }}</td>

                                    <td>{{ $banner->tbanner_titel }}</td>

                                    <td>{{ $banner->tbanner_hi }}</td>

                                    <td>{{ $banner->tbanner_des }}</td>

                                    <td >
                                        <img style="width: 100%" src="{{ asset('uplode/banner/top_banner') }}/{{ $banner->tbanner_img }}" alt="">
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('top.banner.delete', $banner->id) }}">
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
                    @if(session('bsuccess'))
                        <div class="alert alert-success">{{ session('bsuccess') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Top Banner</h5>
                            </div>
                            <form class="theme-form theme-form-2 mega-form" action="{{ route('top.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0"> Top Banner Offer</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tbanner_offer" type="text"
                                            placeholder="TopBanner Offer">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Top Banner Titel</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tbanner_titel" type="text"
                                            placeholder="Top Banner Titel">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Top Banner Highlight</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tbanner_hi" type="text"
                                            placeholder="Top Banner Highlight">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Top Banner Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tbanner_des" type="text"
                                            placeholder="Top Banner Description">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Top Banner
                                        Image</label>
                                    <div class="form-group col-sm-9">
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="ri-upload-2-line"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="tbanner_img" class="dropzone" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-5">
                                                <img width="100" id="blah" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('tbanner_img')
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
