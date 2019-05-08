<?php $__env->startSection('title', 'Hasil Pencarian'); ?>
    

<?php $__env->startSection('content'); ?>

<?php if(count($posts)>0): ?>

<div class="container">
    <div class="text-center">
        <h1>Hasil Pencarian</h1>
    </div>
    <?php $__currentLoopData = $posts->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-item">
            <div class="post-inner">
                <div class="post-head clearfix">
                    <div class="col-md-4">
                        <a href=""><img src="<?php echo e(asset('images/'.$post->image)); ?>" alt="" width="100%" height="auto"></a>
                    </div> 
                    <div class="col-md-8">
                        <div class="detail">
                            <h3 class="handle"><a href="<?php echo e(route('posts.show',$post->id)); ?>"><?php echo e($post->title); ?></a></h3>
                        </div>
                        <div class="post-meta">
                            <div>
                                <span><?php echo e(date('j F Y', strtotime($post->created_at))); ?></span>|
                                <span>by</span>
                                <span><a href="">Admin</a></span>
                            </div>
                        </div>
                                <span class="share">
                                    <i class="fa fa-facebook"></i>
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-redit"></i>
                                </span>
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-success"><?php echo e($tag->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="content" style="margin-top:12px">
                                <?php echo str_limit($post->content,200); ?>

                            </div>
                    </div>     
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php else: ?>

<div class="container">
    <div class="text-center">
        <h3>No result</h3>
    </div>
</div>
    
<?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>