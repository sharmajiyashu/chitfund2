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
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-lg-12">
                            
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
                            
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Transcation Type List</h4>
                                </div>
                                <!--<div style="">-->
                                <!--  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import"><i class="las la-plus mr-2"></i>Import</a>-->
                                <!--</div>-->
                        
                                <!--<div style="margin-left: 10px;">-->
                                <!--    <a href="<?php echo base_url();?>Dashboard/exportSubscription" class="btn btn-primary"><i class="las la-plus mr-2"></i>Export</a>-->
                                <!--</div>-->
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/add_transcation_type_master" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Transcation Type</a>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Subscriber Money Refind</th>
                                            <th>Prized Money Payment</th>
                                            <th>Expenses</th>
                                            <th>Salary</th>
                                            <th>Rent</th>
                                            <th>Bank Charges</th>
                                            <th>Other Payment</th>
                                            <th>Subscriber Money Received</th>
                                            <th>Other Receipt</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($getPlans as $key => $value) {    
                                            ?>
                                                <tr>
                                                    <td> <?php echo $i; ?><</td>
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
    </body>
</html>