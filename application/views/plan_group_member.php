<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">  
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
                    <li><a href="<?php echo base_url('Dashboard/subscription_listing'); ?>">Chit Plans </a>&nbsp;&nbsp; >&nbsp;</li>
                    <li class="active"><?php echo  $data2['plan_name'] ?></li>
                  </ul>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Plans Group Information</h4>
                                </div>
                                <!-- <a href="<?php echo base_url(); ?>Dashboard/add_sale" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sale</a> -->
                            </div>
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                                    <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                            <?php 
                                                            if (isset($data) && is_array($data)) {  
                                                                    foreach( $data as $keys=>$values){ 
                                                                    $plan_name = isset($values['plan_name']) ? $values['plan_name'] :'';
                                                                    $emi = isset($values['emi']) ? $values['emi'] :'';
                                                                    $start_month = isset($values['start_month']) ? $values['start_month'] :'';
                                                                    $end_date_for_subscription =isset($values['end_date_for_subscription']) ? $values['end_date_for_subscription'] :'';
                                                                    $tenure = isset($values['tenure']) ? $values['tenure'] :'';
                                                                    $plan_amount = isset($values['plan_amount']) ? $values['plan_amount'] :'';
                                                                }}
                                                            ?>  
                                                    <div class="row" > 
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Plan Name   <span style = "color:red;margin-left: 164px;"> <?php echo isset($plan_name) ? $plan_name : '' ; ?></span> </h5></div>
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Start Months  <span style = "color:red;margin-left: 153px;"> <?php echo isset($start_month) ? $start_month : '' ; ?></span></h5></div>
                                                    </div>
                                                    <div class="row" > 
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">End Months  <span style = "color:red;margin-left: 153px;"> <?php echo isset($end_date_for_subscription) ? $end_date_for_subscription : '' ; ?></span></h5></div>
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Tenure  <span style = "color:red;margin-left: 206px;"> <?php echo isset($tenure) ? $tenure : '' ; ?></span></h5></div>
                                                    </div>
                                                    <div class="row" > 
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Emi  <span style = "color:red;margin-left: 224px;"> <?php echo isset($emi) ? $emi : '' ; ?></span></h5></div>
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Amount  <span style = "color:red;margin-left: 195px;"> <?php echo isset($plan_amount) ? $plan_amount : '' ; ?></span></h5></div>
                                                    </div> 
                                                    <div class="row" > 
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Total subscription  <span style = "color:red;margin-left: 105px;"> <?php echo isset($group_detail['total_members']) ? $group_detail['total_members'] : '' ; ?></span></h5></div>
                                                        <div class="col-sm-6"> <h5 class="card-title" class="col-lg-10">Available subscription  <span style = "color:red;margin-left: 76px;"> <?php echo isset($group_detail['total_available_member']) ? $group_detail['total_available_member'] : '' ; ?></span></h5></div>
                                                    </div> 
                                                </div>
                                        </div>
                                        <div class="table-responsive rounded mb-3">
                                            <table id="example1" class="display" style="width:100%">
                                                <thead>
                                                    <tr class="ligth ligth-data">                                           
                                                        <th style="text-align: center;">S.No.</th>
                                                        <th style="text-align: center;">Sub.Name</th>
                                                        <th style="text-align: center;">Mobile</th>
                                                        <th style="text-align: center;">Chit Taken</th>
                                                        <th style="text-align: center;">Discount Amt</th>
                                                        <th style="text-align: center;">Risk Amount</th>  
                                                        <th style="text-align: center;">Group Name</th>
                                                        <th style="text-align: center;">Collateral Description</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php if (isset($data) && is_array($data)) { ?>
                                                <?php $i=1; foreach ($data as $keys => $values ){ ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo isset($values['slot_number']) ? $values['slot_number'] : ''; ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['name'])? $values['name'] : '' ; ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['mobile'])? $values['mobile'] : '' ;  ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['chit_taken'])? $values['chit_taken'] : '' ;  ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['forgo_amount'])? $values['forgo_amount'] : '' ; ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['riskCal'])? $values['riskCal'] : '' ; ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['group_name'])? $values['group_name'] : '' ;  ?></td>
                                                    <td style="text-align: center;"><?php echo isset($values['collateral_description'])? $values['collateral_description'] : '' ; ?></td>
                                                   <?php if($values['slot_status'] == 'assigned'){  ?>
                                                     <td style="text-align: center;"><button  class="btn btn-primary cancelSubscription"   order_id="<?php echo isset($values['order_id']) ? $values['order_id'] : ''; ?>" value="<?php echo isset($values['slot_number']) ? $values['slot_number'] : ''; ?>">Cancel Subscription </button></td>
                                                   <?php }else if($values['slot_status'] == 'vacant'){ ?>
                                                     <td style="text-align: center;"><button class="addSubcription btn btn-primary"  value ="<?php echo isset($values['slot_number']) ? $values['slot_number'] : ''; ?>" order_id="<?php echo isset($values['order_id']) ? $values['order_id'] : ''; ?>">Add Subscription</button></td>
                                                   <?php } ?>
                                                </tr>
                                            <?php $i++; } ?>
                                        <?php } ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add Subscription Model -->
                <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <div class="media align-items-top justify-content-between">                            
                                        <h3 class="mb-3">Add Subscription</h3>
                                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                                    </div>
                                    <div class="content edit-notes">
                                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>
                                                </div>
                                                <div class="table-responsive rounded mb-3">
                                                <table id="example" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">S.No.</th>
                                                            <th style="text-align: center;">Subscriber Id</th>
                                                            <th style="text-align: center;">Sub.Name</th>
                                                            <th style="text-align: center;">Mobile</th>
                                                            <th>Option</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (isset($subscriber_listing) && is_array($subscriber_listing)) { ?>
                                                    <?php $i=1; foreach ($subscriber_listing as $keys => $values ){  ?>
                                                        <tr>
                                                        <td style="text-align: center;"><?php echo $i; ?></td>
                                                            <td style="text-align: center;">MYM<?php echo isset($values['member_id'])? $values['member_id'] : '' ; ?></td>
                                                            <td style="text-align: center;"><?php echo isset($values['name'])? $values['name'] : '' ; ?></td>
                                                            <td style="text-align: center;"><?php echo isset($values['mobile'])? $values['mobile'] : '' ;  ?></td>
                                                            <td><button class="btn btn-primary" onclick="allocated('<?php echo $values['member_id']; ?>')" id="allocated_<?php echo isset($values['member_id'])? $values['member_id'] : '' ; ?> ?>" member_id="<?php echo isset($values['member_id'])? $values['member_id'] : '' ; ?>">Allocate Subscriber</button></td>
                                                        </tr>
                                                    <?php } } ?>
                                                     </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!---Cancel Subscription -->
                 <div class="modal fade" id="edit-note1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <div class="media align-items-top justify-content-between">                            
                                        <h3 class="mb-3">Cancel Subscription</h3>
                                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                                    </div>
                                    <div class="content edit-notes">
                                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea name="reason" class="form-control" value="" id="reason"></textarea>
                                                </div>
                                                <div><button name="cancel_subscription"   class="btn btn-danger" id="cancelSubscription1">Cancel Subscription</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Add Subscription Model -->
      
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        $(".cancelSubscription").on('click',function(){
             $('#edit-note1').modal('show');
          $("#cancelSubscription1").on('click',function(){
            var reason = $("#reason").val();
            var slot_number = $(".cancelSubscription").val();
            var order_id = $(".cancelSubscription").attr('order_id');
            $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/cancelSubscription',
                type: 'post',
                data: {slot_number:slot_number,order_id:order_id,reason:reason},
                dataType: 'json',
                success: function (response) {
                    Swal.fire({
                      html: 'Cancelled Successfully',
                      customClass: {
                        popup: 'format-pre'
                      }
                    });
                window.location.reload();
                },
            });
          });
        });
        </script>
        <script>
          $(".addSubcription").on('click',function(){
            $('#edit-note').modal('show');
          });
          
          function allocated(id){ 
            var slot_number = $(".addSubcription").val();
            var member_id = id;
            var order_id = $('.addSubcription').attr('order_id');
            $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/resignSlotSubcription',
                type: 'post',
                data: {slot_number:slot_number,member_id:member_id,order_id:order_id},
                dataType: 'json',
                success: function (response) {
                    Swal.fire({
                      html: 'Add Subscription Successfully',
                      customClass: {
                        popup: 'format-pre'
                      }
                    });
                window.location.reload();
                },
            });
        }
          
        </script>
        
        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    "order": [[ 3, "desc" ]]
                } );
            } );
            
              $(document).ready(function() {
                $('#example1').DataTable( {
                    "order": [[ 3, "desc" ]]
                } );
            } );
        </script>
        
    </body>
</html>

