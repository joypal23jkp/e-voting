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
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="hero__caption user_profile">
                                        <?php
                                        $user = \Illuminate\Support\Facades\Auth::user();
                                        ?>

                                        <h1 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->full_name }}</h1>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->email }} </h2>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->phone_no }}( Phone Number) </h2>
                                            <hr>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->national_id }} ( NID)</h2>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->academic_id }} ( AcID)</h2>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ $user->date_of_birth}}  ( Birth-date)</h2>
                                            <hr>
                                        <h2 data-animation="fadeInLeft" data-delay="0.2s">{{ \App\Models\Address::find($user->address_id)->address }} </h2>
                                        <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(\App\Models\Candidate::where('student_id', '=', \Illuminate\Support\Facades\Auth::id())->first() != null)
        <section class="container my-5">
            <!-- Just an image -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    My Election List
                </a>
            </nav>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Election Name</th>
                    <th scope="col">Vote Count</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($elections as $e)
                    <?php
                    $conditions = [ 'candidate_id' => \Illuminate\Support\Facades\Auth::user()->id , 'election_id' =>  $e->id ];
                    ?>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $e->name }}</td>
                    <td>{{
                            $vote_count = \App\Models\Vote::where($conditions)->get()->count()
                        }}</td>
                    <td><span class="badge badge-primary">{{ $e->current_status }}</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </section>
        <section class="container my-5">
            <!-- Just an image -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    My Election List
                </a>
            </nav>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sub Election Name</th>
                    <th scope="col">Vote Count</th>
                    <th scope="col">Status</th>
                    <th scope="col">Parent Election</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sub_elections as $e)
                    <?php
                    $conditions = [ 'candidate_id' => \Illuminate\Support\Facades\Auth::user()->id , 'sub_election_id' =>  $e->id ];
                    ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $e->name }}</td>
                        <td>{{
                            $vote_count = \App\Models\Vote::where($conditions)->get()->count()
                        }}</td>
                        <td><span class="badge badge-primary">{{ $e->current_status }}</span></td>
                        <td><span class="font-weight-bold badge badge-warning">{{ \App\Models\Election::find($e->election_id)->name }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
        @endif
    </main>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <script type="text/javascript">
    </script>
@endsection
