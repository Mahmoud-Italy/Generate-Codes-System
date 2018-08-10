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

              <?php echo $__env->make('system.generate.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           
           <?php if(count($data)): ?>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <strong>All Codes ( <?php echo e(App\Generate::where('comp_id',Auth::user()->id)->count()); ?> )</strong>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-12">
                          <table class="table table-responsive-sm table-bordered">
                            <thead>
                              <th class="text-center">#</th>
                              <th class="text-center">Generate Code</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Notes</th>
                              <th class="text-center">Tools</th>
                            </thead>
                            <tbody>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr style="background: #515151;color:#fff">
                                      <th colspan="5" class="text-center">
                                        <?php 
                                           if($group->at_date == date('Y-m-d')) $res = 'Today';
                                           else $res = $group->at_date;
                                         ?>
                                        <?php echo e($res); ?>

                                    </th>
                                    </tr>
                        <?php $__currentLoopData = App\Generate::where('comp_id',Auth::user()->id)->where('at_date',$group->at_date)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                <td class="text-center"><?php echo e($key+1); ?></td>
                                <td class="text-center">
                                  <?php echo e(str_replace(array(',','"', '"', ']', '['),' ', $row->scope_arr)); ?></td>
                                <td class="text-center"><?php echo e($row->price); ?></td>
                                <td class="text-center"><?php echo e($row->notes); ?></td>
                                <td class="text-center">
                                  <?php echo Form::Open(['url'=>'generate/destroy/'.$row->id]); ?>

                                   <button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                  <?php echo Form::Close(); ?>

                                </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                          </table>
                      </div>
                    </div>

                    </div>
                  </div>
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