<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index(){
        $id = Auth::id();
        $data = User::where('id', $id)->findOrFail($id);
        return view('agent.index', compact('data'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->findOrFail($id);
        return view('agent.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $data = $this->getUserData($request);
        $user = User::where('id', $id)->findOrFail($id);

        //for image
        if($request->hasFile('image')){
            // 1. old image name | check => delete | store
            $dbImage = User::where('id',$id)->first();
            $dbImage = $dbImage->image;

            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;

        }

        $user->update($data);

        return redirect()->back()->with('success', 'Updated');
    }

    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->findOrFail($id);
        $user->delete();

        return back()->with(['message' => 'Blog deleted successfully']);
    }

    public function showDetails($id)
    {
        $detail = User::where('id', $id)->findOrFail($id);
        return view('agent.users.details', compact('detail'));
    }

    //change password page
    public function changePasswordPage(){
        return view('agent.password.change');
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
