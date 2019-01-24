<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">

        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/users">Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php echo Form::open(['url'=> 'admin/users/'.$user->id,'method'=> 'PUT','files' => true, 'enctype'=>'multipart/form-data']); ?>

            <?php echo e(csrf_field()); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">User Edit</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="<?php echo e($user->name); ?>" name="name"
                                <?php if($errors->has('name')): ?>
                                    style="border-color: red"
                                <?php endif; ?>
                                >
                                <?php if($errors->has('name')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('name')); ?>

                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Surname</label>
                                <input class="form-control" type="text" value="<?php echo e($user->surname); ?>" name="surname"
                                       <?php if($errors->has('surname')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('surname')): ?>
                                    <span style="color: red"><?php echo e($errors->first('surname')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Father name</label>
                                <input class="form-control" type="text" value="<?php echo e($user->fathername); ?>" name="fathername"
                                       <?php if($errors->has('fathername')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('fathername')): ?>
                                    <span style="color: red"><?php echo e($errors->first('fathername')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" value="<?php echo e($user->phone); ?>" name="phone"

                                       <?php if($errors->has('phone')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('phone')): ?>
                                    <span style="color: red"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" type="text" value="<?php echo e($user->city); ?>" name="city"
                                       <?php if($errors->has('city')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('city')): ?>
                                    <span style="color: red"><?php echo e($errors->first('city')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo e($user->email); ?>" name="email"
                                       <?php if($errors->has('email')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>>
                                <?php if($errors->has('email')): ?>
                                    <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" type="text" value="<?php echo e($user->company); ?>" name="company"

                                       <?php if($errors->has('company')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('company')): ?>
                                    <span style="color: red"><?php echo e($errors->first('company')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose image</label>
                                <div class="input-group">
                                    <input id="image" type="file" name="image" value="<?php echo e($user->image); ?>"

                                           <?php if($errors->has('image')): ?>
                                           style="color: red"
                                            <?php endif; ?>
                                    >
                                    <input type="hidden" name="x1" value=""/>
                                    <input type="hidden" name="y1" value=""/>
                                    <input type="hidden" name="w" value=""/>
                                    <input type="hidden" name="h" value=""/><br><br>
                                    <p><img id="previewimage" style="display:none;"/></p>
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
        <?php echo Form::close(); ?>

            <!-- /.box-body -->
        </div>
    </section>

    <script>

        jQuery(function ($) {

            var p = $("#previewimage");
            $("body").on("change", "#image", function () {

                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.getElementById("image").files[0]);

                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                };
            });

            $('#previewimage').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);
                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>