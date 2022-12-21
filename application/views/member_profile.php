<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    </head>

    <style>
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
                <div class="container-fluid">
                    
                    <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success" 
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                                <strong>
                                    <?php echo $this->session->flashdata('success'); ?></strong></div>  <?php } ?>
                
                                    <?php if ($this->session->flashdata('Failure')) { ?>
                            <div class="alert alert-warning">
                                <span  class="closebtn"  onclick="this.parentElement.style.display = 'none';">&times;</span> 
                            <strong>
                            <?php echo $this->session->flashdata('Failure'); ?></strong></div>  <?php } ?>
                            
                    <div class="row">
                    <?php if(!empty($data)){foreach ($data as $keys=>$values){
                          $member_id = isset($values['member_id']) ? $values['member_id'] : '';
                          $getCollateral = $this->db->where('member_id',$member_id)->get('tbl_subscriber_collateral')->row_array();
                          $name = isset($values['name']) ? $values['name'] : '';
                          $last_name = isset($values['last_name']) ? $values['last_name'] : '';
                          $mobile = isset($values['mobile']) ? $values['mobile'] : '';
                          $email = isset($values['email']) ? $values['email'] : '';
                          $permanent_address = isset($values['permanent_address']) ? $values['permanent_address'] : '';
                    }} ?>
                       <input type="hidden" name="member_id" id="member_id" value="<?php echo isset($member_id) ? $member_id : ''; ?>">
                        <div class="col-lg-8" style="margin-left:200px;">
                            <div class="card shadow-sm" style="background: ivory">
                                    <div class="card-header bg-transparent text-center">
                                        
                                        <div style="text-align: end;">
                                            <a  data-original-title="Edit"
                                                 href="<?php echo base_url(); ?>Dashboard/subscriberupdate/<?php echo isset($member_id) ? $member_id : ''; ?>"><Button class="btn btn-warning">Edit</Button></a>
                                            <!--<a   data-original-title="Delete"-->
                                            <!--     class="data-delete" href="<?php echo base_url(); ?>Dashboard/member_delete/<?php echo isset($member_id) ? $member_id : ''; ?>"><Button class="btn btn-danger">Delete</Button></a>-->
                                        </div>
                                        
                                        <div >   
                                            <img class="profile_img" src="C:\xampp\htdocs\chit_fund\car.jpg" alt="" style="border: 2px solid;border-radius: 50%; height: 150px;width: 150px;">
                                        </div>
                                        <h2 style="color:rosybrown"><?php echo isset($name) ? $name : '';  ?> <span> <?php echo isset($last_name) ? $last_name : '';  ?></span></h2>
                                    </div>
                                    <div class="card-body">
                                        <h5 style="color:darkcyan">Mobile  <span style="color:gray;margin-left:14%;"> <?php echo isset($mobile) ? $mobile : '';  ?> </span></h5>
                                        <h5 style="color:darkcyan">Email  <span style="color:gray;margin-left:16%;"> <?php echo isset($email) ? $email : '';  ?></h5>
                                        <h5 style="color:darkcyan">Address  <span style="color:gray;margin-left:13%;"> <?php echo isset($permanent_address) ? $permanent_address : '';  ?></h5>
                                        <?php if(isset($getCollateral['collateral_id']) && $getCollateral['collateral_id'] == 1){ ?>
                                        <h5 style="color:darkcyan">Collateral  <span style="color:gray;margin-left:12%;"> <?php echo isset($getCollateral['collateral_name']) ? $getCollateral['collateral_name'] : '';  ?> -> <?php echo isset($getCollateral['subscription_locked']) ? $getCollateral['subscription_locked'] : '';  ?></h5>
                                        <?php }else{ ?>
                                        <h5 style="color:darkcyan">Collateral  <span style="color:gray;margin-left:12%;"> <?php echo isset($getCollateral['collateral_name']) ? $getCollateral['collateral_name'] : '';  ?> -> <?php echo isset($getCollateral['collateral_sub_name']) ? $getCollateral['collateral_sub_name'] : '';  ?></h5>
                                        <?php } ?>
                                        <h5 style="color:darkcyan">Risk Calculate  <span style="color:gray;margin-left:6%;"> <?php echo isset($member_risk_calculate) ? $member_risk_calculate : '';  ?></h5>
                                    </div>                                                 
    
                                    <div class="card-body">
                                        <div  class="row" style="margin-left: 85px;margin-top: 54px;"> 
                                                <a href="<?php echo base_url(); ?>Dashboard/getplan_history/<?php echo isset($member_id) ? $member_id : ''; ?>"> <div > <button class="btn btn-success">SUBSCRIPTION</button></div></a>
                                                <a href="<?php echo base_url(); ?>Dashboard/buy_active_plan/<?php echo isset($member_id) ? $member_id : ''; ?>"><div style="margin-left: 16px" > <button class="btn btn-warning">SUBSCRIBE</button></div></a>
                                                <a href="<?php echo base_url(); ?>Dashboard/plan_emi_due/<?php echo isset($member_id) ? $member_id : ''; ?>"><div style="margin-left: 16px" > <button class="btn btn-dark">RECEIVE MONEY</button></div> </a>
                                                <a href="<?php echo base_url(); ?>Dashboard/paySucribermoney/<?php echo isset($member_id) ? $member_id : ''; ?>"><div style="margin-left: 16px"> <button class="btn btn-dark">PAY MONEY</button></div></a>
                                                <div style="margin-left: 16px;margin-top: inherit;" > <button class="btn btn-dark addCollateral" >Add Collateral</button></div>
                                                <a href="<?php echo base_url(); ?>Dashboard/reports/<?php echo isset($member_id) ? $member_id : ''; ?>" style="margin-left: 16px;margin-top: inherit;" > <button class="btn btn-primary" >Invoice</button></a>
                                                <a href="<?php echo base_url(); ?>Dashboard/memberReceipt/<?php echo isset($member_id) ? $member_id : ''; ?>" style="margin-left: 16px;margin-top: inherit;" > <button class="btn btn-success" >Receipts</button></a>
                                                <a href="<?php echo base_url(); ?>Dashboard/subscriberSummary/<?php echo isset($member_id) ? $member_id : ''; ?>" style="margin-left: 16px;margin-top: inherit;" > <button class="btn btn-warning" >Subscriber Summary</button></a></div>
                                       <!--subscriberSummary-->
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
        
        <script>
        $("#image").on('change',function(){
            var form_data = new FormData();
            let doc_arr = [];
            // Read selected files
            form_data.append("docs", $(this)[0].files[0]);
            
            $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/imagesUpload',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(upload_file_path){
                // doc_arr.push({'doc_file_path':upload_file_path});
                // var json_doc_data = JSON.stringify(doc_arr);
                // console.log("json_doc_data"+json_doc_data);
                $("#uploadImage").val(upload_file_path);
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