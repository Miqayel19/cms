<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/users">Users</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php echo Form::open(['url'=> '/admin/users','files' => true, 'enctype'=>'multipart/form-data']); ?>

            <?php echo e(csrf_field()); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">User Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="User name" name="name"
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
                                <input class="form-control" type="text" placeholder="User surname" name="surname"
                                       <?php if($errors->has('surname')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('surname')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('surname')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Father name</label>
                                <input class="form-control" type="text" placeholder="User father name" name="fathername"
                                       <?php if($errors->has('fathername')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('fathername')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('fathername')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Please enter the phone number +374XXXXXX " name="phone"
                                       <?php if($errors->has('phone')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('phone')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('phone')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="User city" name="city"
                                       <?php if($errors->has('city')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('city')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('city')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="User email" name="email"

                                       <?php if($errors->has('email')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('email')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="text" placeholder="User password" name="password"
                                       <?php if($errors->has('password')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('password')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('password')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input class="form-control" type="text" placeholder="User company name" name="company"

                                       <?php if($errors->has('company')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('company')): ?>
                                    <span style="color: red">
                                        <?php echo e($errors->first('company')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Choose image</label>
                                <div class="input-group">
                                    <input type="file" name="image" id="file"
                                           <?php if($errors->has('image')): ?>
                                           style="color: red"
                                            <?php endif; ?>
                                    >
                                    <p><img id="result" style="display:none;"/></p>
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
    </section>
    <?php echo Form::close(); ?>

    

        

            
            

                
                

                
                    
                
            

            
                
                    
                    
                    
                    
                
            
        

    
    <script>

        $(document).ready(function(){
            $("#file").change(function(e){
                var img = e.target.files[0];

                if(!iEdit.open(img, true, function(res){

                        $("#result").attr("src", res);

                    })){
                    alert("Whoops! That is not an image!");
                }

            });
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>