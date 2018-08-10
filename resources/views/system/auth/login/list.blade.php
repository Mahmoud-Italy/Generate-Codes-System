<!DOCTYPE html>
<html>
<head>
  <title>Login Or Signup</title>
  <link href="{{ url('system/css/style.css') }}" rel="stylesheet">
  <link href="{{ url('system//font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
            
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
      
      {!! Form::Open(['id'=>'frmLogin']) !!}
         <div class="card p-5 col-sm-12" style="height: 400px">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  </div>
                  <input class="form-control" type="text" name="email" placeholder="Email Address" autocomplete="off">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                  </div>
                  <input class="form-control" name="password" type="password" placeholder="Password" autocomplete="off">
                </div>
                <div class="input-group mb-4" style="margin-top:-15px">
                    <p class="alert  form-control"></p>
                </div>
                <div class="row" style="margin-top:-15px">
                  <div class="col-6">
                    <button class="btn btn-primary px-4 btn-login-submit" type="button"><i class="fa "></i> Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
        {!! Form::Close() !!}

            <div class="card text-white bg-primary py-5 d-md-down-none " style="height:400px">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Register now and try our Generation Code System [ 20 ] Code Free Daily </p>
                  <button onclick="window.location.href='signup'" class="btn btn-primary active mt-3" type="button">Register Now!</button>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>


  
    <script src="{{ url('system/js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
     <script src="{{ url('system/js/popper.min.js') }}" type="text/javascript"></script>
  @include('system.auth.login.jsCode')
</body>
</html>