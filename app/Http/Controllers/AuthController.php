<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //direct login page
    public function loginPage(){
        // return view('login');
        return view('partial.login');
    }

    //direct register page
    public function registerPage(){
        // return view('register');
        return view('partial.register');

    }

    //direct deshboard
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect('admin/dashboard');
        }elseif(Auth::user()->role == 'agent'){
            return redirect('agent/dashboard');
        }
        return redirect()->route('user#home');
    }

    //logout
    public function logoutPage(Request $request) {
        Auth::logout();
        return redirect('/home');
    }

    public function adminLogout(Request $request) {
        Auth::logout();
        return redirect('/loginPage');
    }

    //change password page
    public function changePasswordPage(){
        return view('password.change');
    }

    public function changePassword(Request $request){
        /*
            1. all field must be fill
            2. new password & confrim password length must be greater than 6 and not greater than 10
            3. new password & confirm password must be same
            4. client old password must be same with db password
            5. password change
        */

        $this->passwordValidationCheck($request);

        $currentUserId = Auth::user()->id;

        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHashValue = $user->password; // hash value

        if(Hash::check($request->oldPassword, $dbHashValue)){
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);

            // Auth::logout();
            // return redirect()->route('user#list');
            return back()->with(['changeSuccess' => 'Password Changed Success...']);
        }

        // dd($user->toArray());

        return back()->with(['notMatch' => 'The Old Password not Match. Try again!']);

    }

    //password validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6|max:10',
            'newPassword' => 'required|min:6|max:10',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ])->validate();
    }
}
