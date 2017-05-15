<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
class QueController extends Controller
{
    //
    public function getQeuNum(){
	    $QueNum  = Queue::where('date', date('Y-m-d'))->orderBy('id', 'desc')->first();
	    if(isset($QueNum)&&$QueNum['que_num']<=999){
	    	Queue::where('id',$QueNum['id'])->update(['que_num' => $QueNum['que_num']+1]);
	        return $QueNum['que_num']+1;
	    }else{
	        $q = new Queue;
	        $q['date'] = date('Y-m-d');
	        $q['que_num'] = 1;
	        $q->save();
	        return 1;
	    }
	}
}
