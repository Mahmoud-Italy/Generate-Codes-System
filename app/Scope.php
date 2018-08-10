<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    public  static function displayStatus($scope_id)
    {
    	$obj = self::find($scope_id);
    	if($obj->status == 1)
    		$res = '<span class="badge badge-success">Active</span>';
    	else
    		$res = '<span class="badge badge-danger">InActive</span>';

    	return $res;
    }

}
