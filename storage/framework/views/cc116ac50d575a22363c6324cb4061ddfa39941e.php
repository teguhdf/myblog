<?php $__env->startSection('title'," Tags Index"); ?>
<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-bottom:30px">
        <div class="text-center"><h2>All Tags <small>(<?php echo e($tags->total()); ?>)</small></h2></div>
        <hr>
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h4><a href="<?php echo e(route('tags.show',$tag->id)); ?>"><?php echo e($tag->name); ?></a></h4>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i><?php echo e($tag->created_at->diffforHumans()); ?></small></p>
            <div style="border-bottom:1px solid #099; margin-bottom: 11px">
                <p><?php echo e($tag->posts->count()); ?> <i class="fa fa-list-alt"></i> POST</p>
            </div>
           
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="text-center">
            <?php echo $tags->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>