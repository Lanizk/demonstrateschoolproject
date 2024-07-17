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
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>My Student</h1>
                        </div>
                    </div>
                    @include('_message')
                </div><!-- /.container-fluid -->
            </section>








            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Parent Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow:auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Pic</th>
                                <th>Student Name</th>
                                <th>Parent Name</th>
                                <th>Email</th>
                                <th>Admission Number</th>
                                <th>Roll Number</th>
                                <th>Class</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Caste</th>
                                <th>Religion</th>
                                <th>Mobile Number</th>
                                <th>Admission Date</th>
                                <th>Blood Group</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->id}}</td>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                            <img src="{{$value->getProfile()}}"
                                                style="height:50px;width:50px; border-radius:50px;">
                                        @endif
                                    </td>
                                    <td>{{ $value->name}} {{$value->last_name}}</td>
                                    <td>{{ $value->parent_name}} {{$value->parent_last_name}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{ $value->admission_no}}</td>
                                    <td>{{ $value->roll_number}}</td>
                                    <td>{{ $value->class_name}}</td>
                                    <td>{{ $value->gender}}</td>
                                    <td>
                                        @if (!empty($value->date_of_birth))
                                            {{date('d-m-Y', strtotime($value->date_of_birth))}}
                                        @endif
                                    </td>
                                    <td>{{ $value->caste}}</td>
                                    <td>{{ $value->religion}}</td>
                                    <td>{{ $value->mobile_number}}</td>

                                    <td>
                                        @if (!empty($value->admission_date))
                                            {{date('d-m-Y', strtotime($value->admission_date))}}
                                        @endif
                                    </td>
                                    <td>{{ $value->blood_group}}</td>
                                    <td>{{ $value->height}}</td>
                                    <td>{{ $value->weight}}</td>
                                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive'}}</td>
                                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{url('parent/studentmy/soma/' . $value->id)}}">Subject</a>
                                    </td>

                                    <!-- <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{url('parent/my_student/somo/' . $value->id)}}">Subject</a>
                                        </td> -->
                            @endforeach


                        </tbody>
                    </table>
                    <div style="padding:10px; float: right;">

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
    <!-- /.content-wrapper -->


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