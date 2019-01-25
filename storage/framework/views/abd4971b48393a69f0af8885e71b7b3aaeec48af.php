<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="../news">News</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php echo Form::open(['url'=> 'user/news']); ?>

            <?php echo e(csrf_field()); ?>

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">News Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Header</label>
                                <input class="form-control" type="text" placeholder="News title" name="header"
                                       <?php if($errors->has('header')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('header')): ?>
                                    <span style="color: red"><?php echo e($errors->first('header')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Summary</label>
                                <input class="form-control" type="text" placeholder="news summary" name="summary"
                                       <?php if($errors->has('summary')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>>
                                <?php if($errors->has('summary')): ?>
                                    <span style="color: red"><?php echo e($errors->first('summary')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" type="text" placeholder="Description" name="description"
                                       <?php if($errors->has('description')): ?>
                                       style="border-color: red"
                                        <?php endif; ?>
                                >
                                <?php if($errors->has('description')): ?>
                                    <span style="color: red"><?php echo e($errors->first('description')); ?></span>
                                <?php endif; ?>
                                </textarea>
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
                                    <img id="result" style="display: block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align: right">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="window.history.back()">
                                    Cancel
                                </button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
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