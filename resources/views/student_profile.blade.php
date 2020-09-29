@extends('layouts.app')
@section('title-body', 'StudentProfile')
@section('content')
    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="main">
                            <?php
                            $user = \Illuminate\Support\Facades\Auth::user();
                            ?>
                            <div class="card w-75 profile_card">
                                <div class="card-header px-5">
                                    <h1>{{$user->full_name}}</h1>
                                    <h5>{{ $user->email }}</h5>
                                </div>
                                <div class="card-body px-5">
                                    <div class="row">
                                        <div class="col-6">Phone Number</div>
                                        <div class="col-6">{{ $user->phone_no }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">National Id</div>
                                        <div class="col-6">{{ $user->national_id }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">Academic Id</div>
                                        <div class="col-6">{{ $user->academic_id }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">Birth Date</div>
                                        <div class="col-6">{{ $user->date_of_birth }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">Address</div>
                                        <div class="col-6">{{ \App\Models\Address::where('id', '=', $user->address_id)->first()->address }}</div>
                                    </div>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>>
@endsection
