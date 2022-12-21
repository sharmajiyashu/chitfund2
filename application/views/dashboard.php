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
                    <li class="active">Home</li>
                  </ul> 
                    
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">Dashboard</div>
                        <div class="col-md-12">
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
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="card card-block card-stretch card-height">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3 card-total-sale">
                                                <div class="icon iq-icon-box-2 bg-info-light">
                                                    <img src="<?php echo base_url(); ?>assets/assets/images/product/1.png" class="img-fluid" alt="image">
                                                </div>
                                                <div>
                                                    <p class="mb-2">Total Subscriber</p>
                                                    <?php $Totalmember = $this->db->get('tbl_members')->num_rows();  ?>
                                                    <h4><?php echo isset($Totalmember) ? $Totalmember : '0'; ?></h4>
                                                </div>
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card card-block card-stretch card-height">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                                <div class="icon iq-icon-box-2 bg-danger-light">
                                                    <img src="<?php echo base_url(); ?>assets/assets/images/product/2.png" class="img-fluid">
                                                </div>
                                                <div>
                                                    <p class="mb-2">Total Subscription</p>
                                                    <?php $plan =  $this->db->get('tbl_plans')->num_rows();  ?>
                                                    <h4><?php echo isset($plan) ? $plan : '0';  ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="card card-block card-stretch card-height">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3 card-total-sale">
                                                <div class="icon iq-icon-box-2 bg-success-light">
                                                    <img src="<?php echo base_url(); ?>assets/assets/images/product/3.png" class="img-fluid" alt="image">
                                                </div>
                                                <?php $total_dues = $this->db->where('emi_status','due')->get('tbl_emi')->num_rows();?>
                                                <div>
                                                    <p class="mb-2">Total Dues</p>
                                                    <h4><?php echo isset($total_dues) ? $total_dues : 0; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="col-lg-3 col-md-3">
                                    <div class="card card-block card-stretch card-height">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3 card-total-sale">
                                                <div class="icon iq-icon-box-2 bg-success-light">
                                                    <img src="<?php echo base_url(); ?>assets/assets/images/product/3.png" class="img-fluid" alt="image">
                                                </div>
                                                <?php $date = date('M,Y'); ?>
                                                <?php $total_dues = $this->db->where('emi_status','due')->where('emi_month',$date)->get('tbl_emi')->num_rows();?>
                                                <div>
                                                    <p class="mb-2">Net Current Month Due</p>
                                                    <h4><?php echo isset($total_dues) ? $total_dues : 0; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--<div class="col-lg-6">-->
                        <!--    <div class="card card-block card-stretch card-height">-->
                        <!--        <div class="card-header d-flex justify-content-between">-->
                        <!--            <div class="header-title">-->
                        <!--                <h4 class="card-title">Overview</h4>-->
                        <!--            </div>                        -->
                        <!--            <div class="card-header-toolbar d-flex align-items-center">-->
                        <!--                <div class="dropdown">-->
                        <!--                    <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001"-->
                        <!--                          data-toggle="dropdown">-->
                        <!--                        This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                        <!--                    </span>-->
                        <!--                    <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                        <!--                         aria-labelledby="dropdownMenuButton001">-->
                        <!--                        <a class="dropdown-item" href="#">Year</a>-->
                        <!--                        <a class="dropdown-item" href="#">Month</a>-->
                        <!--                        <a class="dropdown-item" href="#">Week</a>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>                    -->
                    <!--            <div class="card-body">-->
                    <!--                <div id="layout1-chart1"></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-6">-->
                    <!--        <div class="card card-block card-stretch card-height">-->
                    <!--            <div class="card-header d-flex align-items-center justify-content-between">-->
                    <!--                <div class="header-title">-->
                    <!--                    <h4 class="card-title">Revenue Vs Cost</h4>-->
                    <!--                </div>-->
                    <!--                <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                    <div class="dropdown">-->
                    <!--                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton002"-->
                    <!--                              data-toggle="dropdown">-->
                    <!--                            This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                    <!--                        </span>-->
                    <!--                        <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                    <!--                             aria-labelledby="dropdownMenuButton002">-->
                    <!--                            <a class="dropdown-item" href="#">Yearly</a>-->
                    <!--                            <a class="dropdown-item" href="#">Monthly</a>-->
                    <!--                            <a class="dropdown-item" href="#">Weekly</a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="card-body">-->
                    <!--                <div id="layout1-chart-2" style="min-height: 360px;"></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-8">-->
                    <!--        <div class="card card-block card-stretch card-height">-->
                    <!--            <div class="card-header d-flex align-items-center justify-content-between">-->
                    <!--                <div class="header-title">-->
                    <!--                    <h4 class="card-title">Top Products</h4>-->
                    <!--                </div>-->
                    <!--                <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                    <div class="dropdown">-->
                    <!--                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"-->
                    <!--                              data-toggle="dropdown">-->
                    <!--                            This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                    <!--                        </span>-->
                    <!--                        <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                    <!--                             aria-labelledby="dropdownMenuButton006">-->
                    <!--                            <a class="dropdown-item" href="#">Year</a>-->
                    <!--                            <a class="dropdown-item" href="#">Month</a>-->
                    <!--                            <a class="dropdown-item" href="#">Week</a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="card-body">-->
                    <!--                <ul class="list-unstyled row top-product mb-0">-->
                    <!--                    <li class="col-lg-3">-->
                    <!--                        <div class="card card-block card-stretch card-height mb-0">-->
                    <!--                            <div class="card-body">-->
                    <!--                                <div class="bg-warning-light rounded">-->
                    <!--                                    <img src="../assets/images/product/01.png" class="style-img img-fluid m-auto p-3" alt="image">-->
                    <!--                                </div>-->
                    <!--                                <div class="style-text text-left mt-3">-->
                    <!--                                    <h5 class="mb-1">Organic Cream</h5>-->
                    <!--                                    <p class="mb-0">789 Item</p>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                    <!--                    <li class="col-lg-3">-->
                    <!--                        <div class="card card-block card-stretch card-height mb-0">-->
                    <!--                            <div class="card-body">-->
                    <!--                                <div class="bg-danger-light rounded">-->
                    <!--                                    <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">-->
                    <!--                                </div>-->
                    <!--                                <div class="style-text text-left mt-3">-->
                    <!--                                    <h5 class="mb-1">Rain Umbrella</h5>-->
                    <!--                                    <p class="mb-0">657 Item</p>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                    <!--                    <li class="col-lg-3">-->
                    <!--                        <div class="card card-block card-stretch card-height mb-0">-->
                    <!--                            <div class="card-body">-->
                    <!--                                <div class="bg-info-light rounded">-->
                    <!--                                    <img src="../assets/images/product/03.png" class="style-img img-fluid m-auto p-3" alt="image">-->
                    <!--                                </div>-->
                    <!--                                <div class="style-text text-left mt-3">-->
                    <!--                                    <h5 class="mb-1">Serum Bottle</h5>-->
                    <!--                                    <p class="mb-0">489 Item</p>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                    <!--                    <li class="col-lg-3">-->
                    <!--                        <div class="card card-block card-stretch card-height mb-0">-->
                    <!--                            <div class="card-body">-->
                    <!--                                <div class="bg-success-light rounded">-->
                    <!--                                    <img src="../assets/images/product/02.png" class="style-img img-fluid m-auto p-3" alt="image">-->
                    <!--                                </div>-->
                    <!--                                <div class="style-text text-left mt-3">-->
                    <!--                                    <h5 class="mb-1">Organic Cream</h5>-->
                    <!--                                    <p class="mb-0">468 Item</p>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                    <!--                </ul>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-4">  -->
                    <!--        <div class="card-transparent card-block card-stretch mb-4">-->
                    <!--            <div class="card-header d-flex align-items-center justify-content-between p-0">-->
                    <!--                <div class="header-title">-->
                    <!--                    <h4 class="card-title mb-0">Best Item All Time</h4>-->
                    <!--                </div>-->
                    <!--                <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                    <div><a href="#" class="btn btn-primary view-btn font-size-14">View All</a></div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="card card-block card-stretch card-height-helf">-->
                    <!--            <div class="card-body card-item-right">-->
                    <!--                <div class="d-flex align-items-top">-->
                    <!--                    <div class="bg-warning-light rounded">-->
                    <!--                        <img src="../assets/images/product/04.png" class="style-img img-fluid m-auto" alt="image">-->
                    <!--                    </div>-->
                    <!--                    <div class="style-text text-left">-->
                    <!--                        <h5 class="mb-2">Coffee Beans Packet</h5>-->
                    <!--                        <p class="mb-2">Total Sell : 45897</p>-->
                    <!--                        <p class="mb-0">Total Earned : $45,89 M</p>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="card card-block card-stretch card-height-helf">-->
                    <!--            <div class="card-body card-item-right">-->
                    <!--                <div class="d-flex align-items-top">-->
                    <!--                    <div class="bg-danger-light rounded">-->
                    <!--                        <img src="../assets/images/product/05.png" class="style-img img-fluid m-auto" alt="image">-->
                    <!--                    </div>-->
                    <!--                    <div class="style-text text-left">-->
                    <!--                        <h5 class="mb-2">Bottle Cup Set</h5>-->
                    <!--                        <p class="mb-2">Total Sell : 44359</p>-->
                    <!--                        <p class="mb-0">Total Earned : $45,50 M</p>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>            -->
                    <!--    <div class="col-lg-4">  -->
                    <!--        <div class="card card-block card-stretch card-height-helf">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="d-flex align-items-top justify-content-between">-->
                    <!--                    <div class="">-->
                    <!--                        <p class="mb-0">Income</p>-->
                    <!--                        <h5>$ 98,7800 K</h5>-->
                    <!--                    </div>-->
                    <!--                    <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                        <div class="dropdown">-->
                    <!--                            <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton003"-->
                    <!--                                  data-toggle="dropdown">-->
                    <!--                                This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                    <!--                            </span>-->
                    <!--                            <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                    <!--                                 aria-labelledby="dropdownMenuButton003">-->
                    <!--                                <a class="dropdown-item" href="#">Year</a>-->
                    <!--                                <a class="dropdown-item" href="#">Month</a>-->
                    <!--                                <a class="dropdown-item" href="#">Week</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div id="layout1-chart-3" class="layout-chart-1"></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="card card-block card-stretch card-height-helf">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="d-flex align-items-top justify-content-between">-->
                    <!--                    <div class="">-->
                    <!--                        <p class="mb-0">Expenses</p>-->
                    <!--                        <h5>$ 45,8956 K</h5>-->
                    <!--                    </div>-->
                    <!--                    <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                        <div class="dropdown">-->
                    <!--                            <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton004"-->
                    <!--                                  data-toggle="dropdown">-->
                    <!--                                This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                    <!--                            </span>-->
                    <!--                            <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                    <!--                                 aria-labelledby="dropdownMenuButton004">-->
                    <!--                                <a class="dropdown-item" href="#">Year</a>-->
                    <!--                                <a class="dropdown-item" href="#">Month</a>-->
                    <!--                                <a class="dropdown-item" href="#">Week</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div id="layout1-chart-4" class="layout-chart-2"></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-8">  -->
                    <!--        <div class="card card-block card-stretch card-height">-->
                    <!--            <div class="card-header d-flex justify-content-between">-->
                    <!--                <div class="header-title">-->
                    <!--                    <h4 class="card-title">Order Summary</h4>-->
                    <!--                </div>                        -->
                    <!--                <div class="card-header-toolbar d-flex align-items-center">-->
                    <!--                    <div class="dropdown">-->
                    <!--                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton005"-->
                    <!--                              data-toggle="dropdown">-->
                    <!--                            This Month<i class="ri-arrow-down-s-line ml-1"></i>-->
                    <!--                        </span>-->
                    <!--                        <div class="dropdown-menu dropdown-menu-right shadow-none"-->
                    <!--                             aria-labelledby="dropdownMenuButton005">-->
                    <!--                            <a class="dropdown-item" href="#">Year</a>-->
                    <!--                            <a class="dropdown-item" href="#">Month</a>-->
                    <!--                            <a class="dropdown-item" href="#">Week</a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div> -->
                    <!--            <div class="card-body pb-2">-->
                    <!--                <div class="d-flex flex-wrap align-items-center mt-2">-->
                    <!--                    <div class="d-flex align-items-center progress-order-left">-->
                    <!--                        <div class="progress progress-round m-0 orange conversation-bar" data-percent="46">-->
                    <!--                            <span class="progress-left">-->
                    <!--                                <span class="progress-bar"></span>-->
                    <!--                            </span>-->
                    <!--                            <span class="progress-right">-->
                    <!--                                <span class="progress-bar"></span>-->
                    <!--                            </span>-->
                    <!--                            <div class="progress-value text-secondary">46%</div>-->
                    <!--                        </div>-->
                    <!--                        <div class="progress-value ml-3 pr-5 border-right">-->
                    <!--                            <h5>$12,6598</h5>-->
                    <!--                            <p class="mb-0">Average Orders</p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="d-flex align-items-center ml-5 progress-order-right">-->
                    <!--                        <div class="progress progress-round m-0 primary conversation-bar" data-percent="46">-->
                    <!--                            <span class="progress-left">-->
                    <!--                                <span class="progress-bar"></span>-->
                    <!--                            </span>-->
                    <!--                            <span class="progress-right">-->
                    <!--                                <span class="progress-bar"></span>-->
                    <!--                            </span>-->
                    <!--                            <div class="progress-value text-primary">46%</div>-->
                    <!--                        </div>-->
                    <!--                        <div class="progress-value ml-3">-->
                    <!--                            <h5>$59,8478</h5>-->
                    <!--                            <p class="mb-0">Top Orders</p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="card-body pt-0">-->
                    <!--                <div id="layout1-chart-5"></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>