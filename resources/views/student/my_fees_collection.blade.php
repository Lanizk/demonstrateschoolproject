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
                            <h1> Fees Collection</h1>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" id="AddFees">Add Fees</button>
                        </div>
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
                                            @forelse($getFees as $value)
                                                <tr>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="AddFeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="col-form-label">Class Name:
                                    {{$getStudent->class_name}}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Total Amount:
                                    Sh{{ number_format($getStudent->amount, 2)}}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Paid
                                    Amount:Sh{{ number_format($paid_amount, 2)}}</label>
                            </div>

                            <div class="form-group">
                                @php
                                    $RemainingAmount = $getStudent->amount - $paid_amount;
                                @endphp
                                <label class="col-form-label">Remaining Amount:Sh
                                    {{number_format($RemainingAmount, 2)}}</label>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Amount:<span style="color:red;">*</span></label>
                                <input type="number" class="form-control" name="amount">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">PaymentType:<span style="color:red;">*</span></label>
                                <select class="form-control" name="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="Mpesa">Mpesa</option>
                                    <option value="NationalBank">National Bank</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Remark:</label>
                                <textarea class="form-control" name="remark"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>


    <script src="/../../plugins/jquery/jquery.min.js"></script>
    <script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/../../dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        $('#AddFees').click(function () {
            $('#AddFeesModal').modal('show');
        });
    </script>
</body>

</html>