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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>My Account</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            @include('_message')

                            <!-- general form elements -->
                            <div class="card card-primary">
                                <form method="post" action="" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>First Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}"
                                                    name="name" required placeholder="First Name">
                                                <div style="color:red">{{$errors->first('name')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Last Name <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('last_name', $getRecord->last_name)}}"
                                                    name="last_name" required placeholder="Last Name">
                                                <div style="color:red">{{$errors->first('last_name')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Gender <span style="color:red;">*</span></label>
                                                <select class="form-control" required name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option {{(old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="male">
                                                        Male
                                                    </option>
                                                    <option {{(old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}}
                                                        value="female">
                                                        Female</option>
                                                    <option {{(old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}}
                                                        value="other">
                                                        Other</option>
                                                </select>
                                                <div style="color:red">{{$errors->first('gender')}}</div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Occupation<span style="color:red;"></span></label>
                                                <input type="text" class="form-control" value="{{old('occupation', $getRecord->occupation)}}"
                                                    name="occupation" placeholder="occuption">
                                                <div style="color:red">{{$errors->first('occupation')}}</div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Mobile Number<span style="color:red;"></span></label>
                                                <input type="text" class="form-control" value="{{old('mobile_number', $getRecord->mobile_number)}}"
                                                    name="mobile_number" placeholder="Mobile Number">
                                                <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Address<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('address', $getRecord->address)}}"
                                                    name="address" placeholder="Address">
                                                <div style="color:red">{{$errors->first('address')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Profile Pic<span style="color:red;"></span></label>
                                                <input type="file" class="form-control" 
                                                    name="profile_pic" placeholder="Profile Pic">
                                                <div style="color:red">{{$errors->first('profile_pic')}}</div>
                                                @if(!empty($getRecord->getProfile()))
                                                <img src="{{$getRecord->getProfile()}}" style="width:auto;height:50px;">
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Status <span style="color:red;">*</span></label>
                                                <select class="form-control" required name="status">
                                                    <option value="">Select Status</option>
                                                    <option {{(old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0">Active
                                                    </option>
                                                    <option {{(old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1">Inactive
                                                    </option>

                                                </select>
                                                <div style="color:red">{{$errors->first('status')}}</div>
                                            </div>



                                        </div>
                                        <div class="form-group">
                                            <label> Email<span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" value="{{old('email', $getRecord->email)}}"
                                                name="email" required placeholder="Email">
                                            <div style="color:red">{{$errors->first('email')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label> Password<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" name="password"
                                                placeholder="Password">
                                            <div style="color:red">{{$errors->first('password')}}</div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->



                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
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