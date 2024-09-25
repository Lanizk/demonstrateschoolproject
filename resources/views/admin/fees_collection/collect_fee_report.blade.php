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
                         
                    <form method="get" action="">
                           <div class="card-body">
                              <div class="row">
                                 <div class="form-group col-md-2">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" placeholder="Student ID" value="{{Request::get('student_name')}}" name="student_name">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Student Last Name</label>
                                    <input type="text" class="form-control" placeholder="Student Last Name" value="{{Request::get('student_last_name')}}" name="student_last_name">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" >
                                       <option value="">Select</option>
                                       @foreach ($getClass as $class)
                                       <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}}
                                       value="{{$class->id}}">{{$class->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Created Date</label>
                                    <input type="date" class="form-control" value="{{Request::get('created_at')}}" name="created_at">
                                 </div>
                                 <div class="form-group col-md-2">
                                    <label>Payment Type</label>
                                    <select class="form-control" name="payment_type">
                                       <option value="">Select</option>
                                       <option {{(Request::get('payment_type') == 1) ? 'selected' : ''}} value="Cash">Cash</option>
                                       <option {{(Request::get('payment_type') == 1) ? 'selected' : ''}} value="Cheque">Cheque</option>
                                       <option {{(Request::get('payment_type') == 1) ? 'selected' : ''}} value="Mpesa">Mpesa</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-2">
                                    <button class="btn btn-primary"
                                       style="margin-top: 31px;">Search</button>
                                    <a href="{{url('/admin/fees/collect_fees_report')}}"
')}}"
                                       class="btn btn-success" style="margin-top: 31px;">Clear</a>
                                    
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                        </form>

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
                                                
                                                <th>ClassName</th>
                                                <th>TotalAmount</th>
                                                <th>PaidAmount</th>
                                                <th>RemainingAmount</th>
                                                <th>PaymentType</th>
                                                <th>Remark</th>
                                                <th>CreatedBy</th>
                                                <th>CreatedDate</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @forelse($getRecord as $value)
                                          <tr>
                                          <td>{{$value->id}}</td>
                                          <td>{{$value->student_name_first}} {{$value->student_name_last}}</td>
                                         
                                                    <td>{{$value->class_name}}</td>
                                                    <td>Sh {{number_format($value->total_amount, 2)}}</td>
                                                    <td>Sh {{number_format($value->paid_amount, 2)}}</td>
                                                    <td>Sh {{number_format($value->remaining_amount, 2)}}</td>
                                                    <td>{{$value->payment_type}}</td>
                                                    <td>{{$value->remark}}</td>
                                                    <td>{{$value->created_name}}</td>
                                                    <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                          </tr>
                                          @empty
                                                <tr>
                                                    <td colspan="100%">Record Not Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div style="padding:10px; float: right;">
                                    
                                    {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!} </div>
                                   
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