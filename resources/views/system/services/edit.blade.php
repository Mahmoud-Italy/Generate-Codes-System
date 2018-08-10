@extends('system.layouts.layout')
@section('content')

    <div class="container-fluid">
       <div class="animated fadeIn">
           <div class="row">

<div class="col-sm-12">
@if(Session::has('success'))
 <p class="alert alert-success">{{Session::get('success')}}</p>
@elseif(Session::has('error'))
 <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif         
</div>        

      
<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Update</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    {!! Form::Open() !!}

                         <div class="form-group scope_div">
                            <label>Service Name</label>
                            <input type="text" class="form-control" name="name" value="{{$row->name}}" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Digit</label>
                            <input type="text" class="form-control" name="digit" value="{{$row->digit}}" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Sort</label>
                            <input type="text" class="form-control scope_sort" name="sort" value="{{$row->sort}}" required>
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control scope_sort" name="status">
                                <option value="1" @if($row->status == 1) selected @endif>Active</option>
                                <option value="0" @if($row->status == 0) selected @endif>InActive</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-check-circle"></i> Update</button>
                            <a href="{{ url('services/'.$row->scope_id) }}" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                          </div>

                   {!! Form::Close() !!}
               
               </div>
             </div>
          </div>
      </div>
  </div>


          </div>
        </div>
      </div>
    </div>
@stop

@section('jsCode')
  @include('system.scope.jsCode')
@stop