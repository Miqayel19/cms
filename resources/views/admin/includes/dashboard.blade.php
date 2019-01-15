@extends('admin.app')

@section('content')

    <section class="content-header">
        <!-- /.row -->
        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
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
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Faculties</th>
                                        <th>Groups</th>
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
                                                <option>All</option>
                                                @foreach($faculties as $faculty)
                                                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th>
                                            <select class="form-control search_group">
                                                <option>All</option>
                                            </select>
                                        </th>
                                    </tr>
                                    <tbody class="search">
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->surname}}</td>
                                            <td>{{$student->phone}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->faculty->name}}</td>
                                            <td>{{$student->group->name}}</td>
                                        </tr>
                                    @endforeach
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
            $('.search_ajax').on('keyup', function () {
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
                    url: '/api/faculties/'+id+'/groups/json',
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

@endsection
