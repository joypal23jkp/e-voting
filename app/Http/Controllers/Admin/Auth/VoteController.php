<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function checkReview(){
        $reviews = DB::table('votes')->paginate(15);
        return view('admin.vote.vote_list',['reviews' => $reviews]);
    }
}
