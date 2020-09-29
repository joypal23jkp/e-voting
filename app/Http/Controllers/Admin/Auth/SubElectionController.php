<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\SubElection;
use Dotenv\Validator;
use Illuminate\Http\Request;

class SubElectionController extends Controller
{
    public function index($id = null){
        $sub_elections = SubElection::where('election_id', '=', $id)->get();
        return view('admin.election.sub.election_list', ['elections' => $sub_elections]);
    }
    public function show()
    {
        return view('admin.election.election');
    }
    public function showRegister($id){
        return view('admin.election.sub.register_subelection', ['id' => $id]);
    }

    public function register(Request $request){
        $request->validate([
            'sub_election_name' => ['required']
        ]);
        $election = new SubElection();
        $election->name = $request->sub_election_name;
        $election->description = $request->sub_election_description;
        $election->current_status = 'comming';
        $election->election_id = $request->election_id;
         $election->save();

        return redirect()->back()->with(['msg' => 'Successfully Added!']);
    }

    public function showUpdate(){
        return view('admin.election.edit_election');
    }
    public function update(){

    }

}
