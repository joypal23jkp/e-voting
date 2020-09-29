<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    public function index($election_status){
        $elections = Election::where('current_status', '=', $election_status)->get();
        return view('election', ['elections' => $elections]);
    }

    public function manageElection(){
        $elections = [];
        $elections = DB::table('elections')
            ->join('election_candidates', 'election_candidates.election_id', '=', 'elections.id')
            ->join('candidates', 'candidates.id', '=', 'election_candidates.candidate_id')
            ->where( 'election_candidates.candidate_id', '=', Auth::user()->id)
            ->select('elections.*')->get();

        $sub_elections = DB::table('sub_elections')
            ->join('sub_election_candidates', 'sub_election_candidates.sub_election_id', '=', 'sub_election_candidates.id')
            ->join('candidates', 'candidates.id', '=', 'sub_election_candidates.candidate_id')
            ->where( 'sub_election_candidates.candidate_id', '=', Auth::user()->id)
            ->select('sub_elections.*')->get();
        return view('my_election_list', ['elections' => $elections, 'sub_elections' => $sub_elections]);

    }
}

class DemoElection {
    public $name;
    public $status;
    public function __construct($namee, $statuss)
    {
        $name = $namee;
        $status = $statuss;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}
