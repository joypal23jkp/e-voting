@extends('admin.layouts.app')
@section('title-body', 'Vote-list')
@section('content')
    <!-- Left Panel -->
    @include('admin.layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    @include('admin.layouts.header')
    <!-- /#header -->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Vote List</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vote Reviews Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Election</th>
                                        <th>Candidate</th>
                                        <th>Student</th>
                                        <th>Review</th>
                                    </tr>
                                    </thead>
                                    @foreach( $reviews as $review )
                                        @php
                                        $election = null;
                                        $student = \App\Models\Student::find($review->student_id);
                                        $candidate = \App\Models\Student::find(\App\Models\Candidate::find($review->candidate_id)->id);
                                        $vote_review = $review->vote_review;
                                            if ($review->election_id != null){
                                                $election =  \App\Models\Election::find($review->election_id);
                                            }elseif ($review->sub_election_id != null){
                                                $election =  \App\Models\Election::find($review->sub_election_id);
                                            }
                                        @endphp
                                        <tbody>
                                        <tr>
                                            <td>{{ $election->name }}</td>
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $candidate->full_name }}</td>
                                            <td>{{ $vote_review }}</td>

{{--                                            <td>--}}
{{--                                                <div class="btn-group dropleft">--}}
{{--                                                    <button type="button" class="btn bg-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fa fa-cog"></i>--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown-menu">--}}
{{--                                                        <a class="dropdown-item" href="{{ route('admin.show', ['id' => $admin->id]) }}">Profile</a>--}}
{{--                                                        <a class="dropdown-item" href="{{ route('admin.show.update', ['id' => $admin->id]) }}">Edit</a>--}}
{{--                                                        <a class="dropdown-item" href="{{ route('admin.remove', ['id' => $admin->id]) }}">Remove</a>--}}
{{--                                                        <div class="dropdown-divider"></div>--}}
{{--                                                        <a class="dropdown-item" href="{{ route('admin.register') }}">Assign</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
    @include('admin.layouts.footer')
    <!-- /.site-footer -->
    </div>
@endsection
