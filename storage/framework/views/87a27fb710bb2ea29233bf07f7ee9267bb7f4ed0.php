<div class="col-md-3">
    <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
       <a href="<?php echo e(route('tags.index')); ?>" class="list-group-item active">
       Total <?php echo e($tags->count()); ?> Tags <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small></a>
       <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('tags.show',$tag->id)); ?>" class="list-group-item"><?php echo e($tag->name); ?><span class="badge badge-primary"><?php echo e($tag->posts()->count()); ?> Posts</span></a>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
     </div>

    <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">

      <a href="<?php echo e(route('category.index')); ?>" class="list-group-item active">Total <?php echo e($categories->count()); ?> Kategori <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small> </a>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('category.show', $category->id)); ?>" class="list-group-item"><?php echo e($category->name); ?><span class="badge badge-primary"><?php echo e($category->posts()->count()); ?> Posts</span></a>
          
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
   </div>
   <h3>Profile</h3>
   <div class="ads-img" style="border: 11px solid #eee;">
      
     <img src="../images/img-sid.jpeg" style="width: 100%; height: auto;">
    </div>
</div>