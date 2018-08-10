<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
     <div class="row">

<div class="col-sm-12">
<?php if($errors->any()): ?>
   <ul class="alert  alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
<?php endif; ?>

<?php if(Session::has('success')): ?>
 <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
<?php elseif(Session::has('error')): ?>
 <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
<?php endif; ?>         
</div>        

          <?php echo $__env->make('system.scope.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <?php echo $__env->make('system.scope.preview', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
          <?php if(count($data) || isset($_GET['search'])): ?>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <strong>All Scopes ( <?php echo e(count($data)); ?> )</strong>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-12">

                         <?php echo Form::Open(['method'=>'GET']); ?>

                           <div class="inner-addon right-addon search-addon">
                                <?php if(isset($_GET['search'])): ?> 
                                <a href="<?php echo e(url('scopes')); ?>" >
                                  <i class="fa fa-times pull-right" style="margin-left:46%;margin-top:10px;position: absolute;z-index:99;color:#000"></i></a> 
                                <?php else: ?> <i class="fa fa-search pull-right" style="margin-left:46%;margin-top:10px;position: absolute;z-index: 99"></i> <?php endif; ?>
                                <input type="text" name="search" style="margin-bottom: 10px" class="col-sm-6 form-control search-inpo" placeholder="Search for Scope Name" value="<?php echo e(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                            </div>
                          <?php echo Form::Close(); ?>

                      
                      <?php if(count($data)): ?>

                          <table class="table table-responsive-sm table-bordered">
                            <thead>
                              <th class="text-center" style="width:5%">#</th>
                              <th class="text-center" style="width:20%">Scope Name</th>
                              <th class="text-center" style="width:10%">Sort</th>
                              <th class="text-center" style="width:10%">Date</th>
                              <th class="text-center" style="width:10%">Status</th>
                              <th class="text-center" style="width:15%">Tools</th>
                            </thead>
                            <tbody>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                              <tr>
                                <td class="text-center"><?php echo e($key+1); ?></td>
                                <td class="text-center"><?php echo e($row->scope); ?></td>
                                <td class="text-center"><?php echo e($row->sort); ?></td>
                                <td class="text-center"><?php echo e(explode(' ',$row->created_at)[0]); ?></td>
                                <td class="text-center"><?php echo App\Scope::displayStatus($row->id); ?></td>
                                <td class="text-center">
                                  <?php echo Form::Open(['url'=>'scopes/destroy/'.$row->id]); ?>

                                    <a href="<?php echo e(url('scopes/edit/'.$row->id)); ?>" class="btn btn-primary">
                                     <i class="fa fa-edit"> Edit</i>
                                    </a>
                                   <button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                  <?php echo Form::Close(); ?>

                                </td>
                              </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                          </table>
                        <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                   <?php echo $data->render(); ?>

                </div>
              <?php endif; ?>
              

          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsCode'); ?>
  <?php echo $__env->make('system.scope.jsCode', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>