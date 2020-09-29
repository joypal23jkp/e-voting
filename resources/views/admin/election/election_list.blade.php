@extends('admin.layouts.app')
@section('title-body', 'Election-List')
@section('content')
    <!-- Left Panel -->
    @include('.admin.layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('.admin.layouts.header')
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Election List</h1>
                            </div>
                        </div>
                    </div>
{{--                    route navigation--}}
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Election List</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
{{--                    end of navigation--}}
                </div>
            </div>
        </div>

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
                                        <th>Election Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Winner</th>
                                        <th>Settings</th>
                                       {{-- <th>Salary</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($elections as $election)
                                    <tr>
                                        <td>{{ $election->name }}</td>
                                        <td>{{ $election->date }}</td>
                                        <td>{{ $election->current_status }}</td>
                                        <td>{{ $election->election_woned_by }}</td>
                                        <td>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn bg-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if(\App\Models\SubElection::where('election_id', '=', $election->id)->first() != null)
                                                        <a class="dropdown-item" href="{{ route('admin.sub.election.list', ['id' => $election->id]) }}">Check SubElections</a>
                                                    @else
                                                        <a class="dropdown-item" href="#">Check Candidates</a>
                                                    @endif
                                                    <a class="dropdown-item" href="#">Update Election</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('admin.sub.election.assign.form', ['id' => $election->id]) }}">Add Sub Election</a>
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
        </div><!-- .content -->


        <div class="clearfix"></div>

       @include('.admin.layouts.footer')

    </div>
    <!-- /#right-panel -->
@endsection
