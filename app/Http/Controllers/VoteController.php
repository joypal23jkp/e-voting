<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request){
        $user = Auth::user();
        $matches = null;
        if ( $request->e_type == 'election'){
            $matches = [
                'student_id' => $user->id,
                'election_id' => $request->e_id
            ];
        }elseif($request->e_type == 'sub_election'){
            $matches = [
                'student_id', '=', $user->id,
                'sub_election_id', '=', $request->e_id
            ];
        }

        if ( !Vote::where($matches)->first() ){
            $vote = new Vote();
            $vote->vote_review = $request->vote_review;
            $vote->student_id = Auth::user()->id;
            $vote->candidate_id = $request->vote_to;
            $request->e_type == 'election' ? $vote->election_id = $request->e_id :  $vote->sub_election_id = $request->e_id;
            if ($vote->save()){
                return redirect()->back()->with(['message' => 'Vote Done !']);
            }
            return redirect()->back()->with([ 'message' =>'Vote Again!']);
        }
        return redirect()->back()->with([ 'message' => 'Already Voted.']);
    }
}
