<header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ url('system/img/brand/logo.svg')}}" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{ url('system/img/brand/sygnet.svg') }}" width="30" height="30" alt="CoreUI Logo">
      </a>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
           <span style="color:red"> {{App\Free_plan::displayRemainCode(Auth::user()->id)}} </span>
        </li>
        <li class="nav-item"></li>
        <li class="nav-item">
           <a href="{{ url('logout') }}" style="color: #000"><i class="fa fa-sign-out"></i> Logout</a>
        </li>
        <li class="nav-item"></li>
      </ul>
    </header>