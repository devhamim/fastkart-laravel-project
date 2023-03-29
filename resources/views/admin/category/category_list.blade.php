@extends('layouts.dashbord')

@section('content')
<!-- All User Table Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @if(session('catdelete'))
                <div class="alert alert-danger">{{ session('catdelete') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>All Category</h5>
                        <form class="d-inline-flex">
                            <a href="{{ route('add.category') }}" class="align-items-center btn btn-theme">
                                <i data-feather="plus-square"></i>Add New
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Category Image</th>
                                    <th>Icon</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $category->category_name }}</td>

                                    <td>{{ $category->created_at->format('d/M/Y') }}</td>

                                    <td>
                                        <div class="table-image">
                                            <img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="category-icon display-5">
                                            <i class="fa {{ $category->category_icon }} img-fluid"></i>
                                        </div>
                                    </td>

                                    <td>
                                        <ul>
                                            {{-- <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li> --}}

                                            <li>
                                                <a href="{{ route('category.update', $category->id) }}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('category.delete', $category->id) }}">
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

