<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\Address;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    use RegistersUsers;

    public function showRegistrationForm()
    {
//        if (! $this->chekSuperAdmin()){
//            return redirect()->back()->withErrors('Do not have permission !');
//        }
        return view('admin.auth.register');
    }

    protected $redirectTo = '/admin';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
        ]);
    }
    public function register(Request $request)
    {
         $pass = Str::random(10);

        if (! $this->chekSuperAdmin()){
            return redirect()->back()->withErrors('Do not have permission !');
        }

        try {
            $this->validator($request->all())->validate();
        } catch (ValidationException $e) {
        }
        $user = $this->create($request->all(), $pass);
        if ($user) {
            Mail::to($request->email)->send(new VerificationEmail($request->name, $pass));
            return redirect()->back()->with(['Successfully Assigned In!']);
        }
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function create(array $data, $pass)
    {
        $address = new Address();
        $address->address = $data['address'];
        $address->save();

        return Admin::create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'remember_token' => rand(1,10),
            'phone_no' => $data['phone_number'],
            'national_id' => $data['national_id'],
            'academic_id' => $data['academic_id'],
            'address_id' => $address->id,
            'date_of_birth' => $data['birth_date'],
            'password' => Hash::make($pass),
        ]);
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function chekSuperAdmin(){
        $roles = Auth::guard('admin')->user()->adminRoles;
        foreach ($roles as $item){
            if ($item->role_id === 1)
                return true;
        }
        return false;
    }

}
