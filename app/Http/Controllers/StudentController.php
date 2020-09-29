<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\ElectionCandidate;
use App\Models\SubElectionCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function applyCandidate(Request $request){
        $candidate = new Candidate();
        $candidate->student_id = Auth::user()->id;
        $candidate->short_bio = $request->short_bio;
        if ($candidate->save()){
            if ($request->e_type == 'election'){
                $e_candidate = new ElectionCandidate();
                $e_candidate->election_id = $request->e_id;
                $e_candidate->candidate_id = $candidate->id;
                $e_candidate->save();
            }elseif ($request->e_type == 'sub_election'){
                $sub_e_candidate = new SubElectionCandidate();
                $sub_e_candidate->election_id = $request->e_id;
                $sub_e_candidate->candidate_id = $candidate->id;
                $sub_e_candidate->save();
            }
            return redirect()->back()->with('Successful!');
        }
        return redirect()->back()->with('Failed!');
    }

    public function showProfileForm(){
        return view('student_profile');
    }
}
