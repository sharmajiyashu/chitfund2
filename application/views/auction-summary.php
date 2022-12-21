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
                        <li><a href="<?php echo base_url('Dashboard/planAvailableForAuction'); ?>">Auctions</a>&nbsp;&nbsp;>&nbsp;</li>
                        <li><a href="<?php echo base_url('Dashboard/planGroupForAuction/'.$data_2['plan_id']); ?>"><?php echo $data_2['plan_name']; ?></a>&nbsp;&nbsp;>&nbsp;</li>

                        <form action="<?php echo base_url('Dashboard/enterAuction'); ?>" method="POST">
    
                        <input type="hidden" name="plan_id" value="<?php echo $data_2['plan_id'];?>" />
                        <input type="hidden" name="group_id" value="<?php echo $data_2['group_id'];?>" />
                        
                        <a href="#" onclick="this.parentNode.submit()"><?php echo $data_2['group_name']; ?></a>&nbsp;&nbsp;>&nbsp;
                        
                        </form>
                        <li class="active"><?php echo $data_2['auction_no']; ?></li>
                      </ul>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Auction summary</h4>
                                    
                                </div>
                                    <div class="col-lg-12">
                                    <?php 
                                        if(!empty($data['bid_data'])){
                                            foreach ($data['bid_data'] as $key=>$value){
                                                if($value['is_bid_accepted'] == 'yes'){
                                                    $sub_winning_id = isset($value['member_id']) ? $value['member_id'] :''  ;
                                                    $winnin_bid_amount = isset($value['forgo_amount']) ? $value['forgo_amount'] :''  ;  
                                                    $winning_slot_sumber = isset($value['slot_number']) ? $value['slot_number'] :''  ;
                                                    $plan_name = isset($value['plan_name']) ? $value['plan_name'] :''  ;  
                                                }                                      
                                            }
                                        }
                                    ?>           
                                         <div class="card shadow-sm" >  
                                                <div class="col-lg-12">
                                                    <div class="row" >                                                  
                                                    <div style="padding: 16px;" class="col-lg-6">    
                                                        <div> <h5>Plan Name <span style="margin-left: 123px;">:  <?php echo isset($plan_name) ? $plan_name : '' ; ?></span></h5></div>   
                                                        <div> <h5>Auction Group <span style="margin-left: 91px;">:  <?php  echo isset($data['group_name']) ? $data['group_name'] :'' ; ?></span></h5> </div>   
                                                        <div> <h5>Winning Subscrider ID <span style="margin-left: 25px;">:  <?php echo isset($winning_slot_sumber) ? $winning_slot_sumber : '0000000';?></span> </h5></div> 
                                                     </div>
                                                     <div style="padding: px;" class="col-lg-6">
                                                        <div class="card shadow-sm" style="width: 49%;padding: 10px;margin-top: 17px;margin-left: 118px;margin-bottom: -13px;">    
                                                            <div> <h5 style="color: chocolate;margin-left: 84px;"> ₹ <?php echo isset($winnin_bid_amount) ?$winnin_bid_amount : '00000' ; ?></h5></div>   
                                                            <div> <span style="margin-left: 14px;">Winning Discount  Amount </span> </div>                                                              
                                                        </div> 
                                                     </div>  
                                                 </div> 
                                                     <div style="text-align: end;"><button onClick="openModal()" class="btn btn-success" type="submit">Restart Auction</button></div>
                                              </div> 
                                          </div>
                                       </div> 
                                 </div>
                            </div>
                        </div>
                        
    
                        <div class="col-lg-12" style="text-align:center">   
                         <?php if (isset($data['bid_data']) && is_array($data) && !empty($data['bid_data'])) { ?>
                         <?php $i=1; foreach($data['bid_data'] as $key => $values) {   ?>  
                        <div class="row">
                          <div class="col-lg-6" style="margin-left: ; margin-right: auto;">
                          <div class="card shadow-sm">
                             <div style="padding: 10px;">
                               <?php if($values['is_bid_accepted'] == 'yes'){ ?>
                                 <div><h6 style="color: crimson;"> <span style="color : blue">[<?php echo isset($values['slot_number']) ? $values['slot_number'] :'' ?>] </span>  [<?php echo isset($values['member_name']) ? $values['member_name'] :'' ?>] has won this auction with the discount amount of - ₹ <?php echo isset($values['forgo_amount']) ? $values['forgo_amount'] :''  ?> </h6></div>
                               <?php } else{ ?>
                                 <div><h6><span style="color : blue">[<?php echo isset($values['slot_number']) ? $values['slot_number'] :'' ?>]</span>[<?php echo isset($values['member_name']) ? $values['member_name'] :'' ?>] has placed a discount  - ₹ <?php echo isset($values['forgo_amount']) ? $values['forgo_amount'] :''  ?> </h6></div>
                               <?php } ?>   
                              </div>
                          </div>
                          </div>
                        </div>
                        <?php $i++; } ?>
                        <?php }else{ ?>
                             <h3>Discount List Not Available for this auction</h3>
                        <?php } ?>
                        </div>
                       
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        
         <div class="modal fade myModal3"tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4>Are you sure you want to restart auction</h4>
                            <form action="<?php echo base_url();?>Dashboard/auction_restart" method="post" >
                              <input type="hidden" name="auction_id" id="" value="<?php echo isset($auction_id) ? $auction_id :''; ?>">
                            <div class="content create-workform bg-body">
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div><button name="submit" type="submit" class="btn-primary" style="border-radius: 9px;width: 112%;height: 102%;">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        
        <script>
    function openModal(month) {
         $('.myModal3').modal('show');  
    }
</script>
        <script>
            $(".data-delete").click(function () {
                if (!confirm("Do you really want to delete this?")) {
                    return false;
                }
            });
        </script>
    </body>
</html>