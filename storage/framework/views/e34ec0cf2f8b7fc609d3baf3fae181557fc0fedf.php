<div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">
                <i class="nav-icon icon-drop"></i><?php echo e(Auth::user()->name); ?> Dashboard</a>
            </li>
            <li class="nav-title">Scopes</li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('scopes')); ?>">
                <i class="nav-icon icon-drop"></i> Create Scope</a>
            </li>
          
          <?php if(App\Scope::where('comp_id',Auth::user()->id)->where('category',0)->where('status',1)->count() > 0): ?>
            <li class="nav-title">Services</li>
          
          <?php $__currentLoopData = App\Scope::where('comp_id',Auth::user()->id)->where('category',0)->where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('services/'.$sidebar->id)); ?>">
                <i class="nav-icon icon-pencil"></i> <?php echo e($sidebar->scope); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li class="nav-title">Publish Code</li>
              <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('generate')); ?>">
                <i class="nav-icon icon-pencil"></i> Generate Code</a>
            </li>
          <?php endif; ?>
           
          </ul>
        </nav>
         <li>
      </div>