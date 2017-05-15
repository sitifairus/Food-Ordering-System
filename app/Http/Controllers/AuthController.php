<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function checksession() {
        if (session()->has('current_user')) {
            if(session()->get('current_user.roles')=='Manager'){
                return redirect()->route('Manager.home');
            }else {
                return redirect()->route('CounterStaff.home');
            }
        }
        return view('login');
    }

    public function signin(Request $request){
        $user  = user::orderBy('created_at', 'asc')->get();
        $check = false;
        for($i=0; $i<count($user); $i++)
        {
            if($user[$i]['employee_id']==$request->employee_id&&$user[$i]['password']==$request->password){
                $curren_user=new user;
                $current_user=$user[$i];
                $check = true;
                break;
            }
        }

        if($check){
            session()->put('current_user',$current_user);
            if($current_user['roles'] == "Manager"){
                return redirect()->route('Manager.home');
            } else {
                return redirect()->route('CounterStaff.home');
            }
        } else {
            return redirect()->route('Staff');
            //return back();
        }
    }

     public function logout() {
        session()->flush();
        return redirect()->route('Staff');
     }

}
