@extends('layouts.dashbord')

@section('content')
 <!-- New User start -->
 <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="title-header option-title">
                                <h5>Add New User</h5>
                            </div>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                        type="button">Account</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                        type="button">Pernission</button>
                                </li> --}}
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                    <form class="theme-form theme-form-2 mega-form" method="POST" action="{{ route('user.stor') }}">
                                        @csrf
                                        <div class="card-header-1">
                                            <h5>Product Information</h5>
                                        </div>

                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="form-label-title col-lg-2 col-md-3 mb-0">First
                                                    Name</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control @error('fast_name') is-invalid @enderror" type="text" id="fast_name" name="fast_name" value="{{ old('fast_name') }}" required autocomplete="fast_name" autofocus>
                                                    @error('fast_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Last
                                                    Name</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                    Address</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <label
                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Confirm
                                                    Password</label>
                                                <div class="col-md-9 col-lg-10">
                                                    <input class="form-control" type="password" id="password-confirm"  name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="my-3 pt-2">
                                                <button class="btn btn-solid" type="submit">Add
                                                    User</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                    <div class="card-header-1">
                                        <h5>Product Related Permition</h5>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Add Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Update Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Delete Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Apply Discount</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-header-1">
                                        <h5>Category Related Permition</h5>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Add Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Update Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Delete Product</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-md-2 mb-0">Apply Discount</label>
                                        <div class="col-md-9">
                                            <form class="radio-section">
                                                <label>
                                                    <input type="radio" name="opinion" checked>
                                                    <i></i>
                                                    <span>Allow</span>
                                                </label>

                                                <label>
                                                    <input type="radio" name="opinion" />
                                                    <i></i>
                                                    <span>Deny</span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New User End -->
@endsection
