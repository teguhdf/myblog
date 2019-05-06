<?php $__env->startSection('content'); ?>
<br>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="well">
      <form action="<?php echo e(route('posts.update',$posts->id)); ?>" method="post" enctype="multipart/form-data">
        <div class="text-center">
          <h4>Buat Post</h4>
        </div>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>

        <div class="form-group">
          <label for="">Title</label>
          <input type="text" class="form-control" name="title" value="<?php echo e($posts->title); ?>">
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="" class="disable selected">Pilih Kategori</option>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php if ($posts->category_id == $category->id) {echo "selected";}?>><?php echo e($category->name); ?></option>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
          <label for="tags">Tags</label>
        <select name="tags[]" id="tags" multiple="multiple" class="form-control selectpicker">
          <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="image">Pilih Gambar</label>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <img src="<?php echo e(asset('images/'.$posts->image)); ?>" alt="" width="100%" height="200px">
      </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content" class="form-control" placeholder="Tulis disini..."><?php echo e($posts->content); ?></textarea>
        </div>
        <button type="submit" name="button" class="btn btn-success">Save</button>
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> 
    $(".selectpicker").selectpicker().val(<?php echo json_encode($posts->tags()->allRelatedIds()); ?>).trigger('change');

    CKEDITOR.replace( 'content' );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>