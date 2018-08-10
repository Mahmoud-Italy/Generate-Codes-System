@extends('system.layouts.layout')
@section('content')


    <div class="container-fluid">
       <div class="animated fadeIn">
           <div class="row">

<div class="col-sm-12">
@if($errors->any())
   <ul class="alert  alert-danger">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
   </ul>
@endif

@if(Session::has('success'))
 <p class="alert alert-success">{{Session::get('success')}}</p>
@elseif(Session::has('error'))
 <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif         
</div>            




<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Update Scope</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    {!! Form::Open() !!}
                         <div class="form-group">
                            <label>Category</label>
                            <select class="form-control scope_category" name="category">
                              <option value="0" @if($row->category == 0) selected @endif>Digit</option>
                              <option value="1" @if($row->category == 1) selected @endif>Dashed</option>
                              <option value="2" @if($row->category == 2) selected @endif>Incremental</option>
                            </select>
                          </div>

                         <div class="form-group scope_div">
                            <label>Scope Name</label>
                            <input type="text" class="form-control scope_name" name="scope" value="{{$row->scope}}" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Sort</label>
                            <input type="text" value="{{$row->sort}}" class="form-control scope_sort" name="sort" required>
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
                            <a href="{{ url('scopes') }}" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
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