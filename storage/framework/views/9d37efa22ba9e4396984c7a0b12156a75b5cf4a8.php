<?php $__env->startSection('title','Create Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="text-center">
            <h1>Halaman Buat Tag</h1>
        </div><hr>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <form action="<?php echo e(route('tags.store')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Buat Tag baru..">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
            <br>
            <div class="text-center">
                <h4><b>Semua Tag</b></h4>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>No</th>
                        <th>Nama Tag</th>
                        <th>Tanggal Edit</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no++); ?></td>
                            <td><?php echo e($tag->name); ?></td>
                            <td><?php echo e(date('j F Y', strtotime($tag->created_at))); ?></td>
                            <td><a href="#modalEdit" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#modalHapus" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
                        </tr>

                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" id="modalEdit" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Tag</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('tags.update', $tag->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo e($tag->name); ?>">
                        </div>
                        <input type="submit"  class="btn btn-primary" />    
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalHapus" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Hapus Tag</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('tags.destroy', $tag->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('delete')); ?>

                        <div class="form-group">
                            <h4>Apa anda yakin akan menghapus Tag <?php echo e($tag->name); ?> ?</h4>
                        </div><br>
                        <button type="submit" class="btn btn-danger">Hapus</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>