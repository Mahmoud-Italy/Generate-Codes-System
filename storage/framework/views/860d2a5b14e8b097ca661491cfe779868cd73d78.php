<div class="col-sm-12">
   <div class="card">
      <div class="card-header">
        <strong>Create Scope</strong>
      </div>

       <div class="card-body">
          <div class="row">
               <div class="col-sm-6">
                    
                    <?php echo Form::Open(); ?>

                         <div class="form-group">
                            <label>Category</label>
                            <select class="form-control scope_category" name="category">
                              <option value="0">Digit</option>
                              <option value="1">Dashed</option>
                              <option value="2">Incremental</option>
                            </select>
                          </div>

                         <div class="form-group scope_div">
                            <label class="lbl-scope-name">Scope Name</label>
                            <input type="text" class="form-control scope_name" name="scope" required>
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