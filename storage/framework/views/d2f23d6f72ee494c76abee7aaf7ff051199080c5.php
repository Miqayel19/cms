<?php $__env->startSection('content'); ?>

    <section class="content-header">

        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Faculties</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            <?php echo Form::open(['url'=> '/api/faculties']); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Faculty Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" required placeholder="Faculty name"
                                       name="name">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align: right">
                        <div class="form-group">
                            <div class="col-md-12">
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

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>