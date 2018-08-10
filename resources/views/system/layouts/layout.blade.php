<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>DBMS</title>

    <link href="{{ url('system/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('system//font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('style')
  </head>


  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('system.layouts.header')

    <div class="app-body">
       
       @include('system.layouts.sidebar')

      <main class="main" style="margin-top:50px">
          @yield('content')
      </main>      
    </div>
       

    <script src="{{ url('system/js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
     <script src="{{ url('system/js/popper.min.js') }}" type="text/javascript"></script>
     
     @yield('jsCode')
     
  </body>
</html>