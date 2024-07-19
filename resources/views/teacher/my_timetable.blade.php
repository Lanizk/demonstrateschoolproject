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
    <link rel="stylesheet" href="/../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layout.header');
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    @include('_message')
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1>My Timetable</h1>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">






                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$getClass->name}}-{{$getSubject->name}}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Week</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th> Room Number</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($getRecord as $valueW)
                                                <tr>
                                                    <td>{{$valueW['week_name']}}</td>
                                                    <td>{{!empty($valueW['start_time']) ? date('h:i A', strtotime($valueW['start_time'])) : ''}}
                                                    </td>
                                                    <td>{{!empty($valueW['end_time']) ? date('h:i A', strtotime($valueW['end_time'])) : ''}}
                                                    </td>
                                                    <td>{{$valueW['room_number']}}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>





                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>


                <!-- /.card -->
                <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
    <script type="text/javascript">
        $('.getClass').change(function () {
            var class_id = $(this).val();
            $.ajax({
                url: "{{url('/admin/class_timetable/get_subject')}}",
                type: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function (response) {
                    $('.getSubject').html(response.html);

                },
            });
        });
    </script>
</body>

</html>