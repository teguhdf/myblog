<?php $__env->startSection('content'); ?>

<div class="container"><br>
    <div class="row">
        <div class="col-md-9">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-item">
                    <div class="post-inner">
                        <div class="post-head clearfix">
                            <div class="col-md-4">
                                <a href=""><img src="<?php echo e(asset('images/'.$post->image)); ?>" alt="" width="100%" height="auto"></a>
                            </div> 
                            <div class="col-md-8">
                                <div class="detail">
                                    <h3 class="handle"><a href="posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h3>
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
       
        <?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       
    </div>
    <!-- FOOTER -->
    <div class="text-center">
        <?php echo e($posts->links()); ?>

 </div>
    <!-- END FOOTER -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>