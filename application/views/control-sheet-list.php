<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li class="active">Reports</li>
                  </ul>
                            
                    <div class="row">
                        <div class="col-lg-06">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Reports List <i style="color:blue;margin-left: 12px"><a href="<?php echo base_url(); ?>Dashboard/RefreshControl"><i class="fa fa-refresh"></i></a></i></h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-left:50%;">
                        <form action="<?php echo base_url(); ?>Dashboard/getControlSheetWithFilter" method="POST">
                            <select class="form-control" name="mnth_filter">
                                <option value="Jan"<?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Jan"){echo "selected";}?>>Jan</option>
                                <option value="Feb" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Feb"){echo "selected";}?> >Feb</option>
                                <option value="Mar" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Mar"){echo "selected";}?> >Mar</option>
                                <option value="Apr" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Apr"){echo "selected";}?> >Apr</option>
                                <option value="May" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "May"){echo "selected";}?> >May</option>
                                <option value="Jun" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Jun"){echo "selected";}?> >Jun</option>
                                <option value="Jul" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Jul"){echo "selected";}?> >Jul</option>
                                <option value="Aug" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Aug"){echo "selected";}?> >Aug</option>
                                <option value="Sep" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Sep"){echo "selected";}?> >Sep</option>
                                <option value="Oct" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Oct"){echo "selected";}?> >Oct</option>
                                <option value="Nov" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Nov"){echo "selected";}?> >Nov</option>
                                <option value="Dec" <?php if(isset($date_time['mnth_filter']) && $date_time['mnth_filter'] == "Dec"){echo "selected";}?> >Dec</option>
                            </select>
                        </div>
                        <div class="row" style="margin-left:1% ;">
                            <div class="col-md-6">
                                  <div class="form-group">
                                     <input type="number" class="form-control" placeholder="Enter Tenure"  required name="year" value="<?php echo isset($date_time['year']) ? $date_time['year'] :'' ?>">
                                 </div>
                             </div> 
                            <div class="form-group">
                              <button class="form-control" name="submit">Submit</button>  
                            </div>
                            
                                                              

                              
                        </div>
                     </form>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No.</th>
                                            <th>Subscriber Name</th>
                                            <th>Mobile</th>
                                            <th>Opening Balance</th>
                                            <th>Gross Emi Amt</th>
                                            <th>Share of Discount</th>
                                            <th>Net Curr Mth Due </th>
                                            <th>Chit Taken</th>
                                            <th>Other dues and payables</th>
                                            <th>Net Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if(isset($getControl) && is_array($getControl)) {
                                        // print_r($getControl);die; 
                                        ?>
                                        <?php $i=1; foreach($getControl as $key => $value){ ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value['member_name']) ? $value['member_name'] : ''; ?></td>
                                            <td><?php echo isset($value['member_mobile']) ? $value['member_mobile'] : ''; ?></td>
                                            <td><?php echo isset($value['opening_balance']) ? $value['opening_balance'] : '0'; ?></td>
                                            <td><?php echo isset($value['gross_emi_amount']) ? $value['gross_emi_amount'] : '0'; ?></td>
                                            <td><?php echo isset($value['share_of_discount']) ? $value['share_of_discount'] : '0'; ?></td>
                                            <td><?php echo isset($value['net_current_month_due']) ? $value['net_current_month_due'] : '0'; ?></td>
                                            <td><?php echo isset($value['chit_taken']) ? $value['chit_taken'] : '0'; ?></td>
                                            <td><?php //echo isset($value['Total_emi_due']) ? $value['Total_emi_due'] : ''; ?>0</td>
                                            <td><?php echo isset($value['net_amount']) ? $value['net_amount'] : '0'; ?></td>
                                            <td><?php echo isset($value['paid_amount']) ? $value['paid_amount'] : '0'; ?></td>
                                            <td><?php echo isset($value['balance_amount']) ? $value['balance_amount'] : '0'; ?></td>
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