@extends('admin.layouts.app')
@section('title-body', 'Home')
@section('content')
    <!-- Left Panel -->
    @include('.admin.layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    @include('.admin.layouts.header')
    <!-- /#header -->
        <!-- Content -->
        <div class="content">

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header bg-transparent font-weight-bold">
                        Profile
                    </div>
                    <div class="card-body">
                        <div class="profile_image">
                            <img class="featured3" src="{{ asset('assets/img/gallery/featured3.png') }}" alt="profile_image" style="
                                max-width: 200px;
                                max-height: 200px;
                                border: 1px solid;
                                border-radius: 10px;">
                        </div>
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <hr>
                        <div>
                            <form method="POST" action="{{ route('admin.update', ['id' => $user->id]) }}">
                                @csrf
                                <div class="form-group row">
                                    <input name="id" value="{{ $user->id }}" hidden>
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->full_name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_no }}" required autocomplete="phone_number">

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ __('National Id') }}</label>

                                    <div class="col-md-6">
                                        <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ $user->national_id }}" required>

                                        @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="academic_id" class="col-md-4 col-form-label text-md-right">{{ __('Academic ID') }}</label>

                                    <div class="col-md-6">
                                        <input id="academic_id" type="text" class="form-control @error('academic_id') is-invalid @enderror" name="academic_id" value="{{ $user->academic_id }}" required autocomplete="academic_id">

                                        @error('academic_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                    <div class="col-md-6">
                                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $user->birth_date }}" required autocomplete="birth_date">

                                        @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $address->address }}" required autocomplete="address">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Update
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do You Want to really Update Form?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if(\Illuminate\Support\Facades\Route::current()->getName() == 'admin.show')
                            <hr>
                            <div class="activity d-lg-flex px-5 py-2">
                                <a class="font-weight-bold btn btn-primary border-0 px-5 mx-5 my-sm-2" href="#">Roles</a>
                                <a class="font-weight-bold btn btn-info border-0 px-5 mx-5 my-sm-2" href="#">Candidates</a>
                                <a class="font-weight-bold btn btn-success border-0 px-5 mx-5 my-sm-2" href="#">Students</a>
                                <a class="font-weight-bold btn bg-twitter text-white border-0 px-5 mx-5 my-sm-2" href="#">Admins</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>

        <!-- /.content -->
        <!-- Footer -->
    @include('.admin.layouts.footer')
    <!-- /.site-footer -->

@endsection
