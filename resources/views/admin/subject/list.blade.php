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
                            <h1>Unit List</h1>
                        </div>

                        <div class="col-sm-6" style=" text-align:right;">
                            <a href="{{url('admin/subject/add')}}" class="btn btn-primary">Add New Unit</a>
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
                                    <h3 class="card-title">Search Unit
                                </div>
                                <form method="get" action="">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" value="{{Request::get('name')}}"
                                                    name="name" placeholder="Name">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Unit Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option {{(Request::get('type') == 'Theory') ? 'selected' : ''}}
                                                        value="Theory">Theory</option>
                                                    <option {{(Request::get('type') == 'Practical') ? 'selected' : ''}}
                                                        value="Practical">Practical
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Date</label>
                                                <input type="Date" class="form-control"
                                                    value="{{Request::get('date')}}" name="date" placeholder="Date">

                                            </div>

                                        
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 31px;">Search</button>

                                            <a href="{{url('admin/subject/list')}}" class="btn btn-success"
                                                style="margin-top: 31px;">Clear</a>
                                        </div>
                                    </div>
</div>

                            </div>
                            <!-- /.card-body -->

                            </form>
                        </div>



                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Unit List</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Unit Name</th>
                                            <th>Unit Type</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                
                                                <td> {{$value->name}}</td>
                                                <td> {{$value->type}}</td>
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
                                                    <a href="{{url('admin/subject/' . $value->id)}}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{url('admin/subject/delete/' . $value->id)}}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div style="padding:10px; float: right;">

                                    {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}

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