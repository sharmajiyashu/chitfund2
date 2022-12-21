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
                        
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                                <strong>
                                    <?php echo $this->session->flashdata('success'); ?></strong></div>  <?php } ?>
                
                                    <?php if ($this->session->flashdata('Failure')) { ?>
                            <div class="alert alert-warning" style="clear:both;color: azure; background-color: green; border-color: #ebccd1 !important;">
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                            <strong>
                            <?php echo $this->session->flashdata('Failure'); ?></strong></div>  <?php } ?>
                        
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">GST List</h4>
                                </div> 
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/showGST" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add GST</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No </th>
                                            <th>GST Name </th>
                                            <th>Percentage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                        <?php $i = 1; foreach ($data as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo isset($value['name']) ? $value['name'] : ''; ?></td>
                                                <td><?php echo isset($value['gst_percentage']) ? $value['gst_percentage'] : ''; ?></td>
                                                 <td>
                                                      <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="<?php echo base_url(); ?>Dashboard/editGst/<?php echo isset($value['gst_id']) ? $value['gst_id'] : '';  ?>"><i class="ri-pencil-line mr-0"></i></a>
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
                <!-- Modal Edit -->
            </div>
        </div>
        
        <!-- Wrapper End-->
        <?php // footer   ?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>