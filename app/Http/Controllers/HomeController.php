<?php

namespace App\Http\Controllers;

use App\Models\Applyjob;
use App\Models\Jobpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        // $posts = Jobpost::where('visibility', 'Public')->get();
        // return view('index', compact('posts'));

        $user_id = Auth::id();
        $exist_user = Applyjob::where('user_id', $user_id)->get()->toArray();

        //Get post id that user applied
        $applied = array_column($exist_user, 'post_id');

        //Get all public posts
        $posts = Jobpost::when(request('key'), function($query){
            $query->where('location','like','%'. request('key') .'%');
            })
            ->orderBy('id', 'desc')
            ->where('visibility', 'Public')
            ->paginate(5);

        return view('user.home', compact('posts', 'applied'));

    }

    //direct login page
    public function loginPage(){
        return view('partial.login');
    }

    //direct register page
    public function registerPage(){
        return view('partial.register');
    }

}
