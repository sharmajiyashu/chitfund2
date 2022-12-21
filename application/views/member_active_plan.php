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
                    <li class="active">Subcription</li>
                  </ul>
                
                <div class="container-fluid">
                    <!--<div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                
                                <div>
                                    <h4 class="mb-3">Active Plan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                                                           
                           
                    <div class="table-responsive rounded mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Gross Chit Amount</th>
                                <th>Tenure</th>
                                <th>Start Month</th>
                                <th>Emi </th>
                                <th>Total Subscription </th>
                                <th>Total Months </th>
                                <th>Subscription ID</th>
                                <th>Months Completed </th>
                                <th>Chit Taken Amount </th>
                                
                            </tr>
                        </thead>
                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $values) {  
                                                ?> 
                        <tbody>
                            <tr>
                                <td class="left"><?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?></td>
                                <td class="left">₹<?php echo isset($values['plan_amount']) ? $values['plan_amount'] :'' ?></td>
                                <td class="left"><?php echo isset($values['tenure']) ? $values['tenure'] :'' ?></td>
                                <td class="center"><?php echo isset($values['start_month']) ? $values['start_month'] :'' ?></td>
                                <td class="right">₹<?php echo isset($values['emi']) ? $values['emi'] :'0' ?></td>
                                <td class="right"><?php echo isset($values['total_subscription']) ? $values['total_subscription'] :'0' ?></td>
                                <td class="right"><?php echo isset($values['total_months']) ? $values['total_months'] :'0' ?></td>
                                <td class="right"><?php echo isset($values['slot_number']) ? $values['slot_number'] :'0' ?></td>
                                <td class="right"><?php echo isset($values['months_completed']) ? $values['months_completed'] :'0' ?></td>
                                <td class="right"><?php if(!empty($values['chit_amount'])){echo isset($values['chit_amount']) ? $values['chit_amount'] :'No';} else{ echo 'No'; }?></td>
                            </tr>
                        </tbody>
                        <?php
                            }}
                         ?>
                    </table>
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