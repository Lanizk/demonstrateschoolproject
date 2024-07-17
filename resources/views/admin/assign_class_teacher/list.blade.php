<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{!empty($header_title) ? $header_title : ''}}-School </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        @include('layout.header');

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Assign Class Teacher ({{ $getRecord->total()}})</h1>
                        </div>

                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/assign_class_teacher/add')}}" class="btn btn-primary">Add new Assign
                                Class Teacher
                                Class</a>
                        </div>



                    </div>
                    @include('_message')
                </div><!-- /.container-fluid -->
            </section>




            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Search Assign Class Teacher
                                </div>
                                <form method="get" action="">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Class Name</label>
                                                <input type="text" class="form-control" value="{{Request::get('class_name')}}"
                                                    name="class_name" placeholder="Class Name">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Teacher Name</label>
                                                <input type="text" class="form-control" value="{{Request::get('teacher_name')}}"
                                                    name="teacher_name" placeholder="Teacher Name">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                   <option value="">Status</option>
                                                    <option {{(Request::get('status')==100) ?'selected':''}} value="100">Active</option>
                                                    <option  {{(Request::get('status')==1) ?'selected':''}} value="1">Inactive</option>
                                                </select>
                                               
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                <label>Date</label>
                                                <input type="Date" class="form-control"
                                                    value="{{Request::get('date')}}" name="date" placeholder="Date">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary"
                                                    style="margin-top: 30px;" type="submit">Search</button>
                                                <a href="{{url('admin/assign_class_teacher/list')}}" class="btn btn-success"
                                                    style="margin-top: 30px;">Reset</a>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                </form>
                            </div>




            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assign Class Teacher List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow:auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ClassName</th>
                                <th>TeacherName</th>
                                <th>Status</th>
                                <th>CreatedBy</th>
                                <th>CreatedDate</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($getRecord as $value)
                                <tr>
                                    <td> {{$value->id}}</td>
                                    <td> {{$value->class_name}}</td>
                                    <td> {{$value->teacher_name}}</td>
                                    <td>
                                        @if($value->status == 0)
                                            Active
                                        @else
                                            Inactive
                                        @endif

                                    </td>
                                    <td> {{$value->created_by_name}}</td>
                                    <td> {{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    </td>
                                    <td>
                                    <td style="min-width: 350px;">
                                        <div class="button-container">
                                            <a href="{{url('admin/assign_class_teacher/' . $value->id)}}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{url('/admin/editalone/' . $value->id)}}" class="btn btn-primary">Edit
                                                Single</a>
                                            <a href="{{url('/admin/assign_class_teacher/delete/' . $value->id)}}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div style="padding:10px; float: right;">
                        <div style="padding:10px; float: right;">
                            {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}





                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>