<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\product;
use App\order_food_list;
use App\displayQ;
use Illuminate\Support\Facades\DB;
function ifCounterStaff()
{
	if (session()->has('current_user')) {
	    if(session()->get('current_user.roles')=='CounterStaff'){
	    	return true;
	    }
	}
	return redirect()->route('Staff');
}

class CounterStaffController extends Controller
{
    public function index(){
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
        
    }

    public function home(){
    	if(ifCounterStaff()){
    		return view('CounterStaff.homepage');
    	}
    	else{

    	}
    }
    
    public function ChangeToNotAvailable(request $request){
        if(ifCounterStaff()){
            product::where('id',$request->id)->update(['product_status' => "Not Available"]);
            return back();
        }
    }

    public function ChangeToAvailable(request $request){
        if(ifCounterStaff()){
            product::where('id',$request->id)->update(['product_status' => "Available"]);
            return back();
        }
    }

    public function ViewSetMenu(){
        if(ifCounterStaff()){
            $product = product::where('product_category','Set')->get();
            return view('CounterStaff.ViewMenu', compact('product'));
            //return view('CounterStaff.ViewOrder');
        }
    }

    public function ViewAlacarteMenu(){
        if(ifCounterStaff()){
            $product = product::where('product_category','Alacarte')->get();
            return view('CounterStaff.ViewMenu', compact('product'));
            //return view('CounterStaff.ViewOrder');
        }
    }


    public function PrepareFood(order $order){
        if(ifCounterStaff()){
            order::where('id',$order->id)->update(['order_status' => "Preparing", 'attend_by' => session()->get('current_user.employee_id')]);
            return back();
        }
    }

    public function CallCustomer(order $order){
        if(ifCounterStaff()){
            order::where('id',$order->id)->update(['order_status' => "Calling Customer"]);
            $que=array();
            for($t=0; $t<5;$t++)
            {
                $que[$t]=displayQ::where('id',$t)->first();
            }
            
            for($i=1; $i<count($que); $i++)
            {
                displayQ::where('id',($i+1))->update(['QueNumDispaly'=>$que[$i]->QueNumDispaly]);
            }
            displayQ::where('id',1)->update(['QueNumDispaly'=>$order->queue_number]);
            return back();
        }
    }

    public function OrderDone(order $order){
        if(ifCounterStaff()){
            order::where('id',$order->id)->update(['order_status' => "Done"]);
            return back();
        }
    }

    public function DeleteOrder(order $order){
        if(ifCounterStaff()){
            $order->delete();
            return back();
        }
    }
    public function ViewOrder(){
        if(ifCounterStaff()){
            $orders = order::where('order_status', '!=', 'Done')->get();
            for($i=0; $i<count($orders);$i++)
            {
                $item = order_food_list::join('products', 'order_food_lists.product_id', '=', 'products.id')
                                         ->where('order_food_lists.order_id',$orders[$i]['id'])
                                         ->get();
                //$order_food_list = order_food_list::where('order_id',  $orders[$i]['id'])->value('i');
                $orders[$i]['order_food_list']=$item;
            }
            return view('CounterStaff.ViewOrder', compact('orders'));
            //return view('CounterStaff.ViewOrder');
        }
        else{

        }
    }
}
