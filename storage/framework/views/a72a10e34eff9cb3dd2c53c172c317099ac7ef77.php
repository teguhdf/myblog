<?php $__env->startSection('title'," Category Index"); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-bottom:30px">
        <div class="text-center"><h2>All Category <small>(<?php echo e($categories->total()); ?>)</small></h2></div>
        <hr>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h4><a href="<?php echo e(route('category.show',$category->id)); ?>"><?php echo e($category->name); ?></a></h4>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i><?php echo e($category->created_at->diffforHumans()); ?></small></p>
            <div style="border-bottom:1px solid #099; margin-bottom: 11px">
                <p><?php echo e($category->posts->count()); ?> <i class="fa fa-list-alt"></i> POST</p>
            </div>
           
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="text-center">
            <?php echo $categories->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>