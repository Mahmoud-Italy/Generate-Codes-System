<!DOCTYPE html>
<html>
<head>
  <title>Login Or Signup</title>
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('css/auth.css')); ?>">
</head>
<body>

<?php echo $__env->make('system.auth.login.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('system.auth.signup.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>
</html>