<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb"  style="float:left;position:static">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="faculties" active>Faculties</a></li>
        </ol>
    </section>
        <section class="content">
            <div class="row">
            <?php echo Form::open(['url'=> '/api/faculties/'.$faculty->id,'method'=> 'PUT']); ?>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Faculty edit</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" placeholder="Faculty name"
                                           value="<?php echo e($faculty->name); ?>" name="name">
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
                </div>
            </div>
        </section>
                <!-- /.box-body -->
            <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>