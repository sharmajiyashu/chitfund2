<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 17px;
  width: 20px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
         <?php include APPPATH. "views/include/header.php"; ?>
        <?php include APPPATH. "views/include/sidebar.php"; ?>
            <div class="content-page">
                <div class="container-fluid">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/planAvailableForAuction'); ?>">Auctions</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/planGroupForAuction/'.$plan_id); ?>"><?php echo $plan_name; ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <!--<li><a href="<?php echo base_url('Dashboard/planGroupForAuction/'.$plan_id); ?>"><?php echo $group_name; ?></a>&nbsp;&nbsp;>&nbsp;</li>-->
                    
                    <form action="<?php echo base_url('Dashboard/enterAuction'); ?>" method="POST">

                    <input type="hidden" name="plan_id" value="<?php echo $plan_id;?>" />
                    <input type="hidden" name="group_id" value="<?php echo $group_id;?>" />
                    
                    <a href="#" onclick="this.parentNode.submit()"><?php echo $group_name; ?></a>&nbsp;&nbsp;>&nbsp;
                    
                    </form>
                    <li class="active"><?php echo $auction_no; ?></li>
                  </ul>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                            	 <input type="hidden" name="forman_fees" value="<?php echo isset($forman_fees) ? $forman_fees : ''; ?>" id="forman_fees">

                                    <div><h4 class=" col-mb-3">Live Auction</h4></div>
                                   <!--<div class="col-mb-4">-->
                                   <!--     <a data-toggle="tooltip" data-placement="top" title="" data-original-title="End Auction"  href="<?php echo base_url(); ?>Dashboard/endAuction/<?php echo isset($auction_id) ? $auction_id : ''; ?>"> <button name="submit" type="submit" style="border-radius:16px;background: #FF4000;color: white;">END AUCTION </button> </a>-->
                                   <!--     <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancle Auction"  href="<?php echo base_url(); ?>Dashboard/cancleAuction/<?php echo isset($auction_id) ? $auction_id : ''; ?>"> <button style="border-radius:16px;background: #FF4000;color: white;">CANCEL AUCTION</button> </a>-->
                                   <!-- </div>-->
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-4" style=""  >
                                    <div class="card shadow-sm" >      
                                        <div style="padding: 16px;"> 
                                                <?php $auction_data = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
                                                    if(!empty($auction_data)){ ?>
                                                    
                                                        <input type="hidden" value="<?php echo isset($auction_data['end_time']) ? $auction_data['end_time'] :'';?> " class='start_time2'>
                                                        <input type="hidden" value="<?php echo isset($auction_data['end_date']) ? $auction_data['end_date'] :'';?> " class='start_date2'>
                                                        <!--<h6>End Time<span id="demo2" style="color: red;margin-left: 114px;"></span></h6> -->
                                                        
                                                <?php }
                                                ?>
                                        
                                        <?php $plan_id = $this->db->where('auction_id',$auction_id)->get('tbl_auction')->row_array();
                                            $plan_detail = $this->db->where('plan_id',$plan_id['plan_id'])->get('tbl_plans')->row_array();
                                            
                                            $max_bid = $plan_detail['plan_amount'] * $plan_detail['max_bid'] / 100;
                                        ?>
                                        <input type="hidden" name="max_bid" value="<?php echo $max_bid ?>" id="Max_Bid">
                                        
                                                <?php if(!empty($group_name)){ ?>
                                                <h6>Group Name<span style="color:red;margin-left: 82px">: <?php echo isset($group_name) ? $group_name : ''; ?> </span></h6>                              
                                             <?php   } ?>
                                             
                                            <h6>Plan Name<span style="color:red;margin-left: 92px"> : <?php echo isset($plan_name) ? $plan_name : ''; ?> </span></h6> 
                                            <h6>Min Discount Allowed<span style="color:red;margin-left: 14px"> : <?php echo isset($forman_fees) ? $forman_fees : ''; ?></span></h6>
                                            <h6>Max Discount Allowed less then <span style="color:red;margin-left: 14px"> : <?php echo isset($max_bid) ? $max_bid : ''; ?></span></h6>
                                            </div>   
                                            <div class="row" style="margin-left:150px">
                           <h5>Combined Auction
                            <label class="switch" >
                              <input type="checkbox" type="checkbox" id="myCheckbox" onchange="toggleCheck()" <?php echo isset($checkbox) ? $checkbox :''; ?> >
                              <span class="slider round" ></span>
                              <!--<a href="<?php echo base_url();?>/Dashboard/liveAuction2/<?php echo isset($auction_id) ? $auction_id :''; ?>"><span class="slider round" checked></span></a>-->
                              
                            </label>
                            
                           </h5>
                           <!--<a id="aLink" href="<?php echo base_url();?>/Dashboard/liveAuction2/<?php echo isset($auction_id) ? $auction_id :''; ?>" style="display:block;">Link</a>-->
                           <!--<a href="<?php echo base_url();?>/Dashboard/liveAuction2/<?php echo isset($auction_id) ? $auction_id :''; ?>"><button type="button" class="btn btn-block">Danger</button></a>-->
                         </div>
                                             
                                        </div> 
                                    </div>                                                 
                                 </div> 
                             </div>
                         
                        <div class="col-md-12">
                            <h5>List of open Sub ld For Auction</h5>
                            <br>
                            <br>
                            <div class="row">
                                <input type="hidden" name="min_discount_allowed" value="<?php echo isset($forman_fees) ? $forman_fees : ''; ?>" id="Min_descount">
                                        
                                        <?php if (isset($getMembersInAuction) && is_array($getMembersInAuction)) {  ?>
                                            <div class="col-md-4">                      
                                                <div class="form-group">
                                                        <select class="form-control" name="slotnumber" id="AuctionSlot">
                                                            <option value="">Select Member</option>
                                                            <?php foreach($getMembersInAuction as $key=>$val){ ?>
                                                             <option value="<?php echo isset($val['slot_number']) ? $val['slot_number'] :'' ?>"><?php echo isset($val['name']) ? $val['name'] :'' ?> [<?php echo isset($val['slot_number']) ? $val['slot_number'] :'' ?>]</option>
                                                               <?php } ?>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4"> 
                                                <div class="form-group">
                                                    <input type="text" id="AuctionAmount" name="amount" class="form-control" placeholder="Discount" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-4"> 
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mr-2" onclick="SubmitAuction()" name="submit" value="submit">Submit </button>
                                                </div>
                                            </div>
                                       <?php } ?>
                            	</div>
                        </div>
							</div> 
                          </div>
                        </div>
                    </div>	
                    <!-- Page end  -->
                </div>
            </div>
       <input type="hidden" name="dg" value="<?php echo isset($auction_id) ? $auction_id : ''; ?>" id="auction_id">
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>

<script>
    function SubmitAuction(){
        var auction_amount = $("#AuctionAmount").val();
        var auction_id = $("#auction_id").val();
        var slot_number = $("#AuctionSlot").val();
        var Min_descount = $("#Min_descount").val();
        var Max_Bid = $("#Max_Bid").val();
        
        if(slot_number == "" || auction_amount=="" ){
            if(slot_number =="" ){
                Swal.fire({
                  html: 'select member',
                  customClass: {
                    popup: 'format-pre'
                  }
                });
            }else{
                Swal.fire({
                  html: 'Enter Discount',
                  customClass: {
                    popup: 'format-pre'
                  }
                });
            }
        }else{
        //   if(auction_amount > Min_descount){
                $.ajax({
                    url: '<?php echo base_url(); ?>Dashboard/saveBidEndnow',
                    type: 'post',
                    data: {auction_id:auction_id,amount:auction_amount,slot_number:slot_number},
                    dataType: 'json',
                    success: function (response){
                         if(response == 1){
                             window.location.replace(base_url+'/chit_fund2/Dashboard/auctionSummary/'+auction_id);
                         }else{
                             Swal.fire({
                              html: response,
                              customClass: {
                                popup: 'format-pre'
                              }
                            });
                         }
                    },
                });
        //   }else{
        //       Swal.fire({
        //           html: 'Discount allowed more then'+Min_descount,
        //           customClass: {
        //             popup: 'format-pre'
        //           }
        //         });
        //   }
        }
        
    }
</script>

<script>
function openModal(slot_number) {
   var auction_id = $("#auction_id").val();
   var for_go_amount = $("#forGoAmount_"+slot_number).val();
   var agent_id = $("#agent_id").val();
   var group_id =  $("#group_id").val();
   var member_id =  $("#live_"+slot_number).attr('member_id');
   var forman_fees = $("#forman_fees").val();

  $.ajax({
        url: '<?php echo base_url(); ?>Dashboard/saveBidByAgent',
        type: 'post',
        data: {auction_id:auction_id,member_id:member_id,for_go_amount:for_go_amount,agent_id:agent_id,group_id:group_id,slot_number:slot_number,forman_fees:forman_fees},
        dataType: 'json',
        success: function (response){
             $( document ).ready(function() {
                        $.ajax({
                        url: '<?php echo base_url(); ?>Dashboard/endAuctionNow',
                        type: 'POST',
                        data: {auction_id:auction_id},
                        dataType: 'json',
                        success: function (response) {
                                // Swal.fire({
                                //   html: response,
                                //   customClass: {
                                //     popup: 'format-pre'
                                //   }
                                // });
                            window.location.replace(base_url+'/chit_fund2/Dashboard/auctionSummary/'+auction_id);
                        },
                 }); 
                    });
        //     Swal.fire({
        //       html: response,
        //       customClass: {
        //         popup: 'format-pre'
        //       }
        //     });
        // window.location.reload();
        },
    });
}
</script>

<!--<script>-->
<!--document.addEventListener('DOMContentLoaded', function (){-->
<!--  var checkbox = document.querySelector('input[type="checkbox"]');-->
<!--  var auction_id = $("#auction_id").val();-->
<!--  var group_id = $("#group_id").val();-->
<!--  checkbox.addEventListener('change',function () {-->
<!--    if (checkbox.checked) {-->
<!--      var type = "combined";-->
<!--      $.ajax({-->
<!--        url: '<?php echo base_url(); ?>Dashboard/SwitchCombinedAuction',-->
<!--        type: 'post',-->
<!--        data: {auction_id:auction_id,type:type,group_id:group_id},-->
<!--        dataType: 'json',-->
<!--        success: function (response) {-->
<!--          $("#openAuction").html(response);-->
        //   window.location.reload();
<!--        },-->
<!--     });-->
<!--    }else {-->
<!--      var type = "individual";-->
<!--      $.ajax({-->
<!--        url: '<?php echo base_url(); ?>Dashboard/SwitchCombinedAuction',-->
<!--        type: 'post',-->
<!--        data: {auction_id:auction_id,type:type,group_id:group_id},-->
<!--        dataType: 'json',-->
<!--        success: function (response) {-->
<!--          $("#openAuction").html(response);-->
<!--        },-->
<!--     });-->
<!--    }-->
<!--  });-->
<!--});-->
<!--</script>-->

<script>
    function toggleCheck() {
        var auction_id = $("#auction_id").val();
        var base_url = window.location.origin;
  if(document.getElementById("myCheckbox").checked === true){
    //   alert(auction_id);
        window.location.replace(base_url+'/chit_fund2/Dashboard/liveAuction2/'+auction_id);
  } else {
    //   alert(auction_id);
        window.location.replace(base_url+'/chit_fund2/Dashboard/liveAuction/'+auction_id);
  }
}
</script>

<script>
function bidForAuction(bid_id) {
    if (!confirm("Are you sure you want to save this Discount as final Discount?")) {
        return false;
    }else{
        var slot_number =  $("#bid_"+bid_id).attr('slot_number');
          $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/savefinalbid',
            type: 'post',
            data: {bid_id:bid_id,slot_number:slot_number},
            dataType: 'json',
            success: function (response){
               Swal.fire({
                  html: response,
                  customClass: {
                    popup: 'format-pre'
                  }
                });
                 $( document ).ready(function() {
                        $.ajax({
                        url: '<?php echo base_url(); ?>Dashboard/endAuctionNow',
                        type: 'POST',
                        data: {auction_id:auction_id},
                        dataType: 'json',
                        success: function (response) {
                                // Swal.fire({
                                //   html: response,
                                //   customClass: {
                                //     popup: 'format-pre'
                                //   }
                                // });
                            window.location.replace(base_url+'/chit_fund2/Dashboard/auctionSummary/'+auction_id);
                        },
                 }); 
                    });
            window.location.href = '<?php echo base_url(); ?>Dashboard/planAvailableForAuction';
            },
         }); 
        }
}
</script>

 <script>
            //  var auction_id = $("#auction_id").val();
             var base_url = window.location.origin;
             
            var start_date2 = $('.start_date2').val()
            var start_time2 = $('.start_time2').val()
            
            var x = setInterval(function() {

            var now = new Date().getTime();
            
            var countDownDate2 = new Date(start_date2+start_time2).getTime();

            var distance2 = countDownDate2 - now;

            var days = Math.floor(distance2 / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance2 % (1000 * 60)) / 1000);

            document.getElementById("demo2").innerHTML = hours + ":"
            + minutes + ":" + seconds ;

            // if (distance2 < 0) {
            //     clearInterval(x);
            //     document.getElementById("demo2").innerHTML = "EXPIRED";
            //       $( document ).ready(function() {
            //             $.ajax({
            //             url: '<?php echo base_url(); ?>Dashboard/endAuctionNow',
            //             type: 'POST',
            //             data: {auction_id:auction_id},
            //             dataType: 'json',
            //             success: function (response) {
            //                     // Swal.fire({
            //                     //   html: response,
            //                     //   customClass: {
            //                     //     popup: 'format-pre'
            //                     //   }
            //                     // });
            //                 window.location.replace(base_url+'/chit_fund2/Dashboard/auctionSummary/'+auction_id);
            //             },
            //      }); 
            //         });
                 
            // }
            
            }, 1000);
        </script>
