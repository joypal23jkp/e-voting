@extends('layouts.app')
@section('title-body', 'Election')
@section('content')
    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Get Related<br> Elections</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Select Your Favorite Candidates and vote for them.</p>
                                    {{--                                        <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container my-5">
            @foreach($elections as $election)
                <div class="card text-center my-5" style="font-family: 'Nunito', sans-serif;">
                    <div class="card-header bg-white font-weight-bold">
                        {{ $election->name }}
                    </div>
                    <div class="card-body">
                        <h3 class="card-title ">{{ $election->current_status }}</h3>
                        <p class="card-text">{{ $election->description }}</p>
                        @if($sub_election = \App\Models\SubElection::where('election_id', '=', $election->id)->first() != null)
                            <a href="{{ route('sub.election', ['election_id' => $election->id]) }}" class="btn btn-primary">Sub Elections</a>
                        @else
                            <a href="{{ route('election.profile', ['pre_con' => 'election', 'id' => $election->id]) }}" class="btn btn-primary">Visit</a>
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
        </section>
    </main>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
@endsection
