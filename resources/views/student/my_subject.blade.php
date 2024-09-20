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
                            <h1>My Subjects</h1>
                        </div>





                    </div>
                    @include('_message')
                </div><!-- /.container-fluid -->
            </section>






            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Subject</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>

                                <th>Subject Name</th>
                                <th>Subject Type</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                                <tr>
                                        <td>
                                        {{$value->subject_name}}
                                        </td>
                                        <td>
                                        {{$value->subject_type}}
                                        </td>
                                </tr>

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
    <!-- AdminLTE for demo purposes -->

</body>

</html>