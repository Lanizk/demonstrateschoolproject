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
                    @include('_message')
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1>My Exam Timetable</h1>
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





                            @foreach($getRecord as $value)
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$value['name']}}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SubjectName</th>

                                                    <th>Date</th>
                                                    <th>StartTime</th>
                                                    <th>EndTime</th>
                                                    <th>RoomNumber</th>
                                                    <th>FullMarks</th>
                                                    <th>Passing Marks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($value['exam'] as $valueS)
                                                    <tr>
                                                        <td>{{$valueS['subject_name']}}</td>

                                                        <td>{{date('d-m-Y', strtotime($valueS['exam_date']))}}</td>
                                                        <td>{{date('h:i A', strtotime($valueS['start_time']))}}</td>
                                                        <td>{{date('h:i A', strtotime($valueS['end_time']))}}</td>
                                                        <td>{{$valueS['room_number']}}</td>
                                                        <td>{{$valueS['full_marks']}}</td>
                                                        <td>{{$valueS['passing_mark']}}</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>





                                    </div>
                                </div>
                            @endforeach

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