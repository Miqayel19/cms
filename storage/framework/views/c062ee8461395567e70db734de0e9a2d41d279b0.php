<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="support" active>Support</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Ticket answer</h3>
                    <div class="box-tools" style='right:0px;top:3px'>
                        <a class="input-group input-group-sm" href="<?php echo e(url('user/support/new_ticket')); ?>"
                           style="text-align: right">
                            <button type="button" name="table_search" class="btn btn-success ">Create</button>
                        </a>
                    </div>
                </div>
            </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Theme</th>
                            <th>Message</th>
                            <th>Upload</th>
                            <th>Date</th>
                            <th style="text-align: right">Action</th>
                        <?php if($support): ?>
                        <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($res->id); ?></td>
                                <td style="width:20%">
                                    <?php if($res->tickets): ?>
                                        <a href="<?php echo e(url('user/support/tickets/'.$res->id)); ?>" class="edit"><i class="fa fa-fw fa-envelope"></i>
                                            <?php echo e($res->tickets->title); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td style="width:35%"><?php echo e($res->message); ?></td>
                                <td><?php echo e($res->upload); ?></td>
                                <td><?php echo e($res->created_at); ?></td>
                                <td style="text-align: right">
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="<?php echo e($res->id); ?>" id="<?php echo e($res->id); ?>">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
        </div>
        <div class="modal modal-primary fade delete_modal" id="modal-primary" style="display: none;"></div>
    </section>
    <!-- /.content -->

    <script>

        $(document).ready(function () {
            $(document).on('click', '.delete_group', function () {
                var id = $(this).attr('id')
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/user/support/tickets/get-by-ajax',
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