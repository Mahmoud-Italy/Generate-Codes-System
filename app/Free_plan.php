<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Free_plan extends Model
{
    protected $table = 'free_plan';

    public static function displayRemainCode($comp_id)
    {
    	if(User::where('id',$comp_id)->where('plan_id',1)->count() > 0) {
    	  $default = 20;
    	  $count = self::where('comp_id',$comp_id)->where('at_date',date('Y-m-d'))->count();
    	  $remain = $default - $count;
          return $remain.' Codes Remain Today';
        } else return  "";
    }


}
