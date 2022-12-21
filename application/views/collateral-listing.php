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
                        <li class="active">Collateral </li>
                      </ul>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Collateral List</h4>
                                </div>
                                <a href="<?php echo base_url(); ?>Dashboard/addCollateral" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Collateral</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Parent Category</th>
                                            <th>Added Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if(isset($getCollateral) && is_array($getCollateral)) { ?>
                                        <?php $i=1; foreach($getCollateral as $key => $value) { 
                                          $getSubCollateral = $this->db->where('collateral_id',$value['parent_id'])->get('tbl_collateral_master')->row_array();
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value['name']) ? $value['name'] : '' ;?> </td>
                                            <td><?php echo isset($value['description'])? $value['description'] : '' ;?></td>
                                            <td><?php echo isset($getSubCollateral['name'])? $getSubCollateral['name'] : '' ;?></td>
                                            <td><?php echo isset($value['added_date'])? $value['added_date'] : '' ; ?></td>
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