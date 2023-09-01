@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-sm-4 d-flex">
                    <!--start profile update-->
                    <div class="col-12 col-md-12 col-lg-6 py-5">
                        <div class="card  bg-light">

                            <!--Form start-->
                            <form method="POST" action="{{ route('admin.profile.update') }}" class="needs-validation" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4 class="text-primary">Profile Update</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                          <div class="mb-3">
                                                <img src="{{ asset(Auth::user()->image) }}" alt="" style="width:150px; height:150px; border-radius: 10px; margin-left: 15px; object-fit: cover;">
                                          </div>

                                        <div class="form-group col-12">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Auth::user()->name }}">
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                            <!--Form end-->

                        </div>
                    </div>
                    <!--end profile update-->

                    <!--start password update-->
                    <div class="col-12 col-md-12 col-lg-6 py-5">
                        <div class="card bg-light">
                              
                            <!--Form start-->
                            <form method="POST" action="{{ route('admin.profile.update.password') }}" class="needs-validation"
                                novalidate="">
                                @csrf
                                <div class="card-header">
                                    <h4 class="text-dark">Password Update</h4>
                                </div>
                                <div class="card-body">
                                    <!--alert message start-->
                                    {{-- @if ($errors->any())
                                          @foreach ($errors->all() as $error)
                                          <div class="alert alert-danger">{{ $error }}</div>
                                          @endforeach
                                    @endif --}}
                                    <!--alert message end-->

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>
                                        <div class="form-group col-12">
                                          <label>New Password</label>
                                          <input type="password" name="password" class="form-control">
                                      </div>
                                      <div class="form-group col-12">
                                          <label>Confirm Password</label>
                                          <input type="password" name="password_confirmation" class="form-control">
                                      </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-dark">Update Password</button>
                                </div>
                            </form>
                            <!--Form end-->

                        </div>
                    </div>
                    <!--end password update-->
                </div>
            </div>
        </section>
    </div>
@endsection
