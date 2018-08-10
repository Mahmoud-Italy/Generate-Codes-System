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

          @include('system.scope.create')

          @include('system.scope.preview')
            
          @if(count($data) || isset($_GET['search']))
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <strong>All Scopes ( {{count($data)}} )</strong>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-12">

                         {!! Form::Open(['method'=>'GET']) !!}
                           <div class="inner-addon right-addon search-addon">
                                @if(isset($_GET['search'])) 
                                <a href="{{ url('scopes') }}" >
                                  <i class="fa fa-times pull-right" style="margin-left:46%;margin-top:10px;position: absolute;z-index:99;color:#000"></i></a> 
                                @else <i class="fa fa-search pull-right" style="margin-left:46%;margin-top:10px;position: absolute;z-index: 99"></i> @endif
                                <input type="text" name="search" style="margin-bottom: 10px" class="col-sm-6 form-control search-inpo" placeholder="Search for Scope Name" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}">
                            </div>
                          {!! Form::Close() !!}
                      
                      @if(count($data))

                          <table class="table table-responsive-sm table-bordered">
                            <thead>
                              <th class="text-center" style="width:5%">#</th>
                              <th class="text-center" style="width:20%">Scope Name</th>
                              <th class="text-center" style="width:10%">Sort</th>
                              <th class="text-center" style="width:10%">Date</th>
                              <th class="text-center" style="width:10%">Status</th>
                              <th class="text-center" style="width:15%">Tools</th>
                            </thead>
                            <tbody>
                          @foreach($data as $key => $row)    
                              <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$row->scope}}</td>
                                <td class="text-center">{{$row->sort}}</td>
                                <td class="text-center">{{explode(' ',$row->created_at)[0]}}</td>
                                <td class="text-center">{!! App\Scope::displayStatus($row->id) !!}</td>
                                <td class="text-center">
                                  {!! Form::Open(['url'=>'scopes/destroy/'.$row->id]) !!}
                                    <a href="{{ url('scopes/edit/'.$row->id) }}" class="btn btn-primary">
                                     <i class="fa fa-edit"> Edit</i>
                                    </a>
                                   <button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                  {!! Form::Close() !!}
                                </td>
                              </tr>
                         @endforeach
                            </tbody>
                          </table>
                        @endif
                        </div>
                      </div>
                    </div>
                  </div>
                   {!! $data->render() !!}
                </div>
              @endif
              

          </div>
        </div>
      </div>
    </div>
@stop

@section('jsCode')
  @include('system.scope.jsCode')
@stop