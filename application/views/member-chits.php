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
                    <li class="active">Chits</li>
                  </ul>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Chits</h4>
                                </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Plan Name</th>
                                            <!--<th>Gross Chit Amount</th>-->
                                            <th>Chit Taken Amount</th>
                                            <th>Gross Chit Amount</th>
                                            <th>Discount Amount</th>
                                            <th>Subscription ID</th>
                                            <th>Chit Month</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value){    
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ; ?></td>
                                                    <td><?php echo isset($value['plan_name']) ? $value['plan_name'] :'' ; ?></td>
                                                    <!--<td><?php echo isset($value['plan_amount']) ? $value['plan_amount'] :'' ; ?></td>-->
                                                    <td><?php echo isset($value['chit_amount']) ? $value['chit_amount'] :'' ; ?></td>
                                                    <td><?php echo isset($value['return_chit_amount']) ? $value['return_chit_amount'] :'' ; ?></td>
                                                    <td><?php echo isset($value['forgo_amount']) ? $value['forgo_amount'] :'' ; ?></td>
                                                    <td><?php echo isset($value['slot_number']) ? $value['slot_number'] :'' ; ?></td>
                                                    <td><?php echo isset($value['chit_month']) ? $value['chit_month'] :'' ; ?></td>
                                                    
                                                    
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
        
      
        <!--<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">-->
        <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
        <!--        <div class="modal-content">-->
        <!--            <div class="modal-body">-->
        <!--                <div class="popup text-left">-->
        <!--                    <h4 class="mb-3">Import</h4>-->
        <!--                    <form action="<?php echo base_url();?>Dashboard/importSubscription" method="post" enctype="multipart/form-data">-->
        <!--                    <div class="content create-workform bg-body">-->
        <!--                        <div class="pb-3">-->
        <!--                            <label class="mb-2">CSV</label>-->
        <!--                            <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">-->
        <!--                        </div>-->
        <!--                        <div class="col-lg-12 mt-4">-->
        <!--                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">-->
        <!--                                <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>-->
        <!--                                <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>    -->

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
        
        <script type = "text/javascript">  
            function funActive() {  
               alert ("To inactive plan");  
            }  
      </script> 
      <script type = "text/javascript">  
            function funUnActive() {  
               alert ("To active plan");  
            }  
      </script> 
    </body>
</html>