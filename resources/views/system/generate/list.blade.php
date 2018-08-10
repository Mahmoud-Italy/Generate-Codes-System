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

              @include('system.generate.create')
           
           @if(count($data))
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <strong>All Codes ( {{App\Generate::where('comp_id',Auth::user()->id)->count()}} )</strong>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-12">
                          <table class="table table-responsive-sm table-bordered">
                            <thead>
                              <th class="text-center">#</th>
                              <th class="text-center">Generate Code</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Notes</th>
                              <th class="text-center">Tools</th>
                            </thead>
                            <tbody>
                              @foreach($data as $group)
                                     <tr style="background: #515151;color:#fff">
                                      <th colspan="5" class="text-center">
                                        <?php 
                                           if($group->at_date == date('Y-m-d')) $res = 'Today';
                                           else $res = $group->at_date;
                                         ?>
                                        {{$res}}
                                    </th>
                                    </tr>
                        @foreach(App\Generate::where('comp_id',Auth::user()->id)->where('at_date',$group->at_date)->get() as $key => $row)
                                    <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">
                                  {{str_replace(array(',','"', '"', ']', '['),' ', $row->scope_arr)}}</td>
                                <td class="text-center">{{$row->price}}</td>
                                <td class="text-center">{{$row->notes}}</td>
                                <td class="text-center">
                                  {!! Form::Open(['url'=>'generate/destroy/'.$row->id]) !!}
                                   <button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                  {!! Form::Close() !!}
                                </td>
                              </tr>
                          @endforeach
                        @endforeach
                            </tbody>
                          </table>
                      </div>
                    </div>

                    </div>
                  </div>
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