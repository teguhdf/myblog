<?php $__env->startSection('title', "$posts->title"); ?>

<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="post-item">
                <div class="post-inner">
                    <div class="post-head clearfix">
                        <div class="col-md-12">
                            <div class="detail">
                                <h2 class="handle"><?php echo e($posts->title); ?></h2>
                                <div class="post-meta">
                                    <div class="asker-meta">
                                        <span><?php echo e(date('j F Y', strtotime($posts->created_at))); ?></span>
                                        <span>by</span>
                                        <span><a href="#">Admin</a></span>
                                    </div>
                                    <div class="share">
                                        <label for="">Share</label>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-reddit"></i>
                                    </div>
                                    <div class="tags">
                                        <?php $__currentLoopData = $posts->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="label label-default"># <?php echo e($tag->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="kategori">
                                        <div class="label label-success"><?php echo e($posts->category->name); ?></div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="avatar_show"><a href=""><img src="<?php echo e(asset('images/'.$posts->image)); ?>"></a></div>
                            <br>
                            <div class="post-content">
                                <p><?php echo $posts->content; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="editdelete">
                <a href="<?php echo e(route('posts.edit', $posts->id)); ?>" class="btn btn-block btn-success">Edit</a><br>
                <form action="" method="post">
                    <input type="submit" value="Hapus" class="btn btn-block btn-danger">
                </form>
            </div>
        </div>
        <?php echo $__env->make('includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>