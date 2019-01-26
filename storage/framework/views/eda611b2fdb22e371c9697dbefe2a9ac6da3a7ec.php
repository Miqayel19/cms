<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="users"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="users" active>Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-responsive table-striped ">
                        <tr>
                            <th>ID</th>
                            <th>Header</th>
                            <th>Summary</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User</th>
                            <th>Date</th>
                        </tr>
                        <?php if($new): ?>
                            <tr>
                                <td><?php echo e($new->id); ?></td>
                                <td><?php echo e($new->header); ?></td>
                                <td><?php echo e($new->summary); ?></td>
                                <td><?php echo e($new->description); ?></td>
                                <td><?php echo e($new->image); ?></td>
                                <td>
                                    <?php if($new->user): ?>
                                        <?php echo e($new->user->name); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($new->created_at); ?></td>
                            </tr>
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
                    url: '/api/groups/get-by-ajax',
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