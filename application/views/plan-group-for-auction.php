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
                    <li class="active"><?php echo $data2 ?></li>
                  </ul>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Plan Group For Auction</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            
                            
                            <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Group Name</th>
                                            <th>Plan Name</th>
                                            <th>Total Subscription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="ligth-body">
                                       <?php if (isset($data) && is_array($data)) { ?>
                                        <?php $i=1; foreach($data as $key => $values) {   ?> 
                                                <tr>
                                                    <!--<form action="<?php echo base_url(); ?>Dashboard/liveAuction/<?php echo isset($values['auction_id']) ? $values['auction_id'] :'' ?>" method="post">-->
                                                    <input type="hidden" name="group_name" value="<?php echo isset($values['group_name']) ? $values['group_name'] :'' ?>">
                                                    <input type="hidden" name="forman_fees" value="<?php echo isset($values['forman_fees']) ? $values['forman_fees'] :'' ?>">
                                                    <input type="hidden" name="plan_name" value="<?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?>">
                                                    <input type="hidden" name="group_id" value="<?php echo isset($values['group_id']) ? $values['group_id'] :'' ?>" >
                                                    <input type="hidden" name="plan_id" value="<?php echo isset($values['plan_id']) ? $values['plan_id'] :'' ?>" id="plan_id">
 
                                                    <td><?php echo $i ; ?></td>
                                                    <td><?php echo isset($values['group_name']) ? $values['group_name'] :'' ?></td>
                                                    <td><?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?></td>
                                                    <td><?php echo isset($values['total_members']) ? $values['total_members'] :'' ?></td>
                                                <!--    <td>-->
                                                <!--                <?php if($values['status'] == '2'){?>                                                                 -->
                                                <!--                        <input type="hidden" value="<?php echo isset($values['start_time']) ? $values['start_time'] :'';?> " class='start_time'>-->
                                                <!--                        <input type="hidden" value="<?php echo isset($values['start_date']) ? $values['start_date'] :'';?> " class='start_date'>-->
                                                                        <!--<div><span id="demo" style="color: crimson;"></span></div>-->
                                                <!--                <?php }?>-->
                                                <!--                <?php if($values['status'] == '1'){?>                                                                   -->
                                                <!--                        <input type="hidden" value="<?php echo isset($values['end_time']) ? $values['end_time'] :'';?> " class='start_time2'>-->
                                                <!--                        <input type="hidden" value="<?php echo isset($values['end_date']) ? $values['end_date'] :'';?> " class='start_date2'>-->
                                                                        <!--<div><span id="demo2" style="color: crimson;"></span></div>-->
                                                <!--                <?php }?>-->
                                                                
                                                <!--                <?php if($values['status'] == '1'){?>-->
                                                <!--            <button style="background:#1ABC21;color: white;border-radius:10px;  ">Enter Auction</button>-->
                                                <!--         <?php }?>-->
                                                <!--</form>-->
                                                <!--         <?php if($values['status'] == '2'){?>-->
                                                <!--            <div style="background:#1ABC21;color: white;border-radius:10px; padding-inline: 11px" class="btn btn-success">Opening soon</div>-->
                                                <!--         <?php }?>-->
                                                <!--         <?php if($values['status'] == '3'){?>-->
                                                <!--            <div style="background:#1ABC21;color: white;border-radius:10px; padding-inline: 11px" class="btn btn-success" onclick="openModal(<?php echo isset($values['group_id']) ? $values['group_id'] : '' ;  ?>)">Restart Auction</div>-->
                                                <!--         <?php }?>-->
                                                <!--        <?php if($values['status'] == '0'){?>-->
                                                <!--           <form action="<?php echo base_url();?>Dashboard/auctionSummary/<?php echo isset($values['auction_id']) ? $values['auction_id'] :''?>" method='POSt'>-->
                                                <!--            <input type="hidden" name="group_name" value="<?php echo isset($values['group_name']) ? $values['group_name'] :''?>">-->
                                                <!--            <input type="hidden" name="plan_name" value="<?php echo isset($values['plan_name']) ? $values['plan_name'] :''?>">-->
                                                <!--            <button  class="btn btn-success" style="background:#1ABC21;color: white;border-radius:10px; padding-inline: 11px"> Auction Finished </button>-->
                                                <!--            <div style="background:#1ABC21;color: white;border-radius:10px; padding-inline: 11px" class="btn btn-success" onclick="openModal(<?php echo isset($values['group_id']) ? $values['group_id'] : '' ;  ?>)">Restart Auction</div>-->
                                                <!--         </form> -->
                                                <!--        <?php }?>-->
                                               
                                                <!--         <?php if(empty($values['auction_id'])){?>-->
                                                <!--            <a style="background:#1ABC21;color: white;border-radius:10px; "class="btn btn-success" onclick="openModal(<?php echo isset($values['group_id']) ? $values['group_id'] : '' ;  ?>)" >Start  Auction</a>   -->
                                                <!--         <?php }?>-->
                                                <!--    </td>-->
                                                <td>
                                                    <form action="<?php echo base_url();?>Dashboard/enterAuction" method="post">
                                                        <input type="hidden" name="group_id" value="<?php echo isset($values['group_id']) ? $values['group_id'] :'' ?>" >
                                                        <input type="hidden" name="plan_id" value="<?php echo isset($values['plan_id']) ? $values['plan_id'] :'' ?>" id="plan_id">
                                                        <button  class="btn btn-success" type="submit"> Enter </button>
                                                    </form>
                                                    
                                                </td>
                                                </tr>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        
        <!--Start Auction -->
        <div class="modal fade myModal3"tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <!--<h4 class="mb-3">Start Auction</h4>-->
                            <h4>Are you sure you want to declate auction</h4>
                            <form action="<?php echo base_url();?>Dashboard/startAuction" method="post" >
                              <input type="hidden" name="plan_id" id="splan_id" value="">
                              <input type="hidden" name="group_id" id="sgroup_id" value="">

                            <div class="content create-workform bg-body">
                                <!--<div class="pb-3">-->
                                <!--    <label class="mb-2">Date</label>-->
                                <!--    <input type="date" name="start_date" class="form-control" style="height: 65px;">-->
                                <!--</div>-->
                                <!--<div class="pb-3">-->
                                <!--    <label class="mb-2">Start Time</label>-->
                                <!--    <input type="time" name="start_time" class="form-control" style="height: 65px;">-->
                                <!--</div>-->
                                
                                <!--<div class="pb-3">-->
                                <!--    <label class="mb-2">End Time</label>-->
                                <!--    <input type="time" name="end_time" class="form-control" style="height: 65px;">-->
                                <!--</div>-->
                                
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
        <!--Start Auction EOC -->
        
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
        
        <script>
        function openModal(group_id) {
            console.log(group_id); 
              var plan_id = $("#plan_id").val();
              $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/checkSubscriberBuyPlan',
                type: 'POST',
                data: {plan_id:plan_id,group_id:group_id},
                dataType: 'json',
                success: function (response) {
                    if(response == 1){
                        $("#splan_id").val(plan_id);
                        $("#sgroup_id").val(group_id);
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
        </script>
         <script>
            var start_date = $('.start_date').val()
            var start_time = $('.start_time').val()
            
            var x = setInterval(function() {

            var now = new Date().getTime();
            
            var countDownDate = new Date(start_date+start_time).getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("demo").innerHTML = hours + ":"
            + minutes + ":" + seconds ;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                  $( document ).ready(function() {
                        $.ajax({
                        url: '<?php echo base_url(); ?>Dashboard/startauction_auto',
                        type: 'POST',
                        data: {plan_id:1,group_id:1},
                        dataType: 'json',
                        success: function (response) {
                                // Swal.fire({
                                //   html: response,
                                //   customClass: {
                                //     popup: 'format-pre'
                                //   }
                                // });
                            window.location.reload();
                        },
                 }); 
                    });
                 
            }
            }, 1000);
        </script>
        
        <script>
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

            if (distance2 < 0) {
                clearInterval(x);
                document.getElementById("demo2").innerHTML = "EXPIRED";
                  $( document ).ready(function() {
                        $.ajax({
                        url: '<?php echo base_url(); ?>Dashboard/startauction_auto',
                        type: 'POST',
                        data: {plan_id:1,group_id:1},
                        dataType: 'json',
                        success: function (response) {
                                // Swal.fire({
                                //   html: response,
                                //   customClass: {
                                //     popup: 'format-pre'
                                //   }
                                // });
                            window.location.reload();
                        },
                 }); 
                    });
                 
            }
            }, 1000);
        </script>
        
    </body>
</html>