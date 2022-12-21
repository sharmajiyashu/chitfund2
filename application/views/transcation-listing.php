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
                    <li class="active">Transaction list</li>
                  </ul>      
                    <div class="row">
                        <div class="col-lg-12">
                            
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
                            
                                <div class = 'row'> 
                                    <div class="col-md-2"> <h4>Transaction list</h4> </div>
                                    
                                    <div class="col-md-1">
                                         <form action="<?php echo base_url(); ?>Dashboard/transcation_list" method="POST">
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
                                             <input type="number" class="form-control" placeholder="Year"  required name="year" value="<?php echo isset($date_time['year']) ? $date_time['year'] :'' ?>">
                                         </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <select class="form-control" name="Transcation_type">
                                                    <option value="">(Select Transcation Type)</option>
                                                    <option value="bank">Bank</option>
                                                    <option value="subscriber money">Subscriber Money</option>
                                                    <option value="service provider">service Provider</option>
                                         </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="transcation_for">
                                                    <option value="">(Select Transcation For)</option>
                                                    <option value="pay_emi">Emi Payed</option>
                                                    <option value="Chit Handover">Chit Handover</option>
                                                    <option value="others">Others</option>
                                         </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="payment_type">
                                                    <option value="">(Select Payment Type)</option>
                                                    <option value="payment">Payment</option>
                                                    <option value="receipt">Reciept</option>
                                         </select>
                                    </div>
                                    <div class="form-group">
                                      <button class="form-control" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        
                        <div class="col-lg-12">
                            <div class=" rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info table-responsive">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction For</th>
                                            <th>Transaction Type</th>
                                            <th>Payment Mode</th>
                                            <th>Payment Type</th>
                                            <th>Member Name</th>
                                            <th>Service Provider Name</th>
                                            <th>Cheque Number</th>
                                            <th>Is Gst</th>
                                            <th>Gst % </th>
                                            <th>Transaction Amount</th>
                                            <th>Final Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $value) {    
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo isset($value['added_date']) ? $value['added_date'] :''; ?></td>
                                                    <td><?php echo isset($value['transaction_for']) ? $value['transaction_for'] :''; ?></td>
                                                    <td><?php echo isset($value['transaction_type']) ? $value['transaction_type'] :''; ?></td>
                                                    <td><?php echo isset($value['payment_mode']) ? $value['payment_mode'] :''; ?></td>
                                                    <td><?php echo isset($value['type']) ? $value['type'] :''; ?></td>
                                                    <td><?php echo isset($value['member_name']) ? $value['member_name'] :''; ?></td>
                                                    <td><?php echo isset($value['service_provider_name']) ? $value['service_provider_name'] :''; ?></td>
                                                    <td><?php echo isset($value['cheque_number']) ? $value['cheque_number'] :''; ?></td>
                                                    <td><?php  if($value['is_gst_included'] == 'Yes'){ echo isset($value['is_gst_included']) ? $value['is_gst_included'] :'';}else echo 'No' ?></td>
                                                    <td><?php if(!empty($value['gst_percentage'])){echo isset($value['gst_percentage']) ? $value['gst_percentage'] :'';}else{ echo '0';} ?>%</td>
                                                    <td><?php echo isset($value['transaction_amount']) ? $value['transaction_amount'] :''; ?></td>
                                                    <td><?php if(!empty($value['transaction_amount_after_gst'])){ echo isset($value['transaction_amount_after_gst']) ? $value['transaction_amount_after_gst'] :'';}else{echo isset($value['transaction_amount']) ? $value['transaction_amount'] :''; } ?></td>
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
        
      
        <!--<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">-->
        <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
        <!--        <div class="modal-content">-->
        <!--            <div class="modal-body">-->
        <!--                <div class="popup text-left">-->
        <!--                    <h4 class="mb-3">Import</h4>-->
        <!--                    <form action="<?php echo base_url();?>Dashboard/importSubscription" method="post" enctype="multipart/form-data">-->
        <!--                    <div class="content create-workform bg-body">-->
        <!--                        <div class="pb-3">-->
        <!--                            <label class="mb-2">CSV</label>-->
        <!--                            <input type="file" name="file" class="form-control" placeholder="Enter CSV"style="height: 65px;">-->
        <!--                        </div>-->
        <!--                        <div class="col-lg-12 mt-4">-->
        <!--                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">-->
        <!--                                <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>-->
        <!--                                <div><button name="submit" type="submit" class="btn-primary" value="Upload" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>    -->

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