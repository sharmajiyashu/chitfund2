<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <?php include APPPATH . 'views/include/sidebar.php'; ?>  
            <?php include APPPATH . 'views/include/header.php'; ?>
            <div class="content-page">
                <div class="container-fluid">
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Payment list</h4>
                                </div>
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/Payment" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Payment</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>plan Name</th>
                                            <th>Plan Amount</th>
                                            <th>Tenure</th>
                                            <th>Start Month</th>
                                            <th>Agent Commission</th>
                                            <th>EMI</th>
                                            <th>Total Subscription</th>
                                            <th>Months Complete</th>
                                            <th>End Month</th>
                                            <th>Bid Time</th>
                                            <th>Cum Div</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value) {    ?>
                                                <tr>
                                                    <td><?php echo $i ; ?></td>
                                                    <td><?php echo isset($value->transaction_type)? $value->transaction_type : '' ; ?></td>
                                                    <td><?php echo isset($value->subscriber)? $value->subscriber : '' ; ?></td>
                                                    <td><?php echo isset($value->service_provider)? $value->service_provider : '' ;?> </td>
                                                    <td><?php echo isset($value->amount)? $value->amount : '' ; ?></td>
                                                    <td><?php echo isset($value->transaction_for)? $value->transaction_for : '' ; ?></td>
                                                    <td><?php echo isset($value->payment_method)? $value->payment_method : '' ; ?></td>
                                                    <td><?php echo isset($value->bank_account)? $value->bank_account : '' ;?></td>
                                                    <td><?php echo isset($value->is_payment_by_cheque)? $value->is_payment_by_cheque : '' ; ?></td>
                                                    <td><?php echo isset($value->cheque_number)? $value->cheque_number : '' ;?> </td>
                                                    <td><?php echo isset($value->paid_by)? $value->paid_by : '' ;?> </td>
                                                    <td><?php echo isset($value->image_proof)? $value->image_proof : '' ;?> </td>
                                                    <td><?php echo isset($value->added_date)? $value->added_date : '' ;?> </td>
                                                    
                                                    <td>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                               href="<?php echo base_url(); ?>Dashboard/subscriptionUpdate/<?php echo isset($value->plan_id) ? $value->plan_id :''; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                                            <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                               class="data-delete" href="<?php echo base_url(); ?>Dashboard/subscriptionDelete/<?php echo isset($value->plan_id) ? $value->plan_id : ''; ?>"><i class="ri-delete-bin-line mr-0"></i></a>                                                      
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        
      
        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importSubscription" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script>
            $(".data-delete").click(function () {
                if (!confirm("Do you really want to delete this?")) {
                    return false;
                }
            });

        </script>
    </body>
</html>