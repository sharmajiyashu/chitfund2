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
                    <li><a href="#">Master </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Employee</li>
                  </ul> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Master Employee List</h4>
                                </div>
                                 <a href="<?php echo base_url(); ?>Dashboard/Employee" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Employee </a>
                            </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Position</th>
                                            <th>Salary</th>
                                            <th>Description</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if(isset($data) && is_array($data)){ ?>
                                        <?php $i=1; foreach($data as $key => $value) {  ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value['name']) ? $value['name'] : ''; ?></td>
                                            <td><?php echo isset($value['code']) ? $value['code'] : ''; ?></td>
                                            <td><?php echo isset($value['position']) ? $value['position'] : ''; ?></td>
                                            <td><?php echo isset($value['salary']) ? $value['salary'] : ''; ?></td>
                                            <td><?php echo isset($value['description']) ? $value['description'] : ''; ?></td>
                                            <td>
                                              <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="<?php echo base_url(); ?>Dashboard/MasterEmployeeEdit/<?php echo isset($value['master_employee_id']) ? $value['master_employee_id'] : '';  ?>"><i class="ri-pencil-line mr-0"></i></a>
                                              <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="<?php echo base_url(); ?>Dashboard/MasterEmployeeDelete/<?php echo isset($value['master_employee_id']) ? $value['master_employee_id'] : '';  ?>"><i class="ri-delete-bin-line mr-0"></i></a>    
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
    </body>
</html>