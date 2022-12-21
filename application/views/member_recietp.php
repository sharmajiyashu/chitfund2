
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
                    <li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$data2['member_id']); ?>"><?php print_r($data2['name']); ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active">Receipts</li>
                  </ul>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Transaction History</h4>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-12">-->
                                                           
                            <!--<div class="row">-->
                            <!--            <?php if (isset($data) && is_array($data)) { ?>-->
                            <!--                <?php $i=1; foreach($data as $key => $values) {  ?>-->
                            <!--                 <div class="col-lg-6" style=""  >-->
                            <!--                    <div class="card shadow-sm" >      -->
                            <!--                        <div style="padding: 1px;">   -->
                            <!--                            <div class="row" >-->
                            <!--                                <div class="col-lg-3">-->
                            <!--                                    <div style="padding: 3px;border-right: 1px solid darkgray;" >-->
                            <!--                                        <?php if(!empty($values['plan_name'])){ ?>-->
                            <!--                                        <div style="text-align: center;">-->
                            <!--                                            <span style="background-color: darkseagreen;color: aliceblue;border-radius: 8px;padding: 4px;">-->
                            <!--                                               <?php echo isset($values['plan_name'])? $values['plan_name'] :'' ?>-->
                            <!--                                            </span>-->
                            <!--                                        </div> -->
                            <!--                                        <?php } else { ?>-->
                            <!--                                         <div style="text-align: center;">-->
                            <!--                                             <span style="background-color: darkseagreen;color: aliceblue;border-radius: 8px;padding: 4px;">-->
                            <!--                                               <?php echo isset($values['type'])? $values['type'] :'' ?>-->
                            <!--                                             </span>-->
                            <!--                                        </div> -->
                            <!--                                       <?php }?>-->
                            <!--                                         <div style="text-align: center;"><span style="font-size: 10px;"><?php echo isset($values['added_date'])? $values['added_date'] :'' ?></span></div> -->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-lg-6">-->
                            <!--                                    <div>-->
                            <!--                                        <div><span style="font-size: 20px;color: crimson;"> ₹<?php echo isset($values['transaction_amount'])? $values['transaction_amount'] :'' ?></span></div> -->
                            <!--                                         <?php if($values['transaction_for']== "pay_emi"){ ?> <div><span> Emi Paid : <?php echo isset($values['emi_count'])? $values['emi_count'] :'' ?></span></div> <?php } else {?>-->
                            <!--                                         <div><span> Transaction For : <?php echo isset($values['transaction_for'])? $values['transaction_for'] :'' ?></span></div> <?php }?>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-lg-3">-->
                            <!--                                    <div>-->
                            <!--                                     <?php if($values['transaction_for']== "pay_emi"){ ?>  -->
                            <!--                                        <a href="<?php echo base_url(); ?>Dashboard/memberReceiptDetail/<?php echo isset($values['transaction_id']) ? $values['transaction_id'] : ''; ?>"  > -->
                            <!--                                        <button class="btn btn-dark" style="margin-top: 18px;border-radius: 18px;WIDTH: 69px;height: 30px;font-size: 10px;" >-->
                            <!--                                            <span style="">DETAILS</span></button></a> -->
                            <!--                                    <?php } ?>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>                                                 -->
                                                        
                            <!--                        </div>                                -->
                            <!--                    </div> -->
                            <!--                 </div> -->
                                            
                            <!--                <?php $i++; } ?>-->
                            <!--            <?php } ?>-->
                            <!--            </div> -->
                                        
                        <!--    </div>-->
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Added Date</th>
                                            <th>Plan Name</th>
                                            <th>Transcation For</th>
                                            <th>Payment Type</th>
                                            <th>Emi Counts</th>
                                            <th>View Detail</th>
                                            <th>Transcation Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value) {    
                                            ?>
                                                <tr>
                                                   <td><?php echo $i; ?></td>
                                                   <td><?php echo isset($values['added_date']) ? $values['added_date'] :''; ?></td>
                                                   <td><?php echo isset($values['plan_name']) ? $values['plan_name'] :''; ?></td>
                                                   <?php if($values['transaction_for'] == 'pay_emi'){ ?>
                                                        <td>Pay Emi</td>
                                                   <?php }else{?>
                                                        <td> <?php echo isset($values['type']) ? $values['type'] :''; ?></td>
                                                   <?php } ?>
                                                   <td><?php echo isset($values['type']) ? $values['type'] :''; ?></td>
                                                   <td><?php echo isset($values['emi_count']) ? $values['emi_count'] :''; ?></td>
                                                   <?php if($values['transaction_for']== "pay_emi"){ ?>
                                                   <td><a href="<?php echo base_url(); ?>Dashboard/memberReceiptDetail/<?php echo isset($values['transaction_id']) ? $values['transaction_id'] : ''; ?>" >View Detail</a></td>
                                                   <?php }else{ ?>
                                                   <td>No</td>
                                                   <?php }?>
                                                   <td><?php echo isset($values['transaction_amount']) ? $values['transaction_amount'] :''; ?></td>
                                                </tr>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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



































