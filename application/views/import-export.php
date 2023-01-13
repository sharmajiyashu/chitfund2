
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
                    <li class="active">Import/Export</li>
                  </ul>                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4>
                                          Import and Export 
                                        </h4>
                                    </div>
                                </div>
                                
                                 <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success" >
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                                <strong>
                                    <?php echo $this->session->flashdata('success'); ?></strong></div>  <?php } ?>
                
                                    <?php if ($this->session->flashdata('Failure')) { ?>
                            <div class="alert alert-warning" style="clear:both;color: azure; background-color: green; border-color: #ebccd1 !important;">
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                            <strong>
                            <?php echo $this->session->flashdata('Failure'); ?></strong></div>  <?php } ?>
                                
                                
                                <div class="card-body">
`                                <div class="row"> 
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Subscriber*</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import" style="margin-left: 4%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportSubscriber"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div>    
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Subscription *</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import1" style="margin-left: 3%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportSubscription"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Order *</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import2" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportOrder"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div> 

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Emi *</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#importEmi" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportEmi"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div> 

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Bids *</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#importBids" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportBids"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div> 

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Divident *</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#importDivident" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportDivident"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div>

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Chits*</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#importChits" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportDivident"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div>

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Transaction*</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#importTransaction" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportDivident"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div>

                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Other import*</label>
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#OtherImport" style="margin-left: 7%;">Import</a>
                                            <a href="<?php echo base_url(); ?>Dashboard/exportDivident"><button class="btn btn-primary">Export</button></a>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        
        <!--Subscriber Import-->
        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importSubscriber" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!--Subscriber Import EOC-->
        
        
        <!--Subscription Import-->
        <div class="modal fade" id="import1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importSubscription" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!--Subscription Import EOC-->


        <div class="modal fade" id="importEmi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importEmi" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <div class="modal fade" id="importBids" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importBids" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal fade" id="importDivident" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importDivident" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal fade" id="importChits" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importChits" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="importTransaction" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importTransaction" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="OtherImport" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/OtherImport" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Order Import-->
        <div class="modal fade" id="import2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Import</h4>
                            <form action="<?php echo base_url();?>Dashboard/importOrder" method="post" enctype="multipart/form-data">
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">CSV</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!--Order Import EOC-->

        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    </body>
</html>