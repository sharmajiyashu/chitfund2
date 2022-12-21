
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
                <div class="container-fluid add-form-list">
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Add Plans</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/add_store/<?php echo isset($getstore['id']) ? $getstore['id'] : '' ; ?>" method="post" data-toggle="validator">
                                        <div class="row"> 
                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Plan Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Name"  name="name" value="<?php echo isset($getstore['store_name']) ? $getstore['store_name'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('name'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Plan Id</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Group</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Plan Type</label>       
                                                    <select class="form-control"name="category">
                                                        <option>Fixed</option>
                                                        <option>Bid</option>
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Plan Amount</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tenture</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Start Month</label>
                                                    <input type="date" class="form-control" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Agent Commission</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>EMI</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Total Subscription</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Months Complete</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Month End</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Bid-Time</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Cum Div</label>
                                                    <input type="text" class="form-control" placeholder="Enter Domain"  name="domain" value="<?php echo isset($getstore['domain']) ? $getstore['domain'] : '' ;?>">
                                                     <div><font color='red'><?php echo form_error('domain'); ?></font></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>                                       
                                        </div>                            
                                        <button type="submit" class="btn btn-primary mr-2">Add Supplier</button>
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

                        name: {

                            required: true
                        },
                        domain: {
                            required: true
                        }

                    },
                    messages: {

                        name: {

                            required: "Enter Your name"
                        },
                        domain: {
                            required: "Enter Your Domain"
                        }
                    }

                });
            });
        </script>
    </body>
</html>