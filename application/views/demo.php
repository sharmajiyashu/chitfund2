<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    </head>

    <style>
    .btn{
        width: 100%;
    }
    /* body {
    background: #67B26F;  
    background: -webkit-linear-gradient(to right, #4ca2cd, #67B26F);  
    background: linear-gradient(to right, #4ca2cd, #67B26F);
    padding: 0;
    margin: 0;
    font-family: 'Lato', sans-serif;
    color: #000;
} */

.student-profile .card {
    border-radius: 10px;
}
    </style>
    <body class=" ">
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
                
                <?php if(!empty($data)){foreach ($data as $keys=>$values){
                    // print_r($data);die;
                          $member_id = isset($values['member_id']) ? $values['member_id'] : '';
                          $getCollateral = $this->db->where('member_id',$member_id)->get('tbl_subscriber_collateral')->row_array();
                          $name = isset($values['name']) ? $values['name'] : '';
                          $last_name = isset($values['last_name']) ? $values['last_name'] : '';
                          $mobile = isset($values['mobile']) ? $values['mobile'] : '';
                          $email = isset($values['email']) ? $values['email'] : '';
                          $permanent_address = isset($values['permanent_address']) ? $values['permanent_address'] : '';
                          $member_profile = isset($values['member_profile']) ? $values['member_profile'] : '';
                    }} ?>
                
                <ul class="breadcrumb">
<li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
<li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>
<li class="active"><?php echo $name ?></li>
</ul>
                
                
                
                
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-8 col-lg-4">
                
                       <input type="hidden" name="member_id" id="member_id" value="<?php echo isset($member_id) ? $member_id : ''; ?>">
                       
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Profile</h4>
                        </div>
                     </div>
                     <div class="card-body">
                           <div class="form-group">
                              <div class="crm-profile-img-edit position-relative">
                                  
                                    <?php if(!empty($member_profile)){ ?>
                                                            <img src="<?php echo base_url('images/profile/'.$member_profile) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image" style="width: 143px; height: auto;">
                                                            <?php }else{ ?>
                                                                <img src="<?php echo base_url('images/profile/no-image.png' ) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                         <?php   } ?>
                                 
                                 <!--<img src="<?php echo base_url('images/profile/'.$member_profile) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image" style="width: 143px; height: auto;">-->
                                 
                                     <div class="crm-p-image bg-primary">
                                        <i class="las la-pen upload-button" ></i>
                                        <input class="file-upload" id="imageprofile" type="file" accept="image/*">
                                     </div>
                              </div>
                           
                           <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                   <!--<h4 class="card-title">New User Information</h4>-->
                                </div>
                             </div>
                             
                             <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">Name:</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($name) ? $name : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                                 
                                 <!--<div class="form-group col-md-6">-->
                                 <!--   <label for="fname">Last Name:</label>-->
                                 <!--   <input type="text" class="form-control" id="fname" value="<?php echo isset($last_name) ? $last_name : '';  ?>" placeholder="First Name" readonly>-->
                                 <!--</div>-->
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Mobile:</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($mobile) ? $mobile : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Address:</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($permanent_address) ? $permanent_address : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Collateral:</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($getCollateral['collateral_name']) ? $getCollateral['collateral_name'] : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Risk Calculate :</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($member_risk_calculate) ? $member_risk_calculate : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="fname">Email:</label>
                                    <input type="text" class="form-control" id="fname" value="<?php echo isset($email) ? $email : '';  ?>" placeholder="First Name" readonly>
                                 </div>
                              </div>
                            
                           </div>
                     </div>
                  </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                  <div class="card" style="">
                     <div class="card-body" style="text-align: center;">
                        <div class="new-user-info">
                            <!--<div class="card-header d-flex justify-content-between">-->
                            <!--    <div class="header-title">-->
                                   <!--<h2 style="color:rosybrown"><?php echo isset($name) ? $name : '';  ?> <span> <?php echo isset($last_name) ? $last_name : '';  ?></span></h2>-->
                            <!--    </div>-->
                            <!-- </div>-->
                               <div class="row">
                              
                                <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/getplan_history/<?php echo isset($member_id) ? $member_id : ''; ?>"> <div > <button class="btn btn-dark">SUBSCRIPTION</button></div></a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/buy_active_plan/<?php echo isset($member_id) ? $member_id : ''; ?>"><div> <button class="btn btn-dark">SUBSCRIBE</button></div></a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                        <a href="<?php echo base_url(); ?>Dashboard/plan_emi_due/<?php echo isset($member_id) ? $member_id : ''; ?>"><div> <button class="btn btn-dark">RECEIVE MONEY</button></div> </a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/paySucribermoney/<?php echo isset($member_id) ? $member_id : ''; ?>"><div> <button class="btn btn-dark">PAY MONEY</button></div></a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <div> <button class="btn btn-dark addCollateral" >Add Collateral</button></div>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/reports/<?php echo isset($member_id) ? $member_id : ''; ?>" > <button class="btn btn-dark" >Invoice</button></a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/memberReceipt/<?php echo isset($member_id) ? $member_id : ''; ?>" > <button class="btn btn-dark" >Receipts</button></a>
                                    </div>
                                </div>
                                
                                 <div class="col-md-12">
                                   <div class="form-group">
                                         <a href="<?php echo base_url(); ?>Dashboard/subscriberSummary/<?php echo isset($member_id) ? $member_id : ''; ?>"> <button class="btn btn-dark" >Subscriber Summary</button></a>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <a href="<?php echo base_url(); ?>Dashboard/chits/<?php echo isset($member_id) ? $member_id : ''; ?>"><div> <button class="btn btn-dark">CHITS</button></div> </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <a href="<?php echo base_url(); ?>Dashboard/SubscriberLedger/<?php echo isset($member_id) ? $member_id : ''; ?>"><div> <button class="btn btn-dark">SUBSCRIBER LEDGER</button></div> </a>
                                    </div>
                                </div>
                             </div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      </div>
            </div>
        </div>
        
         <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <div class="media align-items-top justify-content-between">                            
                                        <h3 class="mb-3">Add Collateral</h3>
                                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                                    </div>
                                    <div class="content edit-notes">
                                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php $getMainCollateral = $this->db->where('parent_id',0)->get('tbl_collateral_master')->result_array(); ?>
                                                    <label>Main Category</label>
                                                    <select class="form-control" name="sub_collateral" id="mainCategory" >
                                                        <option value="0">Select Type</option>
                                                    <?php foreach($getMainCollateral as $key => $value){ ?>
                                                        <option value="<?php echo isset($value['collateral_id']) ? $value['collateral_id'] : ''; ?>"><?php echo isset($value['name']) ? $value['name'] : ''; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                
                                                <div id="selectSubscription">
                                                     
                                                </div>
                                                
                                                <div id="subCategory1">
                                                    <label>Sub Category</label>
                                                    <select class="form-control" name="sub_collateral" id="subCategory">
                                                        <option value="0">Select Type</option>
                                                    </select>
                                                </div>
                                                
                                                <div id="option_amount">
                                                    <label>Amount</label>
                                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Estimated Amount"  value="<?php echo isset($data['amount']) ? $data['amount'] : '' ?>">
                                                </div>
                                                
                                                <input type="hidden" id="uploadImage">
                                                
                                                <div id="option_uplode_image">
                                                    <label>Uplode Image</label>
                                                    <div >
                                                        <input type="file" class="form-" id="image" name="image" value="<?php echo isset($data['image']) ? $data['image'] : '' ?>">
                                                    </div>
                                                </div>
                                                
                                                <div id="exemption_amount">
                                                    <label>Exemption Amount</label>
                                                     <input type="number" class="form-control" name="exemption_amount" id="exemptionAmount"> </textarea>
                                                </div>
                                                
                                                 <div id="exemption_reason">
                                                    <label>Description</label>
                                                     <textarea class="form-control" name="description" id="exemptionReason"> </textarea>
                                                </div>
                                                
                                                <div style="margin: 8px;margin-top: 16px;">
                                                    <button class="btn btn-primary" id="saveCollateral">Save Collateral</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script>
            $(".data-delete").click(function () {
                if (!confirm("Do you really want to delete this?")) {
                    return false;
                }
            });
        </script>
        <script>
          $(".addCollateral").on('click',function(){
             $('#edit-note').modal('show'); 
          });
        </script>
        
        <script>
         $("#mainCategory").on('change',function(){
            var collateral_id = $(this).val();
            if(collateral_id != 1){
                $("#selectSubscription").show();
                $("#selectSubscription").hide(); 
                $("#exemption_amount").hide();
                $("#exemption_reason").hide();
                 $.ajax({
                    url: '<?php echo base_url(); ?>Dashboard/subCollateralList',
                    type: 'post',
                    data: {collateral_id:collateral_id},
                    dataType: 'json',
                    success: function (response) {
                        $("#subCategory").html(response);
                    },
                 });
            }else if(collateral_id == 2){
                $("#subCategory1").show(); 
                $("#selectSubscription").hide();
                $("#exemption_amount").hide();
                $("#exemption_reason").hide();
            }else if(collateral_id == 6){
               $("#subCategory1").hide(); 
               $("#selectSubscription").hide();
               $("#exemption_amount").show();
               $("#exemption_reason").show();
            }
        });
        </script>
        
        <script>
        $("#saveCollateral").on('click',function(){
               var collateral_id = $("#mainCategory").val();
               var sub_collateral_id = $("#subCategory").val();
               var selectSubscription = $("#slotnumber").val();
               var member_id = $("#member_id").val();
               var image = $("#uploadImage").val();
               var amount = $("#amount").val();
               var exemption_amount = $("#exemptionAmount").val();
               var exemption_reason = $("#exemptionReason").val();
             $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/addSubscriberCollateral',
                type: 'post',
                data: {collateral_id:collateral_id,member_id:member_id,sub_collateral_id:sub_collateral_id,selectSubscription:selectSubscription,amount:amount,image:image,exemption_amount:exemption_amount,exemption_reason:exemption_reason},
                dataType: 'json',
                success: function (response) {
                   window.location.reload();
                },
            }); 
        });
        </script>
        
        // <script>
        // $("#image").on('change',function(){
        //     var form_data = new FormData();
        //     let doc_arr = [];
        //     // Read selected files
        //     form_data.append("docs", $(this)[0].files[0]);
            
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>Dashboard/imagesUpload',
        //         type: 'post',
        //         data: form_data,
        //         contentType: false,
        //         processData: false,
        //         success: function(upload_file_path){
        //         // doc_arr.push({'doc_file_path':upload_file_path});
        //         // var json_doc_data = JSON.stringify(doc_arr);
        //         // console.log("json_doc_data"+json_doc_data);
        //         $("#uploadImage").val(upload_file_path);
        //         },
        //     });
        // });    
        // </script>
        
        <script>
    $("#imageprofile").on('change',function(){
        alert("You are trying to upload an image !!");
        var member_id = $("#member_id").val();
        var type_id  = $(this).attr('id');
        var form_data = new FormData();
        // Read selected files
        form_data.append("docs", $("#"+type_id)[0].files[0]);
        
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/profileUploadUpdate',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(upload_file_path){
              if(upload_file_path != ''){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url(); ?>Dashboard/memberProfileUpload',
                    data: {
                      "member_id": member_id,
                      "upload_file_path":upload_file_path
                      },
                    success:function(data){
                      location.reload();
                    }
                 });
              }
            
            },
        });
    });
    </script>
        
        <script>
        $("#mainCategory").on('click',function(){
            var collateral_id = $(this).val();
            var member_id = $("#member_id").val();
            if(collateral_id == 1){
            $("#selectSubscription").show();
            $("#subCategory1").hide();
            $("#exemption_amount").hide();
            $("#exemption_reason").hide();
             $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/getSlotNumber',
                type: 'post',
                data: {collateral_id:collateral_id,member_id:member_id},
                dataType: 'json',
                success: function (response) {
                  $("#selectSubscription").html(response);
                },
            }); 
          }else if(collateral_id == 2){
            $("#subCategory1").show(); 
            $("#selectSubscription").hide();
            $("#exemption_amount").hide();
            $("#exemption_reason").hide();
          }else if(collateral_id == 6){
             $("#subCategory1").hide(); 
             $("#selectSubscription").hide();
             $("#exemption_amount").show();
             $("#exemption_reason").show();
          }
        });
        </script>
        
        <script>
            $(document).ready(function () {
                $("#option_amount").hide();
                $("#option_uplode_image").hide();
                $("#mainCategory").on("change", function () {
                    let type = $(this).val();
                    if(type == 2){
                        $("#option_amount").show();
                        $("#option_uplode_image").show();
                    }else{
                         $("#option_amount").hide();
                         $("#option_uplode_image").hide();
                    }
                });
             });
        </script>
         

        <script>
            $('#slotnumber').selectpicker();
        </script>
    
    </body>
</html>