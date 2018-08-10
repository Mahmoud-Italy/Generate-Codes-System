<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Generate Code</strong>
      </div>

       <div class="card-body">
        {!! Form::Open() !!}
          <div class="row">
            

              <div class="col-sm-12 row">
                    
                @foreach(App\Scope::where('comp_id',Auth::user()->id)->where('status',1)->orderby('sort','ASC')->get() as $select)
                   @if($select->category == 0)
                      <div class="col-sm-3">
                         <div class="form-group">
                            <label>{{$select->scope}}</label>
                            <select class="form-control scope_category" name="scope[]">
                              @foreach(App\Service::where('scope_id',$select->id)->where('status',1)->orderby('sort','ASC')->get() as $option)
                              <option value="{{$option->digit}}">{{$option->name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      @elseif($select->category == 1)
                        <input type='hidden' name="scope[]" value="-">
                      @elseif($select->category == 2)
                        <input type='hidden' name="scope[]" value="{{App\Generate::getNextRnd($select->id)}}">
                      @endif
                    @endforeach

              </div>
                
                <div class="col-md-12"><hr></div>

             <div class="col-sm-6">

                         <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" required>
                          </div>

                          <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="at_date" required value="{{date('Y-m-d')}}">
                          </div>

                          <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" rows=4 name="notes"></textarea>
                          </div>

                          <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-check-circle"></i> Submit</button>
                            <a href="{{ url('/') }}" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                          </div>
                
                </div>

             </div>
             {!! Form::Close() !!}
          </div>
      </div>
  </div>