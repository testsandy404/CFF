<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function master()  // master template
    {
        return view('admin.master');
    }

    public function home()  // home page
    {
        if(Auth::user()){
            return view('admin.pages.user.home');
        }
        return Redirect::route('login');
    }

    public function changePass()    //change password page
    {
        return view('admin.pages.user.change-password');
    }

    public function passValid(Request $req) // change password validation
    {
        $validatePass = $req->validate([
            'uid' => 'required',
            'opass' => 'required',
            'pass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'cpass' => 'required_with:pass|same:pass',
        ], [
            'opass.required' => "Enter current password",

            'pass.required' => "Enter password",
            'pass.regex' => "Minimum eight characters, at least one uppercase letter, one lowercase letter and one number",

            'cpass.required_with' => "Re-enter new password",
            'cpass.same' => "Password doesn't match",
        ]);
        if ($validatePass) {

            $password = Auth::user()->password;
            if (Hash::check($req->opass, $password)) {
                $npass = Hash::make($req->pass);
                $user = User::where('id', '=', $req->uid)->first();
                $user->password = $npass;

                try {
                    $user->save();
                    return back()->with('Success', 'Password changed successfully!');
                } catch (\Illuminate\Database\QueryException $e) {
                    return back()->with('Error', 'Password change failed - ' . $e->getMessage());
                }
            } else {
                return back()->with('Error', 'Incorrect current password');
            }
        }
    }

    public function editProfile()   // edit profile
    {
        return view('admin.pages.user.edit-profile');
    }

    public function editProfileValid(Request $req) //edit profile validation
    {
        $validateUser = $req->validate([
            'uid' => 'required',
            'fname' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'lname' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
        ], [
            'fname.required' => "Enter first name",
            'fname.regex' => "Alphabets only, 2-100 characters",

            'lname.required' => "Enter last name",
            'lname.regex' => "Alphabets only, 2-100 characters",

            'email.required' => "Enter email",
            'email.regex' => "Enter valid format (example: abc@lmn.xyz)",

        ]);
        if ($validateUser) {

            $user = User::where('id', '=', $req->uid)->first();
            $user->first_name = $req->fname;
            $user->last_name = $req->lname;
            $user->email = $req->email;

            try {
                $user->save();
                return back()->with('Success', 'Profile updated successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Profile update failed - ' . $e->getMessage());
            }
        }
    }

    public function logout()    // logout
    {
        Session::flush();
        Auth::logout();
        return Redirect::route('login');
    }
}
