<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Redirect;
use Response;

use App\User;
use App\Generate;
use App\Free_plan;
use Illuminate\Http\Request;

class GenerateCtrl extends Controller
{
	public function __construct()
    {
        $this->view = 'system.generate';
    }

    public function create()
    {
        $data = DB::table('generates')->where('comp_id',Auth::user()->id)
             ->select(DB::raw('count(*) as user_count, at_date'))
             ->groupBy('at_date')->orderBy('at_date','DESC')->paginate(20);
             
        return view($this->view.'.list')->withdata($data);
    }

    public function store(Request $request)
    {
         if(Free_plan::where('comp_id',Auth::user()->id)->where('at_date',date('Y-m-d'))->count() >= 20) {
              Session::flash('error','Free Plan limit 20 Code each Day');
         } else {

        try {

        	 DB::beginTransaction();
             $row = new Generate;
             $row->comp_id  = Auth::user()->id;
             $row->scope_arr = json_encode($request->input('scope'));
             $row->price = $request->input('price');
             $row->notes = $request->input('notes');
             $row->at_date = $request->input('at_date');
             $row->status = 1;
             $row->save();
            
            if(User::where('id',Auth::user()->id)->where('plan_id',1)->count() > 0) {
	             $free = new Free_plan;
	             $free->comp_id = Auth::user()->id;
	             $free->code = json_encode($request->input('scope'));
	             $free->at_date = date('Y-m-d');
	             $free->save();
             }

                DB::commit();
                Session::flash('success','Code Generated Success');
	        } catch (\Exception $e) {
	        	 DB::rollBack();
	             Session::flash('error','Code Not Generated');
	        } 
        }
           return Redirect::back();
    }


     #Destroy
    public function destroy($id)
    {
        if(Generate::where('id',$id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }

        try {
            Generate::find($id)->delete();
            Session::flash('success','Code Delete Success');
        } catch (\Exception $e) {
            Session::flash('error','Code Not Deleted');
        }
        
        return Redirect::back();
    }



}
