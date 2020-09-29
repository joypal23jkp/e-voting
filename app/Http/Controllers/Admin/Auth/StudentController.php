<?php
//$2y$10$VfSSytW2864M6rirrhdSXO8L1dUe49rT2QRHnyik9f0CmsxQ/Furq
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;

class StudentController extends Controller
{

    public function index(){
        $students = Student::all();
        return view('admin.student.student_list', ['students' => $students]);
    }
    public function showStudent($id){
            $student = Student::find($id);
            $address = Address::where('id', '=', $student->address_id)->first();
            return view('admin.student.profile', ['user' => $student, 'address' => $address]);
    }

    public function createForm(){
        return view('admin.student.add');
    }

    public function create(Request $request){
        $student = new Student();
        $address = new Address();
        $password = \Illuminate\Support\Str::random(10);

        $student->full_name = $request->name;
        $student->email = $request->email;
        $student->phone_no = $request->phone_number;
        $student->national_id = $request->national_id;
        $student->academic_id = $request->academic_id;
        $student->date_of_birth = $request->birth_date;

        $address->address = $request->address;
        $address->save();

        $student->address_id = $address->id;
        $student->admin_id = Auth::guard('admin')->user()->id;
        $student->password = Hash::make($password);
        $student->save();

        Mail::to($request->email)->send(new VerificationEmail($request->name, $password));

        return redirect()->back()->with('msg', 'Success!');
    }

    public function showUpdateForm($id){
        $student = Student::find($id);
        $address = Address::where('id', '=', $student->address_id)->first();
        return view('admin.student.student_update', ['user' => $student, 'address' => $address]);
    }

    public function update(Request $request){
        $student = Student::find($request->id);
        $address = Address::find($student->address_id);

        $student->full_name = $request->name;
        $student->email = $request->email;
        $student->phone_no = $request->phone_number;
        $student->national_id = $request->national_id;
        $student->academic_id = $request->academic_id;
        $student->date_of_birth = $request->birth_date;

        $address->address = $request->address;
        $address->save();
        $student->save();

        return redirect()->back()->with(['msg', 'Successfully Updated!']);
    }

    public function delete($id){

    }

}
