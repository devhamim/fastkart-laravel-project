@extends('layouts.dashbord')

@section('content')
<!-- All User Table Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @if(session('branddel'))
                <div class="alert alert-danger">{{ session('branddel') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>All Brand</h5>
                        <form class="d-inline-flex">
                            <a href="{{ route('brand') }}" class="align-items-center btn btn-theme">
                                <i data-feather="plus-square"></i>Add New
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>Date</th>
                                    <th>Brand Image</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand_name }}</td>

                                    <td>{{ $brand->created_at->format('d/M/Y') }}</td>

                                    <td>
                                        <div class="table-image">
                                            <img src="{{ asset('uplode/brand') }}/{{ $brand->brand_img }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('brand.delete', $brand->id) }}">
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
            </div>
        </div>
    </div>
</div>
<!-- All User Table Ends-->

@endsection

