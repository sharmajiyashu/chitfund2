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
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li class="active">Agents</li>
                      </ul>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Agent List</h4>
                                    
                                </div>
                                <a href="<?php echo base_url(); ?>Dashboard/addAgent" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Agent</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class=" rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info table-responsive">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No.</th>
                                            <th>Agent Name</th>
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Address</th>
                                            <!--<th>GST No.</th>-->
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Added Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if(isset($get_supplier) && is_array($get_supplier)) { ?>
                                        <?php $i=1; foreach($get_supplier as $key => $value) {   ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value->first_name) ? $value->first_name : '' ;?> <?php echo isset($value->last_name)? $value->last_name : '' ;?></td>
                                            <td><?php echo isset($value->company)? $value->company : '' ;?></td>
                                            <td><?php echo isset($value->email)? $value->email : '' ;?></td>
                                            <td><?php echo isset($value->phone) ? $value->phone : '' ;?></td>
                                            <td><?php echo isset($value->address) ? $value->address : '' ;?></td>
                                            <!--<td><?php echo isset($value->gst_no) ? $value->gst_no : '' ;?></td>-->
                                            <td><?php echo isset($value->city) ? $value->city : '' ;?></td>
                                            <td><?php echo isset($value->state) ? $value->state : '' ;?></td>
                                            <td><?php echo isset($value->country)? $value->country : '' ;?></td>
                                           <?php if ($value->status == 'Active') { ?>
                                                <td><a href="<?php echo base_url(); ?>Dashboard/change_status_agent/<?php echo isset($value->agent_id) ? $value->agent_id : ''; ?>"><b style="color: green"><?php echo isset($value->status) ? $value->status : ''; ?></b></a></td>
                                            <?php } else { ?>
                                                <td><a href="<?php echo base_url(); ?>Dashboard/change_status_agent/<?php echo isset($value->agent_id) ? $value->agent_id : ''; ?>"><b style="color: red"><?php echo isset($value->status) ? $value->status : ''; ?></b></a></td>
                                            <?php } ?>
                                            <td><?php echo isset($value->added_date)? $value->added_date : '' ; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                     <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                     href="<?php echo base_url(); ?>Dashboard/agentUpdate/<?php echo isset($value->agent_id) ? $value->agent_id :''; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                                     <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                     class="data-delete" href="<?php echo base_url(); ?>Dashboard/agentDelete/<?php echo isset($value->agent_id) ? $value->agent_id : ''; ?>"><i class="ri-delete-bin-line mr-0"></i></a>                                                      
                                                </div>
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
            </div>
        </div>
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