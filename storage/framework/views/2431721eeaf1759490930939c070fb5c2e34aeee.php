<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/tickets">Tickets</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php echo Form::open(['url'=> 'user/support','method' =>'post', 'files'=>true]); ?>

            <?php echo e(csrf_field()); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Answer</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control" name="ticket_id">
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($ticket->id); ?>><?php echo e($ticket->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" type="text" rows="10" cols="5" placeholder="Reply" name="message"
                                          <?php if($errors->has('message')): ?>
                                          style="border-color: red"
                                        <?php endif; ?>
                                ></textarea>
                                <?php if($errors->has('message')): ?>
                                    <span style="color: red"><?php echo e($errors->first('message')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose file</label>
                                <div class="input-group">
                                    <input type="file" name="upload" id="file"
                                           <?php if($errors->has('upload')): ?>
                                           style="color: red"
                                            <?php endif; ?>
                                    >
                                    <?php if($errors->has('upload')): ?>
                                        <span style="color: red"><?php echo e($errors->first('upload')); ?></span>
                                    <?php endif; ?>

                                </div>
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
            <!-- /.box-body -->
        </div>
        <?php echo Form::close(); ?>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>