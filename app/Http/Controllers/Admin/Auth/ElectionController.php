<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index(){
        $elections = Election::all();
        return view('admin.election.election_list', ['elections' => $elections]);
    }
    public function show()
    {
        return view('admin.election.election');
    }
    public function showRegister(){
        return view('admin.election.register_election');
    }

    public function register(Request $request){
        $request->validate([
            'election_name' => ['required']
        ]);
        $election = new Election();
        $election->name = $request->election_name;
        $election->date = $request->election_date;
        $election->ending_date = $request->election_ending_date;
        $election->description = $request->election_description;
        $election->current_status = 'Upcomming';
        $election->save();

        return redirect()->back()->with(['msg' => 'Successfully Added!']);
    }

    public function showUpdate(){
        return view('admin.election.edit_election');
    }
    public function update(){

    }

}
