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
                                <div class="hero__caption">
                                    @if(!$is_election)
                                        <?php
                                            $e_type = 'sub_election';
                                            $e_id = $election->id;
                                        ?>
                                        <h2 class="badge badge-warning p-3">{{ \App\Models\Election::find($election->election_id)->name }}</h2>
                                        <h1 data-animation="fadeInLeft" data-delay="0.2s">{{ $election->name }} </h1>
                                        <div class="alert alert-light font-weight-bold" role="alert">
                                            {{ \App\Models\Election::find($election->election_id)->date }} &nbsp; TO &nbsp; {{ \App\Models\Election::find($election->election_id)->ending_date }}
                                        </div>
                                        <hr>
                                        <h2 class="text-white badge badge-info">{{ $election->current_status }}</h2>
                                        <p data-animation="fadeInLeft" data-delay="0.4s">{{ $election->description }}</p>
                                    @else
                                        <?php
                                            $e_type = 'election';
                                            $e_id = $election->id;
                                        ?>
                                        <h1 data-animation="fadeInLeft" data-delay="0.2s">{{ $election->name }} </h1>
                                        <div class="alert alert-light font-weight-bold" role="alert">
                                            {{ $election->date }} &nbsp; TO &nbsp; {{ $election->ending_date }}
                                        </div>
                                        <hr>
                                        <h2 class="text-white badge badge-info">{{ $election->current_status }}</h2>
                                        <p data-animation="fadeInLeft" data-delay="0.4s">{{ $election->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if($election->current_status == 'coming')
        <section class="container my-5">
            <div class="card">
                <div class="card-header bg-transparent font-weight-bold">
                    Request to be Candidate
                </div>
                <div class="card-body">
                    <form action="{{ route('apply.candidate') }}" method="post">
                        @csrf
                        <input type="number" name="e_id" value="{{ $e_id }}" hidden>
                        <input type="text" name="e_type" value="{{ $e_type }}" hidden>
                        <textarea rows="3" name="short_bio" style=" display: block; width: 100%; margin-bottom: 20px; "></textarea>
                        <button type="submit" class="btn btn-primary">Request</button>
                    </form>
                </div>
            </div>
        </section>
        @endif
        <hr>
        <section class="container my-5">
            <!-- Just an image -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    Candidates Info
                </a>
            </nav>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Candidate</th>
                    <th scope="col">Vote Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    @foreach($info as $data)
                        <?php
                            $conditions = [ 'candidate_id' =>  $data->id, 'election_id' => $election->id ];
                            if ( $e_type != 'election'){
                                 $conditions = [ 'candidate_id' =>  $data->id, 'sub_election_id' => $election->id ];
                            }
                            $vote_count = \App\Models\Vote::where($conditions)->get()->count();
                        ?>
                        @if($election->current_status == 'done')
                            <td scope="col">{{ $data->full_name }}</td>
                            <td scope="col">{{ $vote_count }}</td>
                            <td scope="col">
                                <button type="button" class="btn btn-success" disabled>Vote</button>
                            </td>
                            <td scope="col">Profile</td>

                        @elseif($election->current_status == 'running')

                            <td scope="col">{{ $data->full_name }}</td>
                            <td scope="col">{{ $vote_count }}</td>
                            <form action="{{ route('student.vote') }}" method="post">
                                @csrf
                                <td scope="col">
                                    <button id="vote_button" type="submit" class="btn btn-primary btn-sm">Vote</button>
                                </td>
                                <td scope="col">
                                    <input type="number" name="e_id" value="{{ $e_id }}" hidden>
                                    <input type="number" name="vote_to" value="{{ $data->id }}" hidden>
                                    <input type="text" name="e_type" value="{{ $e_type }}" hidden>
                                    <textarea id="bio_area" rows="1" name="vote_review" style=" display: block; width: 100%; margin-top: 20px;" required></textarea>
                                </td>
                                </form>
                            <td scope="col">Profile</td>

                        @elseif($election->current_status == 'coming')
                            <td scope="col">{{ $data->full_name }}</td>
                            <td scope="col">None</td>
                            <td scope="col">
                                <button type="button" class="btn btn-success" disabled>Vote</button>
                            </td>
                            <td scope="col">Profile</td>
                        @endif
                    @endforeach
                </tr>
                </tbody>
            </table>
        </section>
    </main>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <script type="text/javascript">
    </script>
@endsection
