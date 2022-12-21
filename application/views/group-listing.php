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
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Group Listing</h4>
                                </div>
                                <!-- <a href="<?php echo base_url(); ?>Dashboard/add_sale" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sale</a> -->
                            </div>
                        </div>
                                                                                 
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">                                           
                                            <th>S.No.</th>
                                            <th>Group Name</th>
                                            <!--<th>No.Of Users</th>                                            -->
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">

                                    <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value) {    ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url(); ?>Dashboard/getgroupdetail/<?php echo isset($value['group_id']) ? $value['group_id'] : ''; ?>" style="color: black;"><?php echo $i ; ?></a></td>
                                                    <td><a href="<?php echo base_url(); ?>Dashboard/getgroupdetail/<?php echo isset($value['group_id']) ? $value['group_id'] : ''; ?>" style="color: black;"><?php echo isset($value['group_name'])? $value['group_name'] : '' ; ?></a></td>
                                                    <!--<td><a href="<?php echo base_url(); ?>Dashboard/getgroupdetail/<?php echo isset($value['group_id']) ? $value['group_id'] : ''; ?>" style="color: black;"><?php echo isset($value['total_members'])? $value['total_members'] : '' ;  ?></a></td>-->
                                            <!--        <td>-->
                                            <!--    <div class="d-flex align-items-center list-action">-->
                                            <!--        <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"-->
                                            <!--           href="<?php echo base_url(); ?>Dashboard/getgroupdetail/<?php echo isset($value['group_id']) ? $value['group_id'] : ''; ?>"><i class="ri-eye-line mr-0"></i></a>                                                   -->
                                            <!--    </div>-->
                                            <!--</td>                                                   -->
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
                <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <div class="media align-items-top justify-content-between">                            
                                        <h3 class="mb-3">Product</h3>
                                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                                    </div>
                                    <div class="content edit-notes">
                                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>
                                                </div>
                                                <div id="quill-toolbar1">
                                                    <p>Virtual Digital Marketing Course every week on Monday, Wednesday and Saturday.Virtual Digital Marketing Course every week on Monday</p>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0">
                                                <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                                    <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                                    <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>