
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
                 <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="#">Master </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/bankAccountList');?>">Bank Account </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active"><?php if(!empty($data['bank_account_id'])){ ?>  Update Bank Account 
                                          <?php } else{ ?>
                                          Add Bank Account <?php } ?> </li>
                  </ul> 
                <div class="container-fluid add-form-list">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <?php if(!empty($data['bank_account_id'])){ ?> 
                                        <h4 class="card-title">
                                          Update Bank Account 
                                          <?php } else{ ?>
                                          Add Bank Account 
                                        </h4>
                                       <?php } ?> 
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/AddBnakAccount" method="post" data-toggle="validator">
                                        <input type="hidden" name="id" value="<?php echo isset($data['bank_account_id']) ? $data['bank_account_id'] : '' ;  ?>" /> 
                                                                       
                                         <div class="row"> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>First Name*</label>
                                                    <input type="text" class="form-control" placeholder="Enter First Name" required  name="first_name" value="<?php echo isset($data['first_name']) ? $data['first_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Last name*</label>
                                                    <input type="text" class="form-control" placeholder="Enter Last name" required  name="last_name" value="<?php echo isset($data['last_name']) ? $data['last_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Bank Name*</label>
                                                    <input type="text" class="form-control" placeholder="Enter Bank Name" required  name="bank_name" value="<?php echo isset($data['bank_name']) ? $data['bank_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            
                                             <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Branch name*</label>
                                                    <input type="text" class="form-control" placeholder="Enter Branch name" required  name="branch_name" value="<?php echo isset($data['branch_name']) ? $data['branch_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Account number*</label>
                                                    <input type="text" class="form-control" placeholder="Enter Account number" required  name="account_number" value="<?php echo isset($data['account_number']) ? $data['account_number'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                             <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>IFSC Code*</label>
                                                    <input type="text" class="form-control" placeholder="Enter IFSC Code" required  name="ifsc_code" value="<?php echo isset($data['ifsc_code']) ? $data['ifsc_code'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Address*</label>
                                                   <textarea class="form-control" rows="3" name="address" placeholder="Enter Your Address" ><?php echo isset($data['address']) ? $data['address'] : '' ?></textarea>
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>City*</label>
                                                    <input type="text" class="form-control" placeholder="Enter City" required  name="city" value="<?php echo isset($data['city']) ? $data['city'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                     <select name="state" id="state" class="form-control">
                										<option value="">(select state)</option>
                										<option value="Andhra Pradesh"<?php if(isset($data['state']) && $data['state'] == "Andhra Pradesh"){echo "selected";}?>>Andhra Pradesh</option>
                										<option value="Andaman and Nicobar Islands" <?php if(isset($data['state']) && $data['state'] == "Andaman and Nicobar Islands"){echo "selected";}?>>Andaman and Nicobar Islands</option>
                										<option value="Arunachal Pradesh"<?php if(isset($data['state']) && $data['state'] == "Arunachal Pradesh"){echo "selected";}?>>Arunachal Pradesh</option>
                										<option value="Assam"<?php if(isset($data['state']) && $data['state'] == "Assam"){echo "selected";}?>>Assam</option>
                										<option value="Bihar"<?php if(isset($data['state']) && $data['state'] == "Bihar"){echo "selected";}?>>Bihar</option>
                										<option value="Chandigarh"<?php if(isset($data['state']) && $data['state'] == "Chandigarh"){echo "selected";}?>>Chandigarh</option>
                										<option value="Chhattisgarh"<?php if(isset($data['state']) && $data['state'] == "Chhattisgarh"){echo "selected";}?>>Chhattisgarh</option>
                										<option value="Dadar and Nagar Haveli"<?php if(isset($data['state']) && $data['state'] == "Dadar and Nagar Haveli"){echo "selected";}?>>Dadar and Nagar Haveli</option>
                										<option value="Daman and Diu"<?php if(isset($data['state']) && $data['state'] == "Daman and Diu"){echo "selected";}?>>Daman and Diu</option>
                										<option value="Delhi"<?php if(isset($data['state']) && $data['state'] == "Delhi"){echo "selected";}?>>Delhi</option>
                										<option value="Lakshadweep"<?php if(isset($data['state']) && $data['state'] == "Lakshadweep"){echo "selected";}?>>Lakshadweep</option>
                										<option value="Puducherry"<?php if(isset($data['state']) && $data['state'] == "Puducherry"){echo "selected";}?>>Puducherry</option>
                										<option value="Goa"<?php if(isset($data['state']) && $data['state'] == "Goa"){echo "selected";}?>>Goa</option>
                										<option value="Gujarat"<?php if(isset($data['state']) && $data['state'] == "Gujarat"){echo "selected";}?>>Gujarat</option>
                										<option value="Haryana"<?php if(isset($data['state']) && $data['state'] == "Haryana"){echo "selected";}?>>Haryana</option>
                										<option value="Himachal Pradesh"<?php if(isset($data['state']) && $data['state'] == "Himachal Pradesh"){echo "selected";}?>>Himachal Pradesh</option>
                										<option value="Jammu and Kashmir"<?php if(isset($data['state']) && $data['state'] == "Jammu and Kashmir"){echo "selected";}?>>Jammu and Kashmir</option>
                										<option value="Jharkhand"<?php if(isset($data['state']) && $data['state'] == "Jharkhand"){echo "selected";}?>>Jharkhand</option>
                										<option value="Karnataka"<?php if(isset($data['state']) && $data['state'] == "Karnataka"){echo "selected";}?>>Karnataka</option>
                										<option value="Kerala"<?php if(isset($data['state']) && $data['state'] == "Kerala"){echo "selected";}?>>Kerala</option>
                										<option value="Madhya Pradesh"<?php if(isset($data['state']) && $data['state'] == "Madhya Pradesh"){echo "selected";}?>>Madhya Pradesh</option>
                										<option value="Maharashtra"<?php if(isset($data['state']) && $data['state'] == "Maharashtra"){echo "selected";}?>>Maharashtra</option>
                										<option value="Manipur"<?php if(isset($data['state']) && $data['state'] == "Manipur"){echo "selected";}?>>Manipur</option>
                										<option value="Meghalaya"<?php if(isset($data['state']) && $data['state'] == "Meghalaya"){echo "selected";}?>>Meghalaya</option>
                										<option value="Mizoram"<?php if(isset($data['state']) && $data['state'] == "Mizoram"){echo "selected";}?>>Mizoram</option>
                										<option value="Nagaland"<?php if(isset($data['state']) && $data['state'] == "Nagaland"){echo "selected";}?>>Nagaland</option>
                										<option value="Odisha"<?php if(isset($data['state']) && $data['state'] == "Odisha"){echo "selected";}?>>Odisha</option>
                										<option value="Punjab"<?php if(isset($data['state']) && $data['state'] == "Punjab"){echo "selected";}?>>Punjab</option>
                										<option value="Rajasthan"<?php if(isset($data['state']) && $data['state'] == "Rajasthan"){echo "selected";}?>>Rajasthan</option>
                										<option value="Sikkim"<?php if(isset($data['state']) && $data['state'] == "Sikkim"){echo "selected";}?>>Sikkim</option>
                										<option value="Tamil Nadu"<?php if(isset($data['state']) && $data['state'] == "Tamil Nadu"){echo "selected";}?>>Tamil Nadu</option>
                										<option value="Telangana"<?php if(isset($data['state']) && $data['state'] == "Telangana"){echo "selected";}?>>Telangana</option>
                										<option value="Tripura"<?php if(isset($data['state']) && $data['state'] == "Tripura"){echo "selected";}?>>Tripura</option>
                										<option value="Uttar Pradesh"<?php if(isset($data['state']) && $data['state'] == "Uttar Pradesh"){echo "selected";}?>>Uttar Pradesh</option>
                										<option value="Uttarakhand"<?php if(isset($data['state']) && $data['state'] == "Uttarakhand"){echo "selected";}?>>Uttarakhand</option>
                										<option value="West Bengal"<?php if(isset($data['state']) && $data['state'] == "West Bengal"){echo "selected";}?>>West Bengal</option>
                										</select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Pincode*</label>
                                                    <input type="text" class="form-control" placeholder="Enter Pincode" required  name="pincode" value="<?php echo isset($data['pincode']) ? $data['pincode'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Current Balance*</label>
                                                    <input type="number" class="form-control" placeholder="Enter Current Balance" required  name="current_account_balance" value="<?php echo isset($data['current_account_balance']) ? $data['current_account_balance'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <!--<div class="help-block with-errors"></div>-->
                                                </div>
                                            </div> 
                                            
                                        </div>     
                                        <?php if(!empty($data['bank_account_id'])){ ?> 
                                            <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Update Bank Account   </button> 
                                        <?php } else{ ?>  
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">  Add Bank Account   </button>
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
             $(document).ready(function () {

                $("#myform").validate({

                    rules: {

                        agent_commission: {
                            required: true,
                            min: 1,
                            max:100
                        },   
                        foreman_fees: {
                            required: true,
                            min: 1,
                            max:100
                        },  
                         max_bid: {
                            required: true,
                            min: 1,
                            max:100
                        },  
                          
                          admission_fee: {
                            required: true,
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
            $("#total_month").on('change',function(){
                let start_month = $("#start_month").val();
                let total_month = $(this).val();
                let futureDate = convert(addMonths(new Date(start_month),total_month).toString());
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
        </script>
        
        <script>
            function addMonths(date, months) {
                var d = date.getDate();
                date.setMonth(date.getMonth() + +months);
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