<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Role;
use App\Models\StudentRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    public function index(){
        $candidates = Candidate::where('admin_id', '>', '0')->get();
        return view('admin.candidates.candidates_list', ['candidates' => $candidates]);
    }
    public function show($id){
        $user = DB::table('candidates')
            ->join('students', 'students.id', '=', 'candidates.student_id')
            ->join('address', 'address.id', '=', 'students.address_id')
            ->where('candidates.id', '=', $id)
            ->select('students.*', 'candidates.is_in_a_post', 'candidates.short_bio', 'address.address')
            ->get();
        return view('admin.candidates.profile', ['user' => $user[0]]);
    }
    public function updateForm($id){

    }

    public function requestList(){
        $candidates = DB::table('candidates')
            ->join('students', 'students.id', '=', 'candidates.student_id')
            ->select('students.*', 'candidates.is_in_a_post', 'candidates.short_bio')
            ->where('candidates.admin_id', '=', '')
            ->get();
        return view('admin.candidates.candidate_request_list', ['candidates' => $candidates]);
    }

    public function acceptRequest($id){
        $candidate = Candidate::find($id);
        $role = new StudentRole();
        $candidate->admin_id = Auth::guard('admin')->user()->id;
        $role->student_id = $candidate->student_id;
        $role->role_id = Role::where('role_priority', '=', -1)->first()->id;
        $role->save();
        $candidate->save();
    }

    public function rejectRequest($id){
        $candidate = Candidate::find($id);
//        $candidate->admin_id = Auth::guard('admin')->user()->id;
        $candidate->save();
    }
}
