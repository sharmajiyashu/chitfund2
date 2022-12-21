
<!doctype html>
<html lang="en">

    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
     <style>
      .error{
          color:#E08DB4;
      }

    </style>
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
                
                <div class="container-fluid add-form-list">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li><a href="<?php echo base_url('Dashboard/subscription_listing');?>">Chit Plans </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li class="active"><?php if(isset($data['plan_id'])){ ?> Update Chit Plan <?php } else{?> Add Chit Plan <?php } ?></h4> </li>
                      </ul>                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <?php if(!empty($data['plan_id'])){ ?> 
                                        <h4 class="card-title">
                                          Update Chit Plan 
                                          <?php } else{ ?>
                                          Add Chit Plan 
                                        </h4>
                                       <?php } ?> 
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addSubscription" method="post" data-toggle="validator">
                                     
                                        <input type="hidden" name="plan_id" value="<?php echo isset($data['plan_id']) ? $data['plan_id'] : '' ;  ?>" />  
                                                                       
                                         <div class="row"> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Plan Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter plan" required  name="plan_name" name="plan_name" value="<?php echo isset($data['plan_name']) ? $data['plan_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Start Month *</label>
                                                    <input type="date" class="form-control" id="start_month" placeholder="Enter Start Month"  required name="start_month" name="start_month" value="<?php echo isset($data['start_month']) ? $data['start_month'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('gst_no'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gross Chit Amount *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Gross Chit Amount" id="plan_amount" name="plan_amount"  required name="plan_amount" value="<?php echo isset($data['plan_amount']) ? $data['plan_amount'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('email'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tenure *</label>
                                                    <input type="number" class="form-control" id="tenure" placeholder="Enter Tenure"  required name="tenure" name="tenure" value="<?php echo isset($data['tenure']) ? $data['tenure'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('phone_no'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Foreman Fees*</label>
                                                    <input type="number" class="form-control" placeholder="Enter foreman fees in percentage % ,less then 7" required max="7"  name="foreman_fees" value="<?php echo isset($data['foreman_fees']) ? $data['foreman_fees'] : ''; ?>" >
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Group Counts *</label> 
                                                    <input type="text" class="form-control" placeholder="Enter Group Count" required name="groups_counts" value="<?php echo isset($data['groups_counts']) ? $data['groups_counts'] : ''; ?>">
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Emi Calculate *</label>
                                                    <input type="text" readonly class="form-control" id="emi_calculate" placeholder="Calculate Emi After Fill Tenure" required name="emi_calculate" value="<?php echo isset($data['emi']) ? $data['emi'] : ''; ?>">
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Total Months *</label>-->
                                            <!--        <input type="text" class="form-control" id="total_month" placeholder="Calculate Date After Fill Tenure " required name="total_months" value="<?php echo isset($data['total_months']) ? $data['total_months'] : ''; ?>">-->
                                                    <!--<div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>End Date For Subscription *</label> 
                                                    <input type="text" readonly class="form-control" id="endSubscription" placeholder="Enter End Date For Subscription" required name="end_date_for_subscription" value="<?php echo isset($data['end_date_for_subscription']) ? $data['end_date_for_subscription'] : ''; ?>">
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max Bid Amount *</label>
                                                    <input type="number" class="form-control" placeholder="Enter Max Bid in percentage % ,less then 40" required max="40"  name="max_bid" value="<?php echo isset($data['max_bid']) ? $data['max_bid'] : ''; ?>" >
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gst*</label>
                                                    <input type="number" class="form-control" placeholder="Enter Gst in percentage % "  required name="plan_gst"   value="<?php echo isset($data['plan_gst']) ? $data['plan_gst'] : '18'; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label> Admission Fee *</label>
                                                    <input type="text" class="form-control" readonly placeholder="Enter Admission Fee in percentage %"  id="admission_fee"  name="admission_fee"  value="<?php echo isset($data['admission_fee']) ? $data['admission_fee'] : ''; ?>">
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                             
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Auction type*</label>
                                                        <select class="form-control" id="mySelect" name="auction_type" onchange="show_restart_per()">
                                                            <option value="fixed_auction"  <?php if(isset($data['auction_type']) && $data['auction_type'] == "fixed_auction"){echo "selected";}?>>Fixed Auction</option>
                                                            <option value="variable_auction" <?php if(isset($data['auction_type']) && $data['auction_type'] == "variable_auction"){echo "selected";}?>>Variable Auction</option>
                                                        </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-6" id="restart_auction">                      
                                                <div class="form-group">
                                                    <label>Reauction limit % (Amount on which reauction can be placed)</label>
                                                    <input type="number" class="form-control" placeholder="Enter percentage of plan amount"  name="variable_auction_percentage"  value="<?php echo isset($data['variable_auction_percentage']) ? $data['variable_auction_percentage'] : '50'; ?>">
                                                </div>
                                            </div>
                                             
                                        </div>     
                                        <?php if(!empty($data['plan_id'])){ ?> 
                                            <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Update Chit Plan </button> 
                                        <?php } else{ ?>  
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">  Add Chit Plan </button>
                                        <?php } ?>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </form>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        
        <script>
            // $("#restart_auction").hide();
            function show_restart_per(){
                var x = document.getElementById("mySelect").value;
                if(x == 'variable_auction'){
                    $("#restart_auction").show();
                }else{
                    $("#restart_auction").hide();
                }
            }
            
            $( document ).ready(function() {
        var x = document.getElementById("mySelect").value;
                if(x == 'variable_auction'){
                    $("#restart_auction").show();
                }else{
                    $("#restart_auction").hide();
                }
});
            
        </script>
        
        <script>
             $(document).ready(function () {

                $("#myform").validate({

                    rules: {

                        agent_commission: {
                            required: true,
                            min: 1,
                            max:100
                        },   
                        foreman_fees: {
                            required: ,
                            min: 1,
                            max:7
                        },  
                         max_bid: {
                            required: true,
                            min: 1,
                            max:40
                        },  
                          
                          admission_fee: {
                            min: 1,
                            max:100
                        },
                    },
                    messages: {

                        agent_commission: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        },          
                         foreman_fees: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 
                        max_bid: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 
                         admission_fee: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 

                    }

                });
            });
        </script>
        
        <script>
        $('#num').keydown(function(e) {
          if (e.keyCode === 190 || e.keyCode === 110) {
            e.preventDefault();
          }
        });
        </script>
        
        <script>
            $("#tenure").on('change',function(){
                let start_month = $("#start_month").val();
                let total_month = $(this).val();
                let less = total_month - 1;
                let futureDate = convert(addMonths(new Date(start_month),less).toString());
                $("#endSubscription").val(futureDate);
            });
        </script>
        
        <script>
            $("#tenure").on('change',function(){
                let start_month = $("#plan_amount").val();
                let tenure = $(this).val();
                let futureDate = start_month / tenure ;
                $("#emi_calculate").val(futureDate);
            });
            
            $("#plan_amount").on('change',function(){
               let plan_amount = $("#plan_amount").val();
               if(plan_amount < 100000){
                   $("#admission_fee").val('0.04');
               }if(plan_amount > 99999 && plan_amount < 1000000){
                   $("#admission_fee").val('0.025');
               }
               if(plan_amount > 999999){
                   $("#admission_fee").val('0.01');
               }
               
            });
        </script>
        
        <script>
            function addMonths(date, months) {
                var d = date.getDate();
                date.setMonth(date.getMonth() + +months+1);
                if (date.getDate() != d) {
                  date.setDate(0);
                }
                return date;
            } 
            
            function convert(str) {
              var date = new Date(str),
                mnth = ("0" + (date.getMonth())).slice(-2),
                day = ("0" + date.getDate()).slice(-2);
              return [date.getFullYear(), mnth, day].join("-");
            }
        </script>
    </body>
</html>