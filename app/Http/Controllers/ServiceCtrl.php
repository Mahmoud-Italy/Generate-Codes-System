<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Redirect;
use Response;

use App\Scope;
use App\Service;
use Illuminate\Http\Request;

class ServiceCtrl extends Controller
{
    #Construct
	public function __construct()
    {
        $this->view = 'system.services';
    }

    #Create
    public function create($scope_id)
    { 
        if(Scope::where('id',$scope_id)->where('comp_id',Auth::user()->id)->count() == 0) { return abort(404); }
        if(isset($_GET['search']))
          $data = Service::where('scope_id',$scope_id)->where('name','like','%'.$_GET['search'].'%')->orderBy('sort','ASC')->paginate(15);
        else
          $data = Service::where('scope_id',$scope_id)->orderBy('sort','ASC')->paginate(15);

        $nextSort = 0;
        $nextSort = Service::where('comp_id',Auth::user()->id)->where('scope_id',$scope_id)->count('id')+1;
        return view($this->view.'.list')->withdata($data)->withscopeid($scope_id)->withnextSort($nextSort);
    }

    #Store
    public function store($scope_id,Request $request)
    {
        if(Service::where('comp_id',Auth::user()->id)->where('name',$request->input('name'))->count() > 0) {
            Session::flash('error','Service Name already exists.');
        } else if (Service::where('comp_id',Auth::user()->id)->where('digit',$request->input('digit'))->count() > 0) {
            Session::flash('error','Service Digit already exists.');
        } else {

        try {
             $row = new Service;
             $row->comp_id  = Auth::user()->id;
             $row->scope_id = $scope_id;
             $row->name = $request->input('name');
             $row->digit = $request->input('digit');
             $row->sort = $request->input('sort');
             $row->status = 1;
             $row->save();
             Session::flash('success','Scope Added Success');

        } catch (\Exception $e) {
             Session::flash('error','Scope Not Added');
        }
    }
           return Redirect::back();
    }

    #Edit
    public function edit($id)
    {
        if(Service::where('id',$id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }

        $row = Service::find($id);
    	return view('system.services.edit')->withrow($row);
    }

    #Update
    public function update($id,Request $request)
    {
        if(Service::where('id',$id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }
        
       
        try {
             $row = Service::find($id);
             $row->name = $request->input('name');
             $row->digit = $request->input('digit');
             $row->sort = $request->input('sort');
             $row->status = 1;
             $row->save();
             Session::flash('success','Service Added Success');
        } catch (\Exception $e) {
             Session::flash('error','Service Not Added');
        }
           return Redirect::back();
    }

    #Destroy
    public function destroy($id)
    {
        if(Service::where('id',$id)->where('comp_id',Auth::user()->id)->count() == 0) 
            { return abort(404); }
        try {
            Service::find($id)->delete();
            Session::flash('success','Delete Success');
        } catch (\Exception $e) {
            Session::flash('error','Service Not Deleted');
        }
        
        return Redirect::back();
    }
}
