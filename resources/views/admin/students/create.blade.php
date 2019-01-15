@extends('admin.app')
@section('content')

    <section class="content-header">

        <ol class="breadcrumb" style="float:left;position:static">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Students</a></li>
        </ol>
    </section>
    <div>
        <br>
        <br>
        <div class="content">
            {!! Form::open(['url'=> '/api/students']) !!}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Student Create</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="Student name" name="name" required>
                                <br>
                                <label>Surname</label>
                                <input class="form-control" type="text" placeholder="Student surname" name="surname" required>
                                <br>
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Student phone number" name="phone" required>
                                <br>
                                <label>Email address</label>
                                <input class="form-control" type="text" placeholder="Student email" name="email" required>
                                <br>
                                <label for="groupFaculty">Choose Faculty</label>
                                <select class="form-control fac_info" name="fac_id">
                                    <option>All</option>
                                    @foreach($faculties as $faculty)
                                        <option value={{$faculty->id}}>{{$faculty->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <label for="groupFaculty">Choose Group</label>
                                <select class="form-control group_info" name="group_id">

                                </select>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
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
            {!! Form::close() !!}
        </div>
    </div>
    <script>

        $(document).ready(function () {
            $(document).on('change', '.fac_info', function () {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/api/students/get-info-by-ajax',
                    data: {id: id},
                    success: function (data) {
                        $('.group_info').html(data);
                    }
                });
            })
        })

    </script>
@endsection
