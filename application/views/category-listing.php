
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
                                    <h4 class="mb-3">Category List</h4>
                                </div>
                                <a href="<?php echo base_url(); ?>Dashboard/add_category" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No.</th>
                                            <th>Category</th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($get_category) && is_array($get_category)) { ?>
                                            <?php
                                            $i = 1;
                                            foreach ($get_category as $key => $value) {
                                                ?>
                                                <tr>  
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo isset($value['category_name']) ? $value['category_name'] : ''; ?></td>
                                                    <?php if ($value['status'] == 'Active') { ?>
                                                        <td><a href="<?php echo base_url(); ?>Dashboard/change_status_category/<?php echo isset($value['id']) ? $value['id'] : ''; ?>"><b style="color: green"><?php echo isset($value['status']) ? $value['status'] : ''; ?></b></a></td>
                                                    <?php } else { ?>
                                                        <td><a href="<?php echo base_url(); ?>Dashboard/change_status_category/<?php echo isset($value['id']) ? $value['id'] : ''; ?>"><b style="color: red"><?php echo isset($value['status']) ? $value['status'] : ''; ?></b></a></td>
                                                    <?php } ?>

                                                    <td>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a href="<?php echo base_url(); ?>Dashboard/category_update/<?php echo isset($value['id']) ? $value['id'] : ''; ?>" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                               ><i class="ri-pencil-line mr-0"></i></a>
                                                            <a href="<?php echo base_url(); ?>Dashboard/category_delete/<?php echo isset($value['id']) ? $value['id'] : ''; ?>" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                               class="data-delete" ><i class="ri-delete-bin-line mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
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
        <?php // footer   ?>
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