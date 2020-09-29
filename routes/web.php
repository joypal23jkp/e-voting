<?php

// Voter routes.
use Illuminate\Support\Facades\Route;

// roles routes
Route::prefix('role')->group(function(){
    Route::get('/all', 'RoleController@index')->name('admin.role.list');
    Route::get('/{id}', 'RoleController@show')->name('admin.role.show');
    Route::get('/add/{id}', 'RoleController@showRegister')->name('admin.role.register');
    Route::get('/update/{id}', 'RoleController@showUpdate')->name('admin.role.update');
    Route::get('/remove/{id}', 'RoleController@delete')->name('admin.role.remove');
});

// admin routes
Route::namespace('Admin')->prefix('admin')->group(function(){

    //login routes
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login');

    //forgot password
    Route::post('/email', 'ForgotPasswordController@sendResetLinkEmail ')->name('password.email');
    Route::get('/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

    Route::post('/reset', 'ResetPasswordController@reset ')->name('password.update');
    Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

    //logout routes
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');

    //Auth Routes
        Route::namespace('Auth')->middleware(['auth:admin'])->group(function (){
            Route::get('/', 'HomeController@index')->name('admin.home');

            // student routes
            Route::get('student/add', 'StudentController@createForm')->name('admin.student.assign.form');
            Route::post('student/create', 'StudentController@create')->name('admin.student.assign');
            Route::get('student/all', 'StudentController@index')->name('admin.student.list');
            Route::get('student/{id}', 'StudentController@showStudent')->name('admin.student');

            Route::get('student/update/{id}', 'StudentController@showUpdateForm')->name('admin.student.update.form');
            Route::post('student/update', 'StudentController@update')->name('admin.student.update');
            Route::post('student/remove/{id}', 'StudentController@delete')->name('admin.student.remove');

            //register admin
            Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.show.register');
            Route::post('/register', 'RegisterController@register')->name('admin.register');

            // update admin
            Route::get('/update/{id}', 'AdminController@showUpdateForm')->name('admin.show.update');
            Route::post('/update', 'AdminController@update')->name('admin.update');

            // remove admin
            Route::get('/remove/{id}', 'AdminController@showRemove')->name('admin.remove');

            //password routes
            Route::prefix('password')->name('password.*')->group(function(){
                Route::get('/confirm', 'ConfirmPasswordController@showConfirmForm')->name('confirm');
                Route::post('/confirm', 'ConfirmPasswordController@confirm');
            });

            // Election Routes
            Route::prefix('election')->group(function(){
                Route::get('/all', 'ElectionController@index')->name('admin.election.list');
                Route::get('/{id}', 'ElectionController@show')->name('admin.election.show');
                Route::get('/add/election', 'ElectionController@showRegister')->name('admin.election.assign.form');
                Route::post('/register', 'ElectionController@register')->name('admin.election.register');
                Route::get('/update/{id}', 'ElectionController@showUpdate')->name('admin.election.update');
                Route::get('/remove/{id}', 'ElectionController@showUpdate')->name('admin.election.remove');
            });

            // Sub Election Routes
            Route::prefix('sub-election')->group(function(){
                Route::get('/all/{id?}', 'SubElectionController@index')->name('admin.sub.election.list');
                Route::get('/{id}', 'SubElectionController@show')->name('admin.sub.election.show');
                Route::get('/add/sub-election/{id}', 'SubElectionController@showRegister')->name('admin.sub.election.assign.form');
                Route::post('/register', 'SubElectionController@register')->name('admin.sub.election.register');
                Route::get('/update/{id}', 'SubElectionController@showUpdate')->name('admin.sub.election.update');
                Route::get('/remove/{id}', 'SubElectionController@showUpdate')->name('admin.sub.election.remove');
            });

            //candidate Routes
            Route::prefix('candidate')->group(function(){
                Route::get('/all/{id?}', 'CandidateController@index')->name('admin.candidate.list');
                Route::get('/{id}', 'CandidateController@show')->name('admin.candidate.show');
                Route::get('/request/list', 'CandidateController@requestList')->name('admin.candidate.request.list');
                Route::post('/request/accept', 'CandidateController@acceptRequest')->name('admin.candidate.request.accept');
                Route::post('/request/reject', 'CandidateController@rejectRequest')->name('admin.candidate.request.reject');
                Route::get('/update/{id}', 'CandidateController@showUpdate')->name('admin.candidate.show.update');
                Route::post('/update', 'CandidateController@update')->name('admin.candidate.update');
                Route::get('/remove/{id}', 'CandidateController@showUpdate')->name('admin.candidate.remove');
            });

            //candidate Routes
            Route::prefix('vote')->group(function(){
                   Route::get('/check', 'VoteController@checkReview')->name('vote.review');
            });

            //admin universal routes
            Route::get('/list', 'AdminController@index')->name('admin.list');
            Route::get('/{id}', 'AdminController@show')->name('admin.show');

        });
});


//End of admin Routes

Auth::routes();
Route::get('/', 'HomeController@index')->middleware(['auth'])->name('landing');
Route::get('/election/{election_status}', 'ElectionController@index')->middleware(['auth'])->name('election');
Route::get('/election/profile/{pre_con}/{id}', 'SubElectionController@profile')->middleware(['auth'])->name('election.profile');
Route::get('/sub/election/{election_id}', 'SubElectionController@index')->middleware(['auth'])->name('sub.election');
Route::post('/student/apply/candidate', 'StudentController@applyCandidate')->middleware(['auth'])->name('apply.candidate');
Route::post('/student/vote', 'VoteController@vote')->middleware(['auth'])->name('student.vote');
Route::get('/student/Profile', 'StudentController@showProfileForm')->middleware(['auth'])->name('student.profile');
Route::get('/student/password/change', 'Auth/ResetPasswordController@showResetForm')->middleware(['auth'])->name('student.password.change');

Route::get('/candidate/election/manage', 'ElectionController@manageElection')->name('my.election.manage');



Route::get('event', function (){
    event(new \App\Events\VoteStatus('Notification Event!'));
})->name('event');
Route::get('listen', function (){
    return view('listen_broadcast');
});



