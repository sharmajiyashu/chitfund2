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
                    <li class="active">Chit Plans</li>
                  </ul>
                    <div class="row">
                        <div class="col-lg-12">
                            
                            
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Chit Plans list</h4>
                                </div>
                                <!--<div style="">-->
                                <!--  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import"><i class="las la-plus mr-2"></i>Import</a>-->
                                <!--</div>-->
                        
                                <!--<div style="margin-left: 10px;">-->
                                <!--    <a href="<?php echo base_url();?>Dashboard/exportSubscription" class="btn btn-primary"><i class="las la-plus mr-2"></i>Export</a>-->
                                <!--</div>-->
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/addSubscription" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Chit Plan</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class=" rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info table-responsive">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Plan Name</th>
                                            <th>Gross Chit Amount</th>
                                            <th>Tenure</th>
                                            <th>Start Month</th>
                                            <th>Agent Commission</th>
                                            <th>EMI</th>
                                            <th>Total Subscription</th>
                                            <th>Months Complete</th>
                                            <th>End Month</th>
                                            <th>End Date For Subscription</th>
                                            <th>Available Subscription</th>
                                            <th>PSO</th>
                                            <th>CC</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($getPlans) && is_array($getPlans)) { ?>
                                            <?php $i=1; foreach($getPlans as $key => $value) {    
                                              $available_subscription = $this->db->where('plan_id',$value->plan_id)->where('slot_status','vacant')->get('tbl_orders')->num_rows(); 
                                            ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo $i ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>"><?php echo isset($value->plan_name)? $value->plan_name : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->plan_amount)? $value->plan_amount : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->tenure)? $value->tenure : '' ;?></a> </td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->start_month)? $value->start_month : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->agent_commission)? $value->agent_commission : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->emi)? $value->emi : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->total_subscription)? $value->total_subscription : '' ;?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->months_completed)? $value->months_completed : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->total_months)? $value->total_months : '' ;?></a> </td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($value->end_date_for_subscription)? $value->end_date_for_subscription : '' ; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>" style="color: black;"><?php echo isset($available_subscription)? $available_subscription : '' ; ?></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <?php if ($value->status == 'active') { ?>
                                                        <td><a onclick = "funActive();" href="<?php echo base_url(); ?>Dashboard/change_status_plan/<?php echo isset($value->plan_id) ? $value->plan_id : ''; ?>"><b style="color: green">Active</b></a></td>
                                                    <?php } else { ?>
                                                        <td><a onclick = "funUnActive();" href="<?php echo base_url(); ?>Dashboard/change_status_plan/<?php echo isset($value->plan_id) ? $value->plan_id : ''; ?>"><b style="color: red"><?php echo isset($value->status) ? $value->status : ''; ?></b></a></td>
                                                    <?php } ?>
                                                    <td>
                                                        <div class="d-flex align-items-center list-action">
                                                             <!--<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"-->
                                                             <!--  href="<?php echo base_url();?>Dashboard/GetGroupinplan/<?php echo isset($value->plan_id)? $value->plan_id : '' ; ?>"><i class="ri-eye-line mr-0"></i></a>-->
                                                            
                                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                               href="<?php echo base_url(); ?>Dashboard/subscriptionUpdate/<?php echo isset($value->plan_id) ? $value->plan_id :''; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                                               
                                                            <!--<a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"-->
                                                            <!--   class="data-delete" href="<?php echo base_url(); ?>Dashboard/subscriptionDelete/<?php echo isset($value->plan_id) ? $value->plan_id : ''; ?>"><i class="ri-delete-bin-line mr-0"></i></a>                                                      -->
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