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
                         <h1> Homework</h1>
                        </div>

                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/homework/homework/add')}}" class="btn btn-primary">Add New Assignment</a>
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
                                
                                
                            </div>




                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Homework List</h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                 <th>HomeworkDate</th>
                                                 <th>SubmissionDate</th>
                                                 <th>Document</th>
                                                 
                                                 <th>CreatedAt</th>
                                                 <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->class_name}}</td>
                                                <td>{{$value->subject_name}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->homework_date))}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->submission_date))}}</td>
                                                <td>
                                                    @if(!empty($value->getDocument()))
                                                    <a href="{{$value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                                <td>
                                                        <a href="{{url('admin/homework/homework/edit/' . $value->id)}}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{url('admin/homework/homework/delete/' . $value->id)}}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>

                                            </tr>
                                            @empty
                                               <tr>
                                                <td colspan="100%">Record not found</td>
                                               </tr>
                                            @endforelse
                                            
                                            

                                        </tbody>
                                    </table>
                                    <div style="padding:10px; float: right;">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!} </div>
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