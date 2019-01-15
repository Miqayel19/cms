<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">

        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#" active>Faculties</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Faculties</h3>
                        <div class="box-tools" style='right:0px;top:3px'>
                            <a class="input-group input-group-sm" href="<?php echo e(url('api/faculties/create')); ?>"
                               style="text-align: right">
                                <button type="button" name="table_search" class="btn btn-success ">Create</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($faculty->id); ?></td>
                                <td><?php echo e($faculty->name); ?></td>
                                <td style="text-align: right">
                                    <a href="<?php echo e(url('api/faculties/'.$faculty->id.'/edit')); ?>" class="edit"><i
                                                class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_fac" data-toggle="modal"
                                       data-target="#modal-primary" data-id="<?php echo e($faculty->id); ?>"
                                       id="<?php echo e($faculty->id); ?>">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="modal modal-primary fade delete_modal" id="modal-primary" style="display: none;"></div>
    </section>
    <!-- /.content -->

    <script>

        $(document).ready(function () {
            $(document).on('click', '.delete_fac', function () {
                var id = $(this).attr('id')
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/faculties/get-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.delete_modal').html(data);
                    }
                });
            })
        })

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>