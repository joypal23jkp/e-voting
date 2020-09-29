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
                            <button class="btn btn-primary float-right border-1" id="edit-button"><i class="fa fa-edit float-right"></i></button>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="profile_body p-5 col-lg-6">
                                <div class="profile_title d-flex my-3">
                                    <span><i class="fa fa-user-circle"></i> &nbsp;&nbsp; Name:</span>
                                    <h5 class="font-weight-bold mx-2 my-1">{{ $user->full_name}}</h5>
                                </div>
                                <div class="profile_email d-flex my-3">
                                    <span><i class="fa fa-envelope"></i> &nbsp; &nbsp;Email: &nbsp;</span>
                                    <h5 class="font-weight-bold mx-2 my-1">{{ $user->email }}</h5>
                                </div>
                                <div class="profile_phone_number d-flex my-3">
                                    <span><i class="fa fa-phone"></i> &nbsp; &nbsp;Phone No: &nbsp;</span>
                                    <h5 class="font-weight-bold mx-2 my-1">{{ $user->phone_no }}</h5>
                                </div>
                                <div class="profile_national_id d-flex my-3">
                                    <span><i class="fa fa-id-badge"></i> &nbsp; &nbsp;National Id: &nbsp;</span>
                                    <h5 class="font-weight-bold  mx-2 my-1">{{ $user->national_id }}</h5>
                                </div>
                                <div class="profile_academic_id d-flex my-3">
                                    <span><i class="fa fa-id-card"></i> &nbsp; Academic Id: &nbsp;</span>
                                    <h5 class="font-weight-bold  mx-2 my-1">{{ $user->academic_id }}</h5>
                                </div>
                                <div class="profile_birth_date d-flex my-3">
                                    <span><i class="fa fa-calendar"></i> &nbsp; &nbsp;Birth Date: &nbsp;</span>
                                    <h5 class="font-weight-bold mx-2 my-1">{{ $user->date_of_birth }}</h5>
                                </div>
                                <div class="profile_address d-flex my-3">
                                    <span><i class="fa fa-address-book"></i> &nbsp; &nbsp;Address: &nbsp;</span>
                                    <h5 class="font-weight-bold mx-2 my-1">{{ $address->address }}</h5>
                                </div>
                            </div>
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
