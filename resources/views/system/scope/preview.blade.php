@if(count($data))
<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Preview Scope</strong>
      </div>
       <div class="card-body">
          <div class="row">
               <div class="col-sm-12 row">
                     @foreach(App\Scope::where('comp_id',Auth::user()->id)->where('status',1)->orderBy('sort','ASC')->get() as $preview)
                       <div style="width:auto;padding:10px;height:40px;border:1px solid #eee">
                          <b>{{$preview->scope}}</b>
                       </div>
                     @endforeach    
               </div>
             </div>
          </div>
      </div>
  </div>
@endif