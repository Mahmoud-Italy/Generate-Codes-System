<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link href="{{ url('system/css/style.css') }}" rel="stylesheet">
  <link href="{{ url('system//font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <meta content="{!! csrf_token() !!}" name="csrf-token" />
</head>
<body class="app flex-row align-items-center">
            
 <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Signup</h1>
              <p class="text-muted">Create your account</p>
          
          {!! Form::Open(['id'=>'frmSignup']) !!}

              <div class="input-group mb-3">
                <input class="form-control" type="text" name="name" placeholder="Company Name" autocomplete="off">
              </div>

              <div class="input-group mb-3">
                <input class="form-control" type="text" name="email" placeholder="Email Address" autocomplete="off">
              </div>

              <div class="input-group mb-3">
                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
              </div>

              <div class="input-group mb-3">
                <select class="form-control" style="height: 40px" name="plan_id" required>
                  <option value="">Select Plan</option>
                  <option value="1">Free Plan [ 20 Generate Codes Daily ]</option>
                  <option value="2">Premuim Plan [ Unlimited Codes ]</option>
                </select>
              </div>

              <div class="input-group mb-3">
                  <p class="alert form-control" style="padding: 8px"></p>
              </div>

              <button class="btn btn-block btn-primary btn-signup-submit"  type="button"><i class="fa "></i> CREATE ACCOUNT</button>
          
          {!! Form::Close() !!}
            </div>
          
          </div>
        </div>
      </div>
    </div>

    <script src="{{ url('system/js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
     <script src="{{ url('system/js/popper.min.js') }}" type="text/javascript"></script>
  @include('system.auth.signup.jsCode')
</body>
</html>