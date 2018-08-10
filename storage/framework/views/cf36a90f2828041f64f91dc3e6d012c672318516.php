<!DOCTYPE html>
<html>
<head>
  <title>Login Or Signup</title>
  <link href="<?php echo e(url('system/css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(url('system//font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">



<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">

            <?php echo $__env->make('system.auth.login.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('system.auth.signup.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          </div>
        </div>
      </div>
    </div>


  
  <script type="text/javascript" href="<?php echo e(url('js/jquery-3.3.1.min.js')); ?>"></script>
  <script type="text/javascript" href="<?php echo e(url('js/app.js')); ?>"></script>
  
<?php echo $__env->make('system.auth.layouts.jsCode', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>