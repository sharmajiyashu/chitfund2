<!doctype html>
<html lang="en">
<style>
    .error{color: red};
</style>
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
                <div class="container-fluid add-form-list">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li><a href="<?php echo base_url('Dashboard/agent_listing');?>">Agents </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li class="active"><?php if(isset($data['agent_id'])){ ?> Update Agent <?php } else{?> Add Agent <?php } ?></h4> </li>
                      </ul>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title"><?php if(isset($data['agent_id'])){ ?> Update Agent <?php } else{?> Add Agent <?php } ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addAgent" method="post" data-toggle="validator">
                                            <input type="hidden" name="agent_id" value="<?php echo isset($data['agent_id']) ? $data['agent_id'] : '' ;  ?>" />  
                                         <div class="row"> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>First Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Name"  name="fname" value="<?php echo isset($data['first_name']) ? $data['first_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('fname'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Last Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Last "  name="lname" value="<?php echo isset($data['last_name']) ? $data['last_name'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('lname'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email"  name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('email'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone Number"  name="phone" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
                                                    <div><font color='red'><?php echo form_error('phone_no'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>GST Number *</label>-->
                                            <!--        <input type="text" class="form-control" placeholder="Enter GST Number"  name="gst_no" value="<?php echo isset($data['gst_no']) ? $data['gst_no'] : ''; ?>">-->
                                            <!--        <div><font color='red'><?php echo form_error('gst_no'); ?></font></div>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Company *</label>-->
                                            <!--        <input type="text" class="form-control" placeholder="Enter Company"  name="company" value="<?php echo isset($data['company']) ? $data['company'] : ''; ?>">-->
                                            <!--        <div><font color='red'><?php echo form_error('company_name'); ?></font></div>-->
                                            <!--        <div class="help-block with-errors"></div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Payment Terms *</label>-->
                                            <!--        <textarea class="form-control" rows="4" name="payment_terms" ><?php echo isset($data['payment_terms']) ? $data['payment_terms'] : ''; ?></textarea>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" rows="4" name="address" ><?php echo isset($data['address']) ? $data['address'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>City *</label>
                                                    <input type="text" class="form-control" placeholder="Enter City"   name="city" value="<?php echo isset($data['city']) ? $data['city'] : ''; ?>" >
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>State *</label>
                                                    <input type="text" class="form-control" placeholder="Enter State"  name="state" value="<?php echo isset($data['state']) ? $data['state'] : ''; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Country *</label> 
                                                    <input type="text" class="form-control" placeholder="Enter Country"  name="country" value="<?php echo isset($data['country']) ? $data['country'] : ''; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>    
                                        <?php $agent_id = isset($data['agent_id']) ? $data['agent_id'] : '';?>
                                       <?php if($agent_id == ''){ ?>
                                        <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Add Agent</button>
                                      <?php }else{ ?>
                                         <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Update Agent</button>
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

                        fname: {

                            required: true
                        },
                        lname: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            minlength: 10
                        },
                        gst_no: {
                            required: true,
                            minlength: 15
                        },
                        company: {
                            required: true
                        },
                        payment_terms: {
                            required: true
                        },
                        city: {
                            required: true
                        },
                        state: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        country: {
                            required: true
                        }


                    },
                    messages: {

                        fname: {

                            required: "Enter Your First name"
                        },
                        lname: {
                            required: "Enter Your Last Name"
                        },
                        email: {
                            required: "Enter Your Email",
                            email: "Please Enter Valid E-mail"
                        },
                        phone: {
                            required: "Enter Your Phone No.",
                            minlength: "Please minimum 10 Digit only",
                        },
                        gst_no: {
                            required: "Enter Your GST No.",
                            minlength: "Please minimum 15 Digit only",
                        },
                        company: {
                            required: "Enter Your Company Name"
                        },
                        payment_terms :{
                            required : "Please payment terms filled"
                        },
                        city:{
                            required: "Enter your city"
                        },
                        state:{
                            required: "Enter your state"
                        },
                        address:{
                            required: "Enter your address"
                        },
                        country : {
                            required : "Enter your country"
                        }

                    }

                });
            });
        </script>
    </body>
</html>