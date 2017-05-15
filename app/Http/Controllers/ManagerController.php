<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use App\product;
use App\user;
function ifManager()
{
	if (session()->has('current_user')) {
	    if(session()->get('current_user.roles')=='Manager'){
	    	return true;
	    }
	}
	return redirect()->route('Staff');
}
class ManagerController extends Controller
{
	
    public function home(){
    	if(ifManager()){
    		return view('Manager.homepage');
    	}
    }

    public function ManageMenuAlacarte(){
        if(ifManager()){
            $alacarte = product::where('product_category','Alacarte')->get();
            return view('Manager.ManageMenuAlacarte', compact('alacarte'));
        }
    }

    public function ManageMenuSet(){
        if(ifManager()){
            $set = product::where('product_category','Set')->get();
            return view('Manager.ManageMenuSet', compact('set'));
        }
    }

    public function AddNewMenu(Request $request){
        if(ifManager()){
            $file = $request->file('product_picture');
            $file_dest = 'product_images';
            $file_name = $request->product_name.'.'.$file->getClientOriginalExtension();
            $file->move($file_dest, $file_name);

            $product = new product;
            $product['product_name'] =$request->product_name;
            $product['product_description'] =$request->product_description;
            $product['product_price'] =$request->product_price;
            $product['product_status'] =$request->product_status;
            $product['product_category'] =$request->product_category;
            $product['picture_url'] =$file_dest.'/'.$file_name;
            $product->save();
            //$product->delete();
            return back();
        }
    }
    public function AddNewUser(Request $request){
        if(ifManager()){
            $file = $request->file('user_picture');
            $file_dest = 'user_images';
            $file_name = $request->employee_id.'.'.$file->getClientOriginalExtension();
            $file->move($file_dest, $file_name);

            $user = new user;
            $user['name'] =$request->name;
            $user['employee_id'] =$request->employee_id;
            $user['roles'] =$request->roles;
            $user['password'] = $request->employee_id;
            $user['image_url'] =$file_dest.'/'.$file_name;
            $user->save();
            return redirect()->route('Manager.user');
        }
    }
    public function ChangeUserImage(Request $request){
        if(ifManager()){
            $user = user::where('employee_id',$request->employee_id)->first();
            $file = $request->file('user_picture');
            $file_dest = 'user_images';
            if($user->image_url!=NULL)
                unlink($user->image_url);
            $file_name = $user->employee_id.'.'.$file->getClientOriginalExtension();
            $file->move($file_dest, $file_name);
            user::where('employee_id',$request->employee_id)->update(['image_url' => $file_dest.'/'.$file_name]);
            return redirect()->route('Manager.user');
        }
    }
    public function ModifyMenu(request $request){
        if(ifManager()){
            $product=product::where('id', $request->id)->first();
            return view('Manager.ModifyMenu', compact('product'));
        }
    }
    public function ModifyMenuDB(request $request){
        if(ifManager()){
            product::where('id',$request->id)->update([ 'product_name' => $request->product_name,
                                                        'product_description' => $request->product_description,
                                                        'product_price' => $request->product_price,
                                                        'product_category' => $request->product_category,
                                                        'product_status' => $request->product_status,
                                                        ]);
            return redirect()->route('Manager.ManageMenuSet');
        }
    }


    public function ModifyUser(request $request){
        if(ifManager()){
            $user=user::where('id', $request->id)->first();
            return view('Manager.ModifyUser', compact('user'));
        }
    }
    public function ModifyUserDB(request $request){
        if(ifManager()){
            user::where('employee_id',$request->employee_id)->update(['name' => $request->name, 'employee_id' => $request->employee_id, 'roles' => $request->roles]);
            return redirect()->route('Manager.user');
        }
    }

    public function DeleteMenu(product $product){
        if(ifManager()){
            unlink($product->picture_url);
            $product->delete();
            return back();
        }
    }
    public function DeleteUser(user $user){
        if(ifManager()){

            unlink($user->image_url);
            $user->delete();
            return back();
        }
    }

    public function getUser(){
        if(ifManager()){
            $user = user::orderBy('name', 'asc')->get();
            return view('Manager.EmployeeList', compact('user'));
        }
    }

    public function NewUserFrom(){
        if(ifManager()){
            return view('Manager.NewUserFrom');
        }
    }
    public function viewQueNum(){
    	if(ifManager()){
    		$QueNum  = Queue::where('date', date('Y-m-d'))->value('que_num');
    		if(isset($QueNum)){
    			return view('Manager.CustomerQueNumber', compact('QueNum'));
    		}
    		else{
    			$q = new Queue;
    			$q['date'] = date('Y-m-d');
    			$q['que_num'] = 0;
    			$q->save();
    			return redirect()->route('Manager.viewQueNum');
    		}
    	}
    }
}
