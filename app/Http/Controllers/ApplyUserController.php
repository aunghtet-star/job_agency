<?php

namespace App\Http\Controllers;

use App\Models\Applyjob;
use App\Models\Jobpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyUserController extends Controller
{
    public function applyUser(){

        $users = User::all();
        $jobs = Jobpost::all();
        $apply = Applyjob::all();

        // dd($apply->toArray());
        return view('admin.apply', compact('jobs', 'apply', 'users'));
    }

    public function agentApplyUser(){

        $users = User::all();
        $jobs = Jobpost::all();
        $apply = Applyjob::all();

        // dd($apply->toArray());
        return view('agent.apply', compact('jobs', 'apply', 'users'));
    }
}
