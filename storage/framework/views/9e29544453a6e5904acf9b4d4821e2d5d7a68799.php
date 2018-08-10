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




<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Update Scope</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    <?php echo Form::Open(); ?>

                         <div class="form-group">
                            <label>Category</label>
                            <select class="form-control scope_category" name="category">
                              <option value="0" <?php if($row->category == 0): ?> selected <?php endif; ?>>Digit</option>
                              <option value="1" <?php if($row->category == 1): ?> selected <?php endif; ?>>Dashed</option>
                              <option value="2" <?php if($row->category == 2): ?> selected <?php endif; ?>>Incremental</option>
                            </select>
                          </div>

                         <div class="form-group scope_div">
                            <label>Scope Name</label>
                            <input type="text" class="form-control scope_name" name="scope" value="<?php echo e($row->scope); ?>" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Sort</label>
                            <input type="text" value="<?php echo e($row->sort); ?>" class="form-control scope_sort" name="sort" required>
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control scope_sort" name="status">
                                <option value="1" <?php if($row->status == 1): ?> selected <?php endif; ?>>Active</option>
                                <option value="0" <?php if($row->status == 0): ?> selected <?php endif; ?>>InActive</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-check-circle"></i> Update</button>
                            <a href="<?php echo e(url('scopes')); ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                          </div>

                   <?php echo Form::Close(); ?>

               
               </div>
             </div>
          </div>
      </div>
  </div>

             


          
          </div>

        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsCode'); ?>
  <?php echo $__env->make('system.scope.jsCode', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>