
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
                    <li><a href="#">Master </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/ledgerTypeList') ?>">Ledger Account </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Add Ledger Account</li>
                  </ul> 
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <?php $id = isset($getLedger['id']) ? $getLedger['id'] : ''; ?>
                                        <h4 class="card-title">
                                        <?php if($id == ''){ ?>
                                             Add Ledger Account 
                                        <?php }else{ ?>
                                           Edit Ledger Account 
                                        <?php } ?>
                                        </h4>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addLedgerType" method="post" data-toggle="validator">
                                        <input type="hidden" name="id" value="<?php echo isset($getLedger['id']) ? $getLedger['id'] : ''; ?>">
                                         <div class="row"> 
                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter name" required  name="name" value="<?php echo isset($getLedger['name']) ? $getLedger['name'] : ''; ?>">
                                                </div>
                                            </div> 
                                            <div class="col-md-12">                 
                                                <div class="form-group">
                                                    <label>Code *</label>
                                                    <input type="text" class="form-control" placeholder="Code" required  name="code" value="<?php echo isset($getLedger['code']) ? $getLedger['code'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">                 
                                                <div class="form-group">
                                                    <label>Description *</label>
                                                    <textarea class="form-control" placeholder="Description"   name="description"><?php echo isset($getLedger['description']) ? $getLedger['description'] : ''; ?></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>     
                                        <?php if($id == '') { ?>
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Add Ledger Account </button>
                                        <?php }else{ ?>
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Edit Ledger Account </button>
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
    </body>
</html>