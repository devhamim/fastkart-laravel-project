@extends('layouts.dashbord')

@section('content')
<div class="">
    <div class="row">
        <div class="col-sm-12">
            @if(session('user_del'))
                <div class="alert alert-warning">{{ session('user_del') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>All Users</h5>
                        <form class="d-inline-flex">
                            <a href="add-new-user.html" class="align-items-center btn btn-theme">
                                <i data-feather="plus"></i>Add New
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive table-product">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            @if($user->photo == null)
                                                <img src="{{ Avatar::create($user->name)->toBase64(); }}" class="img-fluid">
                                            @else
                                                <img src="{{ asset('uplode/user') }}/{{ $user->photo }}" class="img-fluid rounded-circle">
                                            @endif

                                        </div>
                                    </td>

                                    <td>
                                        <div class="user-name">
                                            <span>{{ $user->name }}</span>
                                            <span>Essex Court</span>
                                        </div>
                                    </td>

                                    <td>+880 {{ $user->phone }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <ul>
                                            {{-- <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li> --}}

                                            <li>
                                                <a href="{{ route('account.setting') }}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('user.delete', $user->id) }}">
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
