
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
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">
                                          Add Collateral 
                                        </h4>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addCollateral" method="post" data-toggle="validator">
                                        <input type="hidden" name="collateral_id" value="" />  
                                         <div class="row"> 
                                            <div class="col-md-12">                 
                                                <div class="form-group">
                                                    <?php $getMainCollateral = $this->db->where('parent_id',0)->get('tbl_collateral_master')->result_array(); ?>
                                                    <label>Parent Id *</label>
                                                    <select class="form-control" name="parent_id">
                                                        <option value="">Select Type</option>
                                                     <?php if(isset($getMainCollateral) && is_array($getMainCollateral)) { ?>
                                                     <?php foreach($getMainCollateral as $key => $value) {  ?>
                                                        <option value="<?php echo isset($value['collateral_id']) ? $value['collateral_id'] : ''; ?>"><?php echo isset($value['name']) ? $value['name'] : ''; ?></option>
                                                     <?php } ?>
                                                     <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Collateral Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter collateral_name" required  name="collateral_name" name="collateral_name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                                                </div>
                                            </div>  
                                            <div class="col-md-12">                 
                                                <div class="form-group">
                                                    <label>Collateral Description *</label>
                                                    <textarea class="form-control" placeholder="Description"   name="description"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>     
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Add Collateral </button>
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
    </body>
</html>