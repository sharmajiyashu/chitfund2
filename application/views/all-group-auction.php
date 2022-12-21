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
                    <div class="container-fluid">
                    <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/planAvailableForAuction'); ?>">Auctions</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/planGroupForAuction/'.$data2['plan_id']); ?>"><?php echo $data2['plan_name'] ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active"><?php echo $data2['group_name'] ?></li>
                  </ul>
                    
                    <div class="row">
                         <div class="col-lg-12" >
                             <div class="card shadow-sm" style="padding: 21px;" >  
                                    <div class="row" style="text-align: center;">
                                        <div class="col-lg-3">
                                            Plan Name : <?php $plan_data = $this->db->where('plan_id',$plan_id)->get('tbl_plans')->row_array(); echo isset($plan_data['plan_name']) ? $plan_data['plan_name'] :''; ?>
                                        </div>
                                        <div class="col-lg-3">
                                            Group Name : <?php $group_data = $this->db->where('group_id',$group_id)->get('tbl_groups')->row_array(); echo isset($group_data['group_name']) ? $group_data['group_name'] :''; ?>
                                        </div>
                                        <div class="col-lg-3">
                                            Total Auction : <?php echo isset($plan_data['total_months']) ? $plan_data['total_months'] :''; ?>
                                        </div>
                                        <div class="col-lg-3">
                                            Tenure : <?php echo isset($plan_data['tenure']) ? $plan_data['tenure'] :''; ?>
                                        </div>
                                        <br>
                                        <br>
                                        <?php if($plan_data['auction_type'] == 'variable_auction'){ ?>
                                        
                                        
                                        <div class="col-lg-6">
                                            <?php $sum_of = $this->db->select_sum('divident_amount')->where('status !=','used')->where('plan_id',$plan_id)->where('group_id',$group_id)->get('divident_port')->row_array();?>
                                            <div> Undistributed Share of Discount: <?php echo isset($sum_of['divident_amount']) ? $sum_of['divident_amount'] :'0'; ?>  </div>
                                            <input type="hidden" name="pot_amount" id="pot_amount" value="<?php echo isset($sum_of['divident_amount']) ? $sum_of['divident_amount'] :'0'; ?>">
                                        </div>
                                        
                                        <?php if(!empty($data)){
                                            $declare_array = array();
                                            foreach($data as $key=>$value){
                                                if($value['status_2'] == 0 ){
                                                        $newDate = date('F-Y', strtotime($value['month']. ' - 1 months'));
                                                    $declare_array['month'] = $newDate;
                                                    $declare_array['auction_no'] = $value['auction_no'];
                                                }
                                            }
                                        } ?>
                                        
                                        <div class="col-lg-6">
                                            <button class="btn btn-success" onClick="openvariableModal('<?php echo isset($declare_array['month']) ? $declare_array['month'] :''; ?>',<?php echo isset($declare_array['auction_no']) ? $declare_array['auction_no'] :''; ?>,<?php echo isset($sum_of['divident_amount']) ? $sum_of['divident_amount'] :'' ?>)" id="V_buttion" type="submit">Declare Variable Auction</button>
                                        </div>
                                        
                                        <?php }  ?>
                                    </div>
                                    
                              </div>
                           </div> 
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <?php foreach($data as $key=>$val){ ?>
                                <?php if($val['auction_type'] == 'variable_auction'){ $variable_auction = '[ Re-Auction ] '; }else{ $variable_auction = '';} ?>
                                    <div class="col-lg-6">
                                     <div class="card shadow-sm" >  
                                     
                                     <div class="row" style="  text-align: center;  padding: 4px;">
                                         <div class="col-lg-4">
                                             
                                             
                                             <?php if($val['status'] == '0'){ 
                                                   $bid_data = $this->db->where('auction_id',$val['auction_id'])->where('is_bid_accepted','yes')->get('tbl_bids')->row_array();
                                                   $member_detail = $this->db->where('member_id',$bid_data['member_id'])->get('tbl_members')->row_array();
                                                ?>
                                             <p style="color: #924242;"> <?php echo $member_detail['name'] ?> [<?php echo $bid_data['slot_number']; ?>] <?php echo $bid_data['forgo_amount']; ?> Discount Amount</p> 
                                        <?php  } ?>
                                        
                                         </div>
                                         <div class="col-lg-5">
                                             <p> Auction no : <?php echo isset($val['auction_no']) ? $val['auction_no'] :''; ?> <br>
                                             Month : <?php echo isset($val['month']) ? $val['month'] :''; ?><br>
                                             <span style="color: red;"><?php echo isset($variable_auction) ? $variable_auction :'' ?></span>
                                             <?php if($val['status'] == 0){
                                                 $data = $this->db->where('auction_id',$val['auction_id'])->get('tbl_auction')->row_array();
                                                 $type = isset($data['type']) ? $data['type'] :'';
                                                 if($type == 'combined'){ ?>
                                                     <span>[ Combined Auction ]</span>
                                                 <?php }
                                             } ?></p>
                                         </div>
                                         <div class="col-lg-3">
                                             <?php
                                                if($val['status_2'] == 0 ){ ?>
                                                     <div style="float: right;"><button onClick="openModal('<?php echo isset($val['month']) ? $val['month'] :''; ?>',<?php echo isset($val['auction_no']) ? $val['auction_no'] :''; ?>)" class="btn btn-success" type="submit">Declare</button></div>
                                              <?php  }else{ ?>
                                                 <?php     if($val['status'] == 1){  ?>
                                                            <?php if($val['auction_type'] == 'variable_auction'){ ?>
                                                                <div style="float: right;"><button onClick="enter_Var_Auction('<?php echo isset($val['auction_id']) ? $val['auction_id'] :''; ?>')" class="btn btn-success" type="submit">Enter Auction</button></div>
                                                            <?php }else{ ?>
                                                                <div style="float: right;"><button onClick="enter_Auction('<?php echo isset($val['auction_id']) ? $val['auction_id'] :''; ?>')" class="btn btn-success" type="submit">Enter Auction</button></div>
                                                           <?php } ?>
                                                            
                                                 <?php   }else{ ?>
                                                        <div style="float: right;"><button onClick="auctionSum('<?php echo isset($val['auction_id']) ? $val['auction_id'] :''; ?>')" class="btn btn-success" type="submit"> Auction Finished</button></div>
                                           <?php } ?>
                                           
                                           <?php }?>
                                           
                                         </div>
                                         <div class="col-lg-12">
                                             
                                             
                                         </div>
                                         
                                         
                                     </div>
                                      </div>
                                 </div>
                              <?php  } ?> 
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <!-- Page end  -->
                </div>
                
                
                
        <div class="modal fade myModal3"tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4>Are you sure you want to declare auction</h4>
                            <form action="<?php echo base_url();?>Dashboard/startAuction2" method="post" >
                              <input type="hidden" name="plan_id" id="splan_id" value="">
                              <input type="hidden" name="auction_no" id="sauction_no" value="">
                              <input type="hidden" name="group_id" id="sgroup_id" value="">
                              <!--<input type="hidden" name="month" id="smonth" value="">-->

                            <div class="content create-workform bg-body">
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="row"> 
                                            <div class="col-md-6" id="CloseDiv">                      
                                                <div class="form-group">
                                                    <label>Plan Month *</label>
                                                    <input type="text" class="form-control" name="month" id="smonth" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-6" >                      
                                                <div class="form-group">
                                                    <label>Default Month *</label>
                                                    <input type="month" id="defaultMonth" class="form-control" name="month2" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                                <button name="submit" type="submit" class="btn btn-primary mr-4" style="border-radius: 9px;">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="modal fade myModal4"tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4>Are you sure you want to declare variable auction</h4>
                            <form action="<?php echo base_url();?>Dashboard/startVariableAuction" method="post" >
                              <input type="hidden" name="plan_id" id="s_var_plan_id" value="">
                              <input type="hidden" name="auction_no" id="s_var_auction_no" value="">
                              <input type="hidden" name="group_id" id="s_var_group_id" value="">
                              <input type="hidden" name="port_amount" id="s_var_port_amount" value="">

                            <div class="content create-workform bg-body">
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="row"> 
                                            <div class="col-md-6" id="CloseDiv2">                      
                                                <div class="form-group">
                                                    <label>Plan Month *</label>
                                                    <input type="text" class="form-control" name="month" id="s_var_month" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-6" >                      
                                                <div class="form-group">
                                                    <label>Default Month *</label>
                                                    <input type="month" id="defaultMonth2" class="form-control" name="month2" value="">
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                                <button name="submit" type="submit" class="btn btn-primary mr-4" style="border-radius: 9px;">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
                
                
           <input type="hidden" name="plan_id" value="<?php echo isset($plan_id) ? $plan_id :'' ?>" id="plan_id">
           <input type="hidden" name="group_id" value="<?php echo isset($group_id) ? $group_id :'' ?>" id="group_id">
    
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        
<script>
    $("#defaultMonth").on('change',function(){
        var defaultMonth = $("#defaultMonth").val();
        $("#smonth").val('');
        var x = document.getElementById("CloseDiv");
        if (x.style.display === "none") {
        x.style.display = "none";
        } else {
        x.style.display = "none";
        }
        
    });
</script>      

<script>
    $("#defaultMonth2").on('change',function(){
        var defaultMonth = $("#defaultMonth2").val();
        $("#s_var_month").val('');
        var x = document.getElementById("CloseDiv2");
        if (x.style.display === "none") {
        x.style.display = "none";
        } else {
        x.style.display = "none";
        }
        
    });
</script>      

<script>
    function openModal(month,a_no) {
        console.log(month); 
          var plan_id = $("#plan_id").val();
          var group_id = $("#group_id").val();
          $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/checkSubscriberBuyPlan',
            type: 'POST',
            data: {plan_id:plan_id,group_id:group_id},
            dataType: 'json',
            success: function (response) {
                if(response == 1){
                    $("#splan_id").val(plan_id);
                    $("#sgroup_id").val(group_id);
                    $("#smonth").val(month);
                    $("#sauction_no").val(a_no);
                    $('.myModal3').modal('show');   
                }else{
                    Swal.fire({
                      html: "Subscriber Not Available This Plan",
                      customClass: {
                        popup: 'format-pre'
                      }
                    });
                }
            },
         }); 
    }
    
    $(document).ready(function() {
        var plan_id = $("#plan_id").val();
        var pot_amount = $("#pot_amount").val();
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/checkVariableAmountAuction',
            type: 'POST',
            data: {plan_id:plan_id,variable_amount:pot_amount},
            dataType: 'json',
            success: function (response) {
                if(response.status == 1){
                    $("#V_buttion").show();
                }else{
                    $("#V_buttion").hide();
                }
            },
         });
    });
    
    function openvariableModal(month,a_no,variable_amount) {
          var plan_id = $("#plan_id").val();
          var group_id = $("#group_id").val();
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/checkSubscriberBuyPlan',
            type: 'POST',
            data: {plan_id:plan_id,group_id:group_id},
            dataType: 'json',
            success: function (response) {
                if(response == 1){
                    $.ajax({
                        url: '<?php echo base_url(); ?>Dashboard/checkVariableAmountAuction',
                        type: 'POST',
                        data: {plan_id:plan_id,variable_amount:variable_amount},
                        dataType: 'json',
                        success: function (response) {
                            if(response.status == 1){
                                $("#s_var_plan_id").val(plan_id);
                                $("#s_var_group_id").val(group_id);
                                $("#s_var_month").val(month);
                                $("#s_var_auction_no").val(a_no);
                                $("#s_var_port_amount").val(variable_amount);
                                $('.myModal4').modal('show');   
                            }else{
                                Swal.fire({
                                  html: response.message,
                                  customClass: {
                                    popup: 'format-pre'
                                  }
                                });
                            }
                        },
                     });   
                }else{
                    Swal.fire({
                      html: "Subscriber Not Available This Plan",
                      customClass: {
                        popup: 'format-pre'
                      }
                    });
                }
            },
         }); 
    }
</script>

<script>
    function auctionSum(id){
        var base_url = window.location.origin;
        window.location.replace(base_url+'/chit_fund2/Dashboard/auctionSummary/'+id);
    }
    function enter_Auction(id){
        var base_url = window.location.origin;
        window.location.replace(base_url+'/chit_fund2/Dashboard/liveAuction/'+id);
    }
    
    function enter_Var_Auction(id){
        var base_url = window.location.origin;
        window.location.replace(base_url+'/chit_fund2/Dashboard/variableLiveAuction/'+id);
    }
    
</script>
    </body>
</html>