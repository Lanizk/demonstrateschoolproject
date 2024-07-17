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
                            <h1>Add New Teacher</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Teacher</li>
                            </ol>
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

                            <!-- general form elements -->
                            <div class="card card-primary">
                                <form method="post" action="" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>First Name<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('name')}}"
                                                    name="name" required placeholder="First Name">
                                                <div style="color:red">{{$errors->first('name')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Last Name <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('last_name')}}"
                                                    name="last_name" required placeholder="Last Name">
                                                <div style="color:red">{{$errors->first('last_name')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Gender <span style="color:red;">*</span></label>
                                                <select class="form-control" required name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option {{(old('gender') == 'Male') ? 'selected' : ''}} value="male">
                                                        Male
                                                    </option>
                                                    <option {{(old('gender') == 'Female') ? 'selected' : ''}}
                                                        value="female">
                                                        Female</option>
                                                    <option {{(old('gender') == 'Other') ? 'selected' : ''}}
                                                        value="other">
                                                        Other</option>
                                                </select>
                                                <div style="color:red">{{$errors->first('gender')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Date of Birth <span style="color:red;">*</span></label>
                                                <input type="date" class="form-control" value="{{old('date_of_birth')}}"
                                                    name="date_of_birth" required placeholder="Date of Birth">
                                                <div style="color:red">{{$errors->first('date_of_birth')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Date of Joining<span style="color:red;">*</span></label>
                                                <input type="date" class="form-control"
                                                    value="{{old('admission_date')}}" name="admission_date" required
                                                    placeholder="Date of Joining">
                                                <div style="color:red">{{$errors->first('admission_date')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Mobile Number<span style="color:red;"></span></label>
                                                <input type="text" class="form-control" value="{{old('mobile_number')}}"
                                                    name="mobile_number" placeholder="Mobile Number">
                                                <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Marital Status<span style="color:red;"></span></label>
                                                <input type="text" class="form-control" value="{{old('religion')}}"
                                                    name="marital_status" placeholder="Marital Status">
                                                <div style="color:red">{{$errors->first('religion')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Profile Pic<span style="color:red;"></span></label>
                                                <input type="file" class="form-control" value="{{old('profile_pic')}}"
                                                    name="profile_pic" placeholder="Profile Pic">
                                                <div style="color:red">{{$errors->first('profile_pic')}}</div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Current Address<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="{{old('admission_no')}}"
                                                    name="address" required placeholder="address">
                                                <div style="color:red">{{$errors->first('address')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Permanent Address <span style="color:red;"></span></label>
                                                <textarea class="form-control" name="permanent_address" required>{{old('roll_number')}}</textarea>
                                                     
                                                <div style="color:red">{{$errors->first('permanent_address')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Qualification<span style="color:red;">*</span></label>
                                                <textarea class="form-control" name="qualification" required> {{old('qualification')}}</textarea>
                                                    
                                                <div style="color:red">{{$errors->first('qualification')}}</div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Work Experience<span style="color:red;">*</span></label>
                                                <textarea class="form-control" name="work_experience" required> {{old('work_experience')}}</textarea>
                                                    
                                                <div style="color:red">{{$errors->first('work_experience')}}</div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Note<span style="color:red;"></span></label>
                                                <textarea class="form-control" name="note" required> {{old('note')}}</textarea>
                            
                                                <div style="color:red">{{$errors->first('note')}}</div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Status <span style="color:red;">*</span></label>
                                                <select class="form-control" required name="status">
                                                    <option value="">Select Status</option>
                                                    <option {{(old('status') == 0) ? 'selected' : ''}} value="0">Active
                                                    </option>
                                                    <option {{(old('status') == 1) ? 'selected' : ''}} value="1">Inactive
                                                    </option>

                                                </select>
                                                <div style="color:red">{{$errors->first('status')}}</div>
                                            </div>



                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{old('email')}}"
                                                name="email" required placeholder="Email">
                                            <div style="color:red">{{$errors->first('email')}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" required
                                                placeholder="Password">
                                            <div style="color:red">{{$errors->first('password')}}</div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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