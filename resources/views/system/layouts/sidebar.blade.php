<div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">
                <i class="nav-icon icon-drop"></i>{{ Auth::user()->name }} Dashboard</a>
            </li>
            <li class="nav-title">Scopes</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('scopes') }}">
                <i class="nav-icon icon-drop"></i> Create Scope</a>
            </li>
          
          @if(App\Scope::where('comp_id',Auth::user()->id)->where('category',0)->where('status',1)->count() > 0)
            <li class="nav-title">Services</li>
          
          @foreach(App\Scope::where('comp_id',Auth::user()->id)->where('category',0)->where('status',1)->get() as $sidebar)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('services/'.$sidebar->id) }}">
                <i class="nav-icon icon-pencil"></i> {{$sidebar->scope}}</a>
            </li>
          @endforeach

            <li class="nav-title">Publish Code</li>
              <li class="nav-item">
              <a class="nav-link" href="{{ url('generate') }}">
                <i class="nav-icon icon-pencil"></i> Generate Code</a>
            </li>
          @endif
           
          </ul>
        </nav>
         <li>
      </div>