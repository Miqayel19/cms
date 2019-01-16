<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Groups</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php echo Form::open(['url'=> '/api/groups/'.$group->id,'method'=> 'PUT']); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Group edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Group name" value="<?php echo e($group->name); ?>" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Faculty Name</label>
                                    <select class="form-control" name="fac_id">
                                        <?php if($faculties): ?>
                                            <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($faculty->id); ?> <?php if($group->fac_id == $faculty->id): ?> selected <?php endif; ?>><?php echo e($faculty->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                        <div class="row" style="text-align: right">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-danger" type="button" onclick="window.history.back()">Cancel</button>
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.box-body -->
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>