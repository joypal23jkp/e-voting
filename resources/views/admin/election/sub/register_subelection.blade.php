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
                        Create Sub Election <span class="badge badge-primary">{{ \App\Models\Election::find($id)->name  }}</span>
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
                            <form method="POST" action="{{ route('admin.sub.election.register', ['id' => $id]) }}">
                                @csrf
                                <input name="election_id" value="{{ $id }}" hidden>
                                <div class="form-group row">
                                    <label for="election_name" class="col-md-4 col-form-label text-md-right">{{ __('Sub Election Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="sub_election_name" type="text" class="form-control @error('sub_election_name') is-invalid @enderror" name="sub_election_name" value="{{ old('sub_election_name') }}" required autocomplete="sub_election_name" autofocus>
                                        @error('sub_election_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sub_election_description" class="col-md-4 col-form-label text-md-right">{{ __('Sub Election Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="sub_election_description" class="form-control @error('sub_election_description') is-invalid @enderror" name="sub_election_description" required  autofocus>
                                        </textarea>
                                        @error('sub_election_description')
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
