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
                            <h1>Parent Student List ({{$getParent->name}}{{$getParent->last_name}})</h1>
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
                                <h3 class="card-title">Search Parent
                            </div>
                            <form method="get" action="">

                                <div class="card-body">
                                    <div class="row">


                                        <div class="form-group col-md-2">
                                            <label>Student ID</label>
                                            <input type="text" class="form-control" value="{{Request::get('id')}}"
                                                name="id" placeholder="Student ID">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{Request::get('name')}}"
                                                name="name" placeholder="Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control"
                                                value="{{Request::get('last_name')}}" name="last_name"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{Request::get('email')}}"
                                                name="email" placeholder="Name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 31px;">Search</button>

                                            <a href="{{url('admin/mwana/' . $parent_id)}}" class="btn btn-success"
                                                style="margin-top: 31px;">Clear</a>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                            </form>
                        </div>

@if(!empty($getSearchStudent))
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow:auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ProfilePic</th>
                                            <th>StudentName</th>
                                            <th>Email</th>
                                            <th>ParentName</th>
                                            <th>CreatedDate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($getSearchStudent as $value)
                                                <tr>
                                                    <td>{{ $value->id}}</td>
                                                    <td>
                                                        @if(!empty($value->getProfile()))
                                                            <img src="{{$value->getProfile()}}"
                                                                style="height:50px;width:50px; border-radius:50px;">
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->name}} {{$value->last_name}}</td>
                                                    <td>{{ $value->email}}</td>
                                                    <td>{{ $value->parent_name}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                                    <td style="min-width: 250px;">
                                                        <a href="{{url('admin/parent/assign_student_parent/' . $value->id.'/'.$parent_id)}}"
                                                            class="btn btn-primary btn-sm">Add Student To Parent</a>
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach


                                    </tbody>
                                </table>
                                <div style="padding:10px; float: right;">

                                </div>
                              
                            </div>
                            
                        </div>
@endif

                        
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
                                            <th>ProfilePic</th>
                                            <th>StudentName</th>
                                            <th>Email</th>
                                            <th>ParentName</th>
                                            <th>CreatedDate</th>
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
                                                    <td>{{ $value->email}}</td>
                                                    <td>{{ $value->parent_name}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                                    <td style="min-width: 250px;">
                                                        <a href="{{url('admin/parent/assign_student_parent_delete/' . $value->id)}}"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                       
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

</body>

</html>