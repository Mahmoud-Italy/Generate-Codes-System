<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Add New</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    <?php echo Form::Open(); ?>


                         <div class="form-group scope_div">
                            <label>Service Name</label>
                            <input type="text" class="form-control" name="name" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Digit</label>
                            <input type="text" class="form-control" name="digit" required>
                          </div>

                          <div class="form-group scope_div">
                            <label>Sort</label>
                            <input type="text" class="form-control scope_sort" name="sort" required value="<?php echo e($nextSort); ?>">
                          </div>

                          <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-check-circle"></i> Submit</button>
                            <a href="<?php echo e(url('/')); ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a>
                          </div>

                   <?php echo Form::Close(); ?>

               
               </div>
             </div>
          </div>
      </div>
  </div>