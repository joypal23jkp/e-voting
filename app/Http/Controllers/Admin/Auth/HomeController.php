<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $done_election = Election::where('current_status', '=', 'done')->get();
        $coming_election = Election::where('current_status', '=', 'coming')->get();
        $running_election = Election::where('current_status', '=', 'running')->get();
        $students = Student::all();
        $candidates = Candidate::all();

        return view('admin.home',
            [ 'running_election' => $running_election, 'done_election' => $done_election, 'coming_election' => $coming_election->count(), 'students' => $students->count(), 'candidates' => $candidates->count() ]);
    }
}
