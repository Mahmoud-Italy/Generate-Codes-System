<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Redirect;
use Response;

use App\User;
use App\Scope;
use Illuminate\Http\Request;

class ScopeCtrl extends Controller
{
    
    #Construct
    public function __construct()
    {
        $this->view = 'system.scope';
    }

    #Create
    public function create()
    {
      if(isset($_GET['search']))
        $data = Scope::where('comp_id',Auth::user()->id)->where('scope','like','%'.$_GET['search'].'%')->orderBy('sort','ASC')->paginate(15);
      else
        $data = Scope::where('comp_id',Auth::user()->id)->orderBy('sort','ASC')->paginate(15);

        $nextSort = 0;
        $nextSort = Scope::where('comp_id',Auth::user()->id)->count('id')+1;
    	return view($this->view.'.list')->withdata($data)->withnextSort($nextSort);
    }

    #Store
    public function store(Request $request)
    {
        try {
             $row = new Scope;
             $row->comp_id  = Auth::user()->id;
             $row->category = $request->input('category');
             $row->scope = $request->input('scope');
             $row->sort = $request->input('sort');
             $row->status = 1;
             $row->save();
             Session::flash('success','Scope Added Success');
        } catch (\Exception $e) {
             Session::flash('error','Scope Not Added');
        }
           return Redirect::back();
    }

    #Edit
    public function edit($scope_id)
    {
        if(Scope::where('id',$scope_id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }
        
        $row = Scope::find($scope_id);
    	return view('system.scope.edit')->withrow($row);
    }

    #Update
    public function update($scope_id,Request $request)
    {
        if(Scope::where('id',$scope_id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }

        try {
             $row = Scope::find($scope_id);
             $row->comp_id  = Auth::user()->id;
             $row->category = $request->input('category');
             $row->scope = $request->input('scope');
             $row->sort = $request->input('sort');
             $row->status = $request->input('status');
             $row->save();
             Session::flash('success','Scope Added Success');
        } catch (\Exception $e) {
             Session::flash('error','Scope Not Added');
        }
           return Redirect::back();
    }

    #Destroy
    public function destroy($id)
    {
      if(Scope::where('id',$id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }
      try {
          Scope::find($id)->delete();
          Session::flash('success','Delete Success');
        } catch (\Exception $e) {
            Session::flash('error','Service Not Deleted');
        }
        return Redirect::back();
    }



}
