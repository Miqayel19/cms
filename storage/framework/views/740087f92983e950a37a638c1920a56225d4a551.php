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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create User</h3>
                    <div class="box-tools" style='right:0px;top:3px'>
                        <a class="input-group input-group-sm" href="<?php echo e(url('admin/users/new-user')); ?>"
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
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Father name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Company</th>
                            <th>Image</th>
                            <th style="text-align: right">Actions</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->surname); ?></td>
                                <td><?php echo e($user->fathername); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->city); ?></td>
                                <td><?php echo e($user->company); ?></td>
                                <td><?php echo e($user->image); ?></td>
                                <td style="text-align: right">
                                    <a href="<?php echo e(url('admin/users/'.$user->id.'/edit')); ?>" class="edit"><i class="fa fa-fw fa-edit"></i></a>
                                    <a class="delete_group" data-toggle="modal" data-target="#modal-primary" data-id="<?php echo e($user->id); ?>" id="<?php echo e($user->id); ?>">
                                        <i class="fa fa-fw fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    url: '/admin/users/get-by-ajax',
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