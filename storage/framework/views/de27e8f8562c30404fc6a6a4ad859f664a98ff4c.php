<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <!-- /.row -->
        <ol class="breadcrumb"  style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Students</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            <?php echo Form::open(['url'=> '/api/students/'.$student->id,'method'=> 'PUT']); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Student edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Student name" value="<?php echo e($student->name); ?>" name="name">
                                <br>
                                <label>Surname</label>
                                <input class="form-control" type="text" placeholder="Student surname" value="<?php echo e($student->surname); ?>" name="surname">
                                <br>
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Student phone" value="<?php echo e($student->phone); ?>" name="phone">
                                <br>
                                <label>Email address</label>
                                <input class="form-control" type="text" placeholder="Student email" value="<?php echo e($student->email); ?>" name="email">
                                <br>
                                <label>Faculty Name</label>
                                <select class="form-control fac_val" name="fac_id">
                                    <?php if($faculties): ?>{
                                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($faculty->id); ?>  <?php if($student->fac_id == $faculty->id): ?> selected <?php endif; ?>><?php echo e($faculty->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        }
                                    <?php endif; ?>
                                </select>
                                <br>
                                <label>Group Name</label>
                                <?php if($student->group): ?>
                                    <select class="form-control group_val" name="group_id" id =<?php echo e($student->group->fac_id); ?>>
                                        <option value=<?php echo e($student->group->id); ?> selected="selected"><?php echo e($student->group->name); ?></option>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
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

    <script>

        $(document).ready(function () {
            $(document).on('change', '.fac_val', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/students/get-info-by-ajax',
                    data: {id: id},
                    success: function (data) {

                        $('.group_val').html(data);
                    }
                });
            })
        })

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>