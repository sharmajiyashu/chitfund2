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
                    <div class="row">
                        <div class="col-lg-12">
                            <!--<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">-->
                            <!--    <div>-->
                            <!--        <h4 class="mb-3">Daily Reconciliation Summary</h4>-->
                            <!--    </div>-->
                                
                            <!--</div>-->
                            <form action="<?php echo base_url(); ?>Report/DailtReconcilition" method="POST">
                            <div class="row">
                                <div class ="col-md-6">
                                    <h4 class="mb-3">Daily Reconciliation Summary</h4>
                                </div>
                                
                                 <div class="col-md-1" >
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
                                <div class="col-md-1">
                                      <div class="form-group">
                                         <input type="number" class="form-control" placeholder="Enter Tenure"  required name="year" value="<?php echo isset($date_time['year']) ? $date_time['year'] :'' ?>">
                                         <input type="hidden" name="member_id" value="<?php echo isset($member_detail['member_id'])?$member_detail['member_id']:'' ?>">
                                     </div>
                                 </div> 
                                <div class="col-md-1">
                                    <div class="form-group">
                                      <button class="form-control" name="submit">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                             <div class="table-responsive rounded mb-3">
                                <table id="example1" class=" table mb-0 tbl-server-info" style="width:100%">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <!--<th>Date</th>-->
                                            <th>Date</th>
                                            <th>Opening Bank <br> Balance</th>
                                            <th>Opening Cash <br> Balance</th>
                                            <th>Total <br> Balance</th>
                                            <th>-</th>
                                            <th>Closing Bank <br>Balance</th>
                                            <th>Closing Cash <br> Balance</th>
                                            <th>Total <br>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php 
                                            if(!empty($reverce_array)){
                                                foreach($reverce_array as $key=>$val){ ?>
                                                   <tr>
                                                       <!--<td>1</td>-->
                                                        <td><?php echo isset($val['full_date']) ? $val['full_date'] :''; ?></td>
                                                        <td><?php echo isset($val['opening_bank_balance']) ? $val['opening_bank_balance'] :''; ?></td>
                                                        <td><?php echo isset($val['opening_cash_balance']) ? $val['opening_cash_balance'] :''; ?></td>
                                                        <td><?php echo isset($val['total_opening_balance']) ? $val['total_opening_balance'] :''; ?></td>
                                                        <td>-</td>
                                                        <td><?php echo isset($val['closing_bank_balance']) ? $val['closing_bank_balance'] :''; ?></td>
                                                        <td><?php echo isset($val['closing_cash_balance']) ? $val['closing_cash_balance'] :''; ?></td>
                                                        <td><?php echo isset($val['total_closing_balance']) ? $val['total_closing_balance'] :''; ?></td>
                                                        
                                                    </tr>
                                           <?php      }
                                            }
                                            
                                        ?>
                                        
                                        
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
    <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );
            } );
            
              $(document).ready(function() {
                $('#example1').DataTable( {
                    "order": [[ 0, "desc" ]]
                } );
            } );
        </script>    
        
        
        
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>