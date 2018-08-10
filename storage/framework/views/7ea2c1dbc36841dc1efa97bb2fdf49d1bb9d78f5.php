<?php if(count($data)): ?>
<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Preview Scope</strong>
      </div>
       <div class="card-body">
          <div class="row">
               <div class="col-sm-12 row">
                     <?php $__currentLoopData = App\Scope::where('comp_id',Auth::user()->id)->where('status',1)->orderBy('sort','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div style="width:auto;padding:10px;height:40px;border:1px solid #eee">
                          <b><?php echo e($preview->scope); ?></b>
                       </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
               </div>
             </div>
          </div>
      </div>
  </div>
<?php endif; ?>