<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{
    public static function getNextRnd($id)
    {
    	$value = Scope::where('id',$id)->first();
    	$count = Free_plan::where('comp_id',$value->comp_id)->count();
    	$increment = $value->scope;
    	$strlen = strlen($value->scope);
        
        $nextRnD = str_pad((int) $increment+$count, $strlen ,"0",STR_PAD_LEFT);
        return $nextRnD;

    }
}
