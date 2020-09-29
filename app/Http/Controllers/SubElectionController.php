<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\SubElection;
use App\Models\SubElectionCandidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class SubElectionController extends Controller
{
    public function index($election_id){

        $elections = SubElection::where('election_id', '=', $election_id)->get();
        return view('sub_election', ['sub_elections' => $elections]);
    }
    public function profile($pre_con = 'sub_election', $id = null){
        if ($pre_con == 'election'){
            $election = Election::find($id);

            $user = DB::table('candidates')
                ->join('students', 'students.id', '=', 'candidates.student_id')
                ->join('election_candidates', 'election_candidates.candidate_id', '=', 'candidates.id')
                ->where('election_candidates.election_id', '=', $election->id)
                ->select('students.full_name', 'candidates.*', 'election_candidates.election_id')
                ->get();
            return view('election_profile', ['is_election' => true, 'info' => $user, 'election' => $election]);
        }

        elseif ($pre_con == 'sub_election'){
            $sub_election = SubElection::find($id);
//            $candidate_ids = SubElectionCandidate::where('sub_election_id', $sub_election->id)-get();

            $user = DB::table('candidates')
                ->join('students', 'students.id', '=', 'candidates.student_id')
                ->join('sub_election_candidates', 'sub_election_candidates.candidate_id', '=', 'candidates.id')
                ->where('sub_election_candidates.id', '=', $sub_election->id)
                ->select('students.full_name', 'candidates.*', 'candidates.short_bio')
                ->get();
            return view('election_profile', ['is_election' => false, 'info' => $user, 'election' => $sub_election]);
        }
        return redirect()->back()->withErrors('At least Select Any Id!');

    }
}
