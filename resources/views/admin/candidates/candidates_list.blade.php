@extends('admin.layouts.app')
@section('title-body', 'All-Candidates')
@section('content')
    <!-- Left Panel -->
    @include('.admin.layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    @include('.admin.layouts.header')
    <!-- /#header -->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Candidate</h1>
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
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>status</th>
                                        <th>Settings</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($candidates as $candidate)
                                        @php
                                            $student = \App\Models\Student::find($candidate->student_id);
                                        @endphp
                                    <tr>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->email }}t</td>
                                        <td>{{ $student->phone_no }}</td>
                                        <td>$320,800</td>
                                        <td>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn bg-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.candidate.show', ['id' => $candidate->id]) }}">Profile</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Assign</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
    @include('.admin.layouts.footer')
    <!-- /.site-footer -->
    </div>
@endsection
