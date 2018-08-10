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

    <link href="<?php echo e(url('system/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('system//font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('style'); ?>
  </head>


  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <?php echo $__env->make('system.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="app-body">
       
       <?php echo $__env->make('system.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <main class="main" style="margin-top:50px">
          <?php echo $__env->yieldContent('content'); ?>
      </main>      
    </div>
       

    <script src="<?php echo e(url('system/js/jquery-1.8.3.min.js')); ?>" type="text/javascript"></script>
     <script src="<?php echo e(url('system/js/popper.min.js')); ?>" type="text/javascript"></script>
     
     <?php echo $__env->yieldContent('jsCode'); ?>
     
  </body>
</html>