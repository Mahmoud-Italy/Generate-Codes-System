<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Generate Code</strong>
      </div>

       <div class="card-body">
        <?php echo Form::Open(); ?>

          <div class="row">
            

              <div class="col-sm-12 row">
                    
                <?php $__currentLoopData = App\Scope::where('comp_id',Auth::user()->id)->where('status',1)->orderby('sort','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($select->category == 0): ?>
                      <div class="col-sm-3">
                         <div class="form-group">
                            <label><?php echo e($select->scope); ?></label>
                            <select class="form-control scope_category" name="scope[]">
                              <?php $__currentLoopData = App\Service::where('scope_id',$select->id)->where('status',1)->orderby('sort','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($option->digit); ?>"><?php echo e($option->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      </div>
                      <?php elseif($select->category == 1): ?>
                        <input type='hidden' name="scope[]" value="-">
                      <?php elseif($select->category == 2): ?>
                        <input type='hidden' name="scope[]" value="<?php echo e(App\Generate::getNextRnd($select->id)); ?>">
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
                
                <div class="col-md-12"><hr></div>

             <div class="col-sm-6">

                         <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" required>
                          </div>

                          <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="at_date" required value="<?php echo e(date('Y-m-d')); ?>">
                          </div>

                          <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" rows=4 name="notes"></textarea>
                          </div>

                          <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-check-circle"></i> Submit</button>
                            <a href="<?php echo e(url('/')); ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                          </div>
                
                </div>

             </div>
             <?php echo Form::Close(); ?>

          </div>
      </div>
  </div>