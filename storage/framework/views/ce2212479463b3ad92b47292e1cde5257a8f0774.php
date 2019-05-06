<?php $__env->startSection('title','coba'); ?>
<?php $__env->startSection('content'); ?>
<br>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">+Add New Post</a></li>
    <li><a data-toggle="tab" href="#menu1">All Post</a></li>
    
  </ul>

  <div class="tab-content"><br>
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-md-8 col-md-offset-2">
          <div class="well">
            <form action="<?php echo e(route('posts.store')); ?>" method="post" enctype="multipart/form-data">
              <div class="text-center">
                <h4>Buat Post</h4>
              </div>
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="form-group">
                  <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="" class="disable selected">Pilih Kategori</option>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>  
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
                <label for="">Content</label>
                <textarea name="content" class="form-control" placeholder="Tulis disini..."></textarea>
              </div>
              <button type="submit" name="button" class="btn btn-success">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="text-center">
        <h4><b>List Post</b></h4>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>Judul Post</th>
                <th>Tanggal Edit</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
            ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><a href="<?php echo e(route('posts.show',$post->id)); ?>" target="_blank"><?php echo e($post->title); ?></a></td>
                    <td><?php echo e($post->created_at->diffforHumans()); ?></td>
                    <td><a href="<?php echo e(route('posts.edit',$post->id)); ?>" ><i class="fa fa-edit"></i></a></td>
                    <td><a href="#modalHapus" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                </tr>

                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    
    <div class="modal fade" id="modalHapus" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Post</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('delete')); ?>

                        <div class="form-group">
                            <h4>Apa anda yakin akan menghapus post <?php echo e($post->name); ?> ?</h4>
                        </div><br>
                        <button type="submit" class="btn btn-danger">Hapus</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script>
      CKEDITOR.replace( 'content' );
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>