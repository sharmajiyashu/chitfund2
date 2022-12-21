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
                     <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="#">Master </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Bank Account</li>
                  </ul> 
                    <div class="row">
                        <div class="col-lg-12">
                            
                            
                            
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Bank list</h4>
                                </div>
                                <!--<div style="">-->
                                <!--  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import"><i class="las la-plus mr-2"></i>Import</a>-->
                                <!--</div>-->
                        
                                <!--<div style="margin-left: 10px;">-->
                                <!--    <a href="<?php echo base_url();?>Dashboard/exportSubscription" class="btn btn-primary"><i class="las la-plus mr-2"></i>Export</a>-->
                                <!--</div>-->
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/BankAccount" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Bank Account</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-12" class="">
                            
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info " >
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <!--<th>First Name</th>-->
                                            <!--<th>Last Name </th>-->
                                            <th>Bank Name</th>
                                            <th>Branch Name</th>
                                            <th>Account Number</th>
                                            <th>IFCE Code</th>
                                            <!--<th>Address </th>-->
                                            <th>City</th>
                                            <!--<th>State</th>-->
                                            <!--<th>Pin Code</th>-->
                                            <th>Current balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body ">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value) {  
                                            ?>
                                                <tr>
                                                   <td><?php echo $i; ?></td>
                                                   <!--<td><?php echo isset($value['first_name']) ? $value['first_name'] : ''; ?></td>-->
                                                   <!--<td><?php echo isset($value['last_name']) ? $value['last_name'] : ''; ?></td>-->
                                                   <td><?php echo isset($value['bank_name']) ? $value['bank_name'] : ''; ?></td>
                                                   <td><?php echo isset($value['branch_name']) ? $value['branch_name'] : ''; ?></td>
                                                   <td><?php echo isset($value['account_number']) ? $value['account_number'] : ''; ?></td>
                                                   <td><?php echo isset($value['ifsc_code']) ? $value['ifsc_code'] : ''; ?></td>
                                                   <!--<td><?php echo isset($value['address']) ? $value['address'] : ''; ?></td>-->
                                                   <td><?php echo isset($value['city']) ? $value['city'] : ''; ?></td>
                                                   <!--<td><?php echo isset($value['state']) ? $value['state'] : ''; ?></td>-->
                                                   <!--<td><?php echo isset($value['pincode']) ? $value['pincode'] : ''; ?></td>-->
                                                   <td><?php echo isset($value['current_account_balance']) ? $value['current_account_balance'] : ''; ?></td>
                                                   <td>
                                                      <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                               href="<?php echo base_url(); ?>Dashboard/EditBankAccount/<?php echo isset($value['bank_account_id']) ? $value['bank_account_id'] : '';  ?>"><i class="ri-pencil-line mr-0"></i></a>
                                                      <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                               href="<?php echo base_url(); ?>Dashboard/DeleteBankAccount/<?php echo isset($value['bank_account_id']) ? $value['bank_account_id'] : '';  ?>"><i class="ri-delete-bin-line mr-0"></i></a>  
                                                       <a class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#" onclick="GetDetails(<?php echo isset($value['bank_account_id']) ? $value['bank_account_id'] : ''; ?>)"><i class="ri-eye-line mr-0"></i></a>
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
                        <table id="detail_table" class="data-table table mb-0 tbl-server-info ">
                          
                        </table>
                        <div class="col-md-12" style="    text-align: center;   margin-top: 15px;">
                            <div class="btn btn-primary mr-4" data-dismiss="modal">Close</div>
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
            
            function GetDetails(id){
                $.ajax({
                    type:'ajax',
                    url:'<?php echo base_url('Dashboard/GetBankDetail'); ?>', 
                    type: 'POST',
                    data: {id: id,},
                    async:false,
                    dataType:'json',
                    success:function(data)
                    {   
                        $("#detail_table").html('');
                        $("#detail_table").append("<tr><th style='    font-size: 28px;'>Current Balance</th><td style='    font-size: 28px;color: brown;'>"+data.current_account_balance+"</td></tr>");
                        $("#detail_table").append("<tr><th>Name</th><td>"+data.first_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>Last Name</th><td>"+data.last_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>Bank Name</th><td>"+data.bank_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>Account Number</th><td>"+data.account_number+"</td></tr>");
                        $("#detail_table").append("<tr><th>Branch Name</th><td>"+data.branch_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>IFSC Code</th><td>"+data.ifsc_code+"</td></tr>");
                        
                        $("#detail_table").append("<tr><th>Address</th><td>"+data.address+"</td></tr>");
                        $("#detail_table").append("<tr><th>City</th><td>"+data.city+"</td></tr>");
                        $("#detail_table").append("<tr><th>State</th><td>"+data.state+"</td></tr>");
                        $("#detail_table").append("<tr><th>Pincode</th><td>"+data.pincode+"</td></tr>");
                        $('#import').modal('show');
                    },
                    error:function(data)
                    {
                        alert('ajax error'); 
                    }
                });
            }

        </script>
    </body>
</html>