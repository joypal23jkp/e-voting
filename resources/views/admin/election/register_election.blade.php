@extends('admin.layouts.app')
@section('title-body', 'Sub Election')
@section('content')
    <!-- Left Panel -->
    @include('admin.layouts.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    @include('admin.layouts.header')
    <!-- /#header -->
        <!-- Content -->
        <div class="content">

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header bg-transparent font-weight-bold">
                        Election Assign
                    </div>
                    <div class="card-body">
                        <div class="profile_image">
                            @if(session()->has('msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div>
                            <form method="POST" action="{{ route('admin.election.register') }}">
                                @csrf
{{--                                <input name="election_id" value="{{ $id }}" hidden>--}}
                                <div class="form-group row">
                                    <label for="election_name" class="col-md-4 col-form-label text-md-right">{{ __('Election Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="election_name" type="text" class="form-control @error('election_name') is-invalid @enderror" name="election_name" value="{{ old('election_name') }}" required autocomplete="sub_election_name" autofocus>
                                        @error('election_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="election_date" class="col-md-4 col-form-label text-md-right">{{ __('Election Date') }}</label>

                                    <div class="col-md-6">
                                        <input id="election_date" type="date" class="form-control @error('election_date') is-invalid @enderror" name="election_date" value="{{ old('election_date') }}" required autocomplete="election_date" autofocus>
                                        @error('election_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="election_date" class="col-md-4 col-form-label text-md-right">{{ __('Election Ending Date') }}</label>

                                    <div class="col-md-6">
                                        <input id="election_ending_date" type="date" class="form-control @error('election_ending_date') is-invalid @enderror" name="election_ending_date" value="{{ old('election_ending_date') }}" required autocomplete="election_ending_date" autofocus>
                                        @error('election_ending_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="election_description" class="col-md-4 col-form-label text-md-right">{{ __('Election Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="election_description" class="form-control @error('election_description') is-invalid @enderror" name="election_description" required  autofocus>
                                        </textarea>
                                        @error('election_description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right border-1" id="edit-button">Done</button>
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
    @include('admin.layouts.footer')
    <!-- /.site-footer -->

    <script type="text/javascript">
        $(document).ready(function (){

            var postUrl = "<?php echo url('admin/election/register'); ?>"
            var i = 1;
            $('#add').click(function (){
                i++;
                $('')
            });

        });
    </script>

@endsection
