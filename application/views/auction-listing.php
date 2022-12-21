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
                    <li class="active">Auction Register</li>
                  </ul> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Auction List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No.</th>
                                            <th>Plane Name</th>
                                            <th>Group Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Auction No.</th>
                                            <th>Foreman Fee %</th>
                                            <th>Min.prize Amount</th>
                                            <!--<th>Winning Bid Amount</th>-->
                                            <th>Status</th>
                                            <th>Plan Amount</th>
                                            <th>Added Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if(isset($data) && is_array($data)) { ?>
                                        <?php $i=1; foreach($data as $key =>$value) {   ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value['plan_name']) ? $value['plan_name'] : '';?></td>
                                            <td><?php echo isset($value['group_name']) ? $value['group_name'] : '' ;?></td>
                                            <td><?php echo isset($value['start_date']) ? $value['start_date'] : '' ;?></td>
                                            <td><?php echo isset($value['end_date']) ? $value['end_date'] : '' ;?></td>
                                            <td><?php echo isset($value['start_time']) ? $value['start_time'] : '' ;?></td>
                                            <td><?php echo isset($value['end_time']) ? $value['end_time'] : '' ;?></td>
                                            <td><?php echo isset($value['auction_no']) ? $value['auction_no'] : '' ;?></td>
                                            <td><?php echo isset($value['foreman_fees']) ? $value['foreman_fees'] : '' ;?>%</td>
                                            <td><?php echo isset($value['min_prize_amount']) ? $value['min_prize_amount'] : '' ;?></td>
                                            <!--<td><?php echo isset($value['bid_amount']) ? $value['bid_amount'] : '' ;?></td>-->
                                            <?php if($value['status'] == '0'){ ?>
                                                <td>Auction Finished</td>
                                            <?php }elseif($value['status'] == '1'){?>
                                                <td>Active</td>
                                            <?php }elseif($value['status'] == '2'){ ?>
                                                <td>Upcoming</td>
                                            <?php }elseif($value['status'] == '3'){ ?>
                                                <td>Cancelled</td>
                                            <?php }else{ ?>
                                                <td>no.</td>
                                            <?php } ?>
                                            <td><?php echo isset($value['plan_amount']) ? $value['plan_amount'] : '' ;?></td>
                                            <td><?php echo isset($value['start_date']) ? $value['start_date'] : '' ;?></td>
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