<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
       <div class="animated fadeIn">
           <div class="row">

<div class="col-sm-12">
<?php if(Session::has('success')): ?>
 <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
<?php elseif(Session::has('error')): ?>
 <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
<?php endif; ?>         
</div>        

      
<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Update</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    <?php echo Form::Open(); ?>


                         <div class="form-group scope_div">
                            <label>Service Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($row->name); ?>" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Digit</label>
                            <input type="text" class="form-control" name="digit" value="<?php echo e($row->digit); ?>" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Sort</label>
                            <input type="text" class="form-control scope_sort" name="sort" value="<?php echo e($row->sort); ?>" required>
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
                            <a href="<?php echo e(url('services/'.$row->scope_id)); ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
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