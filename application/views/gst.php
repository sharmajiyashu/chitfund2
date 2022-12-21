
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
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <?php if(!empty($data['gst_id'])){ ?> 
                                             Edit G.S.T 
                                        <?php } else{ ?>
                                             Add G.S.T 
                                        <?php } ?> 
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addGST" method="post" data-toggle="validator">
                                        <input type="hidden" name="id" value="<?php echo isset($data['gst_id']) ? $data['gst_id'] : '';  ?>">
                                         <div class="row"> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label> Name  *</label>
                                                    <input type="text" class="form-control" placeholder="Enter  Name "  required name="tax"  name="tax" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                                                </div>
                                            </div>   
                                         
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label> G.S.T  *</label>
                                                    <input type="text" class="form-control" placeholder="Enter G.S.T in percentage %"  required name="gst_percentage"  name="gst_percentage" value="<?php echo isset($data['gst_percentage']) ? $data['gst_percentage'] : ''; ?>">
                                                </div>
                                            </div>   
                                        
                                            <!--<?php //if(!empty($data['gst_percentage'])){ ?> -->
                                            <!-- <div class="col-md-6">                      -->
                                            <!--    <div class="form-group">-->
                                            <!--        <label>Available G.S.T  *</label>-->
                                            <!--        <input type="text" readonly class="form-control" placeholder="Enter G.S.T in percentage %"  required name=""  name="admission_fee" value="<?php echo isset($data['gst_percentage']) ? $data['gst_percentage'] : ''; ?>">-->
                                            <!--    </div>-->
                                            <!--</div> -->
                                            <!--<?php // }?>-->
                                        </div>     
                                        <?php if(!empty($data['gst_id'])){ ?> 
                                            <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Update G.S.T </button> 
                                        <?php } else{ ?>  
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">  Add G.S.T </button>
                                        <?php } ?>
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
                          gst_percentage: {
                            required: true,
                            min: 1,
                            max:100
                        },
                    },
                    messages: {
                         gst_percentage: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 

                    }

                });
            });
        </script>
    </body>
</html>