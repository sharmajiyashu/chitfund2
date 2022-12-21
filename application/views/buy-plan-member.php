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
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$data2['member_id']); ?>"><?php print_r($data2['name']); ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active">Subscribe</li>
                  </ul>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Available Plan</h4>
                                </div>
                            </div>
                        </div>
                       
                        
                         <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Plan Name</th>
                                            <th>Gross Chit Amount</th>
                                            <th>Emi</th>
                                            <!--<th>Payment Mode</th>-->
                                            <th>Available Subscription</th>
                                            <th>Start Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)){?>
                                            <?php $i=1; foreach($data as $key => $values) {  
                                                 $available_subscription = $this->db->where('plan_id',$values['plan_id'])->where('slot_status','vacant')->get('tbl_orders')->num_rows(); 
                                                ?> 
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?></td>
                                                    <td><?php echo isset($values['plan_amount']) ? $values['plan_amount'] :'' ?></td>
                                                    <td><?php echo isset($values['emi']) ? $values['emi'] :'' ?></td>
                                                     <form id="myform" action="<?php echo base_url(); ?>Dashboard/buy_plan_by_agent/" method="post"  class="dropzone" enctype="multipart/form-data">
                                                    <!--<td><select class="form-control" name="payment_mode"> -->
                                                    <!--                <option value="offline" name="payment_mode" >Offline Payment</option>-->
                                                    <!--                <option value="online" name="payment_mode">Online Payment</option></td>-->
                                                    <td><?php echo isset($available_subscription) ? $available_subscription :'' ?></td>
                                                    <td><?php echo isset($values['start_month']) ? $values['start_month'] :'' ?></td>
                                                     <input type="hidden" name="plan_id" value="<?php echo isset($values['plan_id']) ? $values['plan_id'] : '' ;  ?>"/>  
                                                    <input type="hidden" name="member_id" value="<?php echo isset($member_id) ? $member_id : '' ;  ?>"/> 
                                                    <td><button class="btn btn-dark" style="" name="submit">  <span style="font-size: 15px; color:white"> Add Subscription </span></button></td>
                                                     </form>
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