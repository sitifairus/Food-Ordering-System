<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
     public function home(){
        $vehicles  = UserVehicle::with('users', 'vehicles')->latest()->get();
        //dd($vehicles);
        return view('User.home', compact('vehicles'));

    }
    public function rent(UserVehicle $v){

    \App\Request::create([
            'users_id' => auth()->user()->id,
            'owner_id' => $v->users_id,
            'vehicles_id' => $v->vehicles_id
        ]);
        return redirect()->route('user.request');

    }

    public function request(){        
       $requests = \App\Request::with('users', 'vehicles')->whereUsersId(auth()->user()->id)->latest()->get();
        return view('User.request', compact('requests'));

    }
}
