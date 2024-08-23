<?php

namespace App\Http\Controllers;

use App\Models\Applyjob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplyjobController extends Controller
{
    public function apply(Request $request){
        $user_id = Auth::id();
        $post_id = $request->postId;

        $exist_user = Applyjob::where('user_id', $user_id)->first();

        $exist_user = DB::table('applyjobs')
                    ->where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->get()->isEmpty();

        if($exist_user == true){
            Applyjob::create([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
            $success = "Job applied";
        }else{
            $success = "This Job is already applied";
        }

        return redirect()->route('user#home')->with(['success'=>$success]);
    }
}
