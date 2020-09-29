<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admin = Admin::paginate(10);
        return view('admin.admin_list', ['admins' => $admin]);
    }

    public function show($id){
        $user = Admin::find($id);
        $address = Address::where('id', '=', $user->address_id)->first();
        return view('admin.profile', [ 'user' => $user, 'address' => $address ]);
    }

    public function showUpdateForm($id){
        $user = Admin::find($id);
        $address = Address::where('id', '=', $user->address_id)->first();
        return view('admin.edit', [ 'user' => $user, 'address' => $address ]);
    }

    public function update(Request  $request){
        $admin = Admin::find($request->id);
        $address = Address::find($admin->address_id);

        $admin->full_name = $request->name;
        $admin->email = $request->email;
        $admin->phone_no = $request->phone_number;
        $admin->national_id = $request->national_id;
        $admin->academic_id = $request->academic_id;
        $admin->date_of_birth = $request->birth_date;

        $address->address = $request->address;
        $address->save();
        $admin->save();

        return redirect()->back()->with(['msg', 'Successfully Updated!']);
    }
}
