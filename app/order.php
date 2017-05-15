<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order_food_list;

class order extends Model
{
   	protected $fillable = ['order_status', 'queue_number','total_price', 'order_food_list'];
}
