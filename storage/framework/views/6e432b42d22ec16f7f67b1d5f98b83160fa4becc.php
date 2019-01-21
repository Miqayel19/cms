<?php $__env->startSection('content'); ?>

    <section class="content-header" style="padding:7px 15px 0 15px">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="dashboard">Dashboard</a></li>
        </ol>
    </section>
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dashboard
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th style="width: 15%">Name</th>
                                        <th style="width: 20%">Surname</th>
                                        <th style="width: 15%">Phone</th>
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 15%">Faculties</th>
                                        <th style="width: 15%">Groups</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th><input class="form-control search_ajax" placeholder="search by name"
                                                   name="search_name" id="search_name"></th>
                                        <th><input class="form-control search_ajax" placeholder="search by surname"
                                                   name="search_surname" id="search_surname"></th>
                                        <th><input class="form-control search_ajax" placeholder="search by phone"
                                                   name="search_phone" id="search_phone"></th>
                                        <th><input class="form-control search_ajax" placeholder="search by email"
                                                   name="search_email" id="search_email"></th>
                                        <th>
                                            <select class="form-control fac_val" id="search_fac">
                                                <option value="<?php echo e(null); ?>">All</option>
                                                <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </th>
                                        <th>
                                            <select class="form-control search_group">
                                                <option>All</option>
                                            </select>
                                        </th>
                                    </tr>
                                    <tbody class="search">
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($student->name); ?></td>
                                            <td><?php echo e($student->surname); ?></td>
                                            <td><?php echo e($student->phone); ?></td>
                                            <td><?php echo e($student->email); ?></td>
                                            <td>
                                                <?php if($student->faculty): ?>
                                                    <?php echo e($student->faculty->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($student->faculty): ?>
                                                    <?php echo e($student->group->name); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $(document).on('keyup','.search_ajax', function () {
                var search_name = $('#search_name').val();
                var search_surname = $('#search_surname').val();
                var search_phone = $('#search_phone').val();
                var search_email = $('#search_email').val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/search-by-ajax',
                    data: {
                        search_name: search_name,
                        search_surname: search_surname,
                        search_phone: search_phone,
                        search_email: search_email
                    },
                    success: function (data) {
                        $(".search").html(data);
                    }
                });

            })

            function SearchFacultyByAjax() {
                var search_faculty = $('.fac_val').val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/search-by-ajax',
                    data: {
                        search_fac: search_faculty,
                    },
                    success: function (data) {

                        $(".search").html(data);
                    }
                });

            }

            $(document).on('change', '.fac_val', function () {
                SearchFacultyByAjax();
                var id = $(this).val();
                $.ajax({
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/faculties/' + id + '/groups/json',
                    success: function (data) {
                        $('.search_group').html(data);
                    }
                });
            })
            $(document).on('change', '.search_group', function () {
                var group_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/search-by-ajax',
                    data: {id: group_id},
                    success: function (data) {
                        $('.search').html(data);
                    }
                });
            })

        })

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>