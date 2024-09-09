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
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Fees Report</h1>
                        </div>
                        
                        <!-- <div class="col-sm-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" id="AddFees">Add Fees</button>
                        </div> -->
                    </div>
                    @include('_message')
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Payment Detail</h3>
                                </div>
                                <div class="card-body p-0" style="overflow: scroll;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Student Name</th>
                                                <th>Mobile No</th>
                                                <th>ClassName</th>
                                                <th>TotalAmount</th>
                                                <th>PaidAmount</th>
                                                <th>RemainingAmount</th>
                                                <th>PaymentType</th>
                                                <th>Remark</th>
                                                <th>CreatedBy</th>
                                                <th>CreatedDate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        
                                        </tbody>
                                    </table>
                                    <div style="padding:10px; float: right;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
     

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>


    <script src="/../../plugins/jquery/jquery.min.js"></script>
    <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/../../dist/js/adminlte.min.js"></script>
   
   
</body>

</html>