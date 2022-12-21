
<!doctype html>
<html lang="en">

    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
       <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">  
    </head>
     <style>
      .error{
          color:#E08DB4;
      }

    </style>
    <body >
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
                <div class="container-fluid add-form-list">
                    <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Payment / Receipt</li>
                  </ul> 
                    <div class="row">
                        <div class="col-sm-9">
                            
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <!--<div class="header-title">-->
                                    <!--    <?php if(!empty($data['plan_id'])){ ?> -->
                                    <!--    <h4 class="card-title">-->
                                    <!--      Update Receipt -->
                                    <!--      <?php } else{ ?>-->
                                    <!--      Add Receipt -->
                                    <!--    </h4>-->
                                    <!--   <?php } ?> -->
                                    <!--</div>-->
                                    
                                    <div class="header-title" style="width: 100%;">
                                       <div class="row" >
                                           <div class="col-md-8">
                                               <?php if(!empty($data['plan_id'])){ ?> 
                                        <h4 class="card-title">
                                          Update Receipt 
                                          <?php } else{ ?>
                                          Add Receipt 
                                        </h4>
                                       <?php } ?> 
                                           </div>
                                           <div class="col-md-4">
                                               <a href="<?php echo base_url(); ?>Dashboard/master_payment" class="btn btn-success">Add Payment</a> 
                                           </div>
                                       </div>
                                       
                                       
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/add_master_receipt" method="post" data-toggle="validator">
                                                                       
                                         <div class="row"> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Transaction Type *</label>       
                                                    <select class="form-control transaction_type" name="transaction_type" id="transaction_type">
                                                        <option value="">Select Transaction Type</option>
                                                        <option value="subscriber money">Subscriber Money Receivrd</option>
                                                        <option value="other_receipt">Other Receipt</option>
                                                    </select>
                                                </div> 
                                             </div>
                                             <div class="col-md-4" id="option_subscriber"> 
                                                <input type="hidden" name="member_id" id="member_id">
                                                <div class="form-group">
                                                    <label> Select Subscriber*</label>
                                                    <input type="text" readonly class="form-control" id="select_member_id">
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-4">                      
                                                <div class="form-group">
                                                    <label> Enter Payment Method *</label>
                                                        <select class="form-control" name="payment_method" id="payment_method">
                                                            <option  value="">Select Payment Method</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="cheque">Cheque</option>
                                                            <option value="online">Online</option>                                                           
                                                        </select>
                                                </div>
                                            </div>    
                                            
                                            
                                            <div class="row" id="denomation" style="margin-left: initial;">
                                                <div class="col-lg-12">
                                                    <div class="table-box" style="border: 1px solid #DCDFE8;">
                                                    <table class="table">
                                                        <div class="col-md-6">
                                                        <tbody>
                                                          <tr>
                                                            <td><div class="table-text">10</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="ten" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="ten"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><div class="table-text">20</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="twenty" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="twenty"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><div class="table-text">50</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="fifty" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="fifty"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><div class="table-text">100</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="hundred" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="hundred"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><div class="table-text">200</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="two_hundred" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="two_hundred"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                            <td><div class="table-text">500</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="five_hundred" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="five_hundred"><div class="table-text-total"></div></td>
                                                          </tr>
                                                         
                                                          <tr>
                                                            <td><div class="table-text" >2000</div></td>
                                                            <td>x</td>
                                                            <td><input type="text" class="form-control cashNumber" name="two_thousand" placeholder="0" style="width:40px"></td>
                                                            <td>=</td>
                                                            <td id="two_thousand"><div class="table-text-total"></div></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="4" style="text-align:center;">Total</td>
                                                              <td style="text-align:center;" id="total"></td>
                                                          </tr>
                                                          <tr>
                                                        </tbody>
                                                        </div>
                                                    </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"></div>
                                                <input type="hidden" name="total" id="total_value">
                                            </div>
                                           
                                            <div class="col-md-4" id="option_bank">
                                                <div class="form-group">
                                                    <label>Bank Account *</label>
                                                        <select class="form-control" name="bank_account">
                                                            <?php $bank_data = $this->db->get('bank_accounts')->result_array();
                                                    if(!empty($bank_data)){
                                                        foreach($bank_data as $keys => $values){ ?>
                                                            <option value="<?php echo isset($values['bank_account_id']) ? $values['bank_account_id'] :'' ;?>" name="bank_account"><?php echo isset($values['bank_name']) ? $values['bank_name'] : ''; ?></option>
                                                             <?php     }
                                                    } ?>
                                                        </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-4" id="option_cheque">
                                                <div class="form-group">
                                                    <label>Cheque Number *</label>
                                                    <input type="number" class="form-control" placeholder="Enter Cheque Number"   name="cheque_number" value="<?php echo isset($data['cheque_number']) ? $data['cheque_number'] : ''; ?>">
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Amount *</label>
                                                    <input type="text" class="form-control amount" placeholder="Enter Amount"   required name="amount" value="<?php echo isset($data['amount']) ? $data['amount'] : ''; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Received By *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Received By *" required name="received_by" value="<?php echo isset($data['received_by']) ? $data['received_by'] : ''; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                     <input type="checkbox" id="gst_check" name="gst_check" style="width: 17px;height: 15px;">
                                                    <label for="gst"> Is Gst</label><br>
                                                </div>
                                            </div>
                                         
                                            <div class="row tax_show">
                                                <div class="col-md-3" style="margin-left: 2%;">                      
                                                <div class="form-group">
                                                    <label> Tax *</label>
                                                        <select class="form-control" name="gst" id="gst">
                                                            <option value="">Select Tax Type</option>
                                                             <?php $data = $this->db->get('tbl_gst')->result_array(); ?>
                                                             <?php foreach($data as $key => $value){ ?>
                                                            <option value="<?php echo isset($value['gst_id']) ?  $value['gst_id'] : ''; ?>"><?php echo isset($value['name']) ?  $value['name'] : ''; ?></option>
                                                             <?php } ?> 
                                                        </select>
                                                </div>
                                            </div>   
                                            
                                            <div class="col-md-3 tax_show">                      
                                                <div class="form-group">
                                                    <label> Tax Percentage *</label>
                                                    <input type="text" readonly id="tax_percentage">  
                                                </div>
                                            </div> 
                                        
                                            <div class="col-md-3 tax_show">                      
                                                <div class="form-group">
                                                    <label> Tax Final Amount *</label>
                                                    <input type="text" readonly id="tax_final">  
                                                </div>
                                            </div> 
                                        </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Narration *</label>
                                                    <textarea class="form-control" rows="4" name="transaction_for"  ><?php echo isset($data['transaction_for']) ? $data['transaction_for'] : ''; ?></textarea>                                                </div>
                                            </div>
                                            <input type="hidden" name="type" value="receipt">
                                            
                                        </div>     
                                        <?php if(!empty($data['plan_id'])){ ?> 
                                            <button type="submit" class="btn btn-primary mr-2" id="submit" name="submit" value="submit"> Update Receipt </button> 
                                        <?php } else{ ?>  
                                           <button type="submit" class="btn btn-primary mr-2" id="submit" name="submit" value="submit">  Add Receipt </button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        
        
       
        <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <div class="media align-items-top justify-content-between">                            
                                <h3 class="mb-3">Add Subscription</h3>
                                <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                            </div>
                            <div class="content edit-notes">
                                <div class="card card-transparent card-block card-stretch event-note mb-0">
                                    <div class="card-body px-0 bukmark">
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                            <div class="quill-tool">
                                            </div>
                                        </div>
                                      <div class="table-responsive rounded mb-3">
                                       <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                     <th style="text-align: center;">Sr.No.</th>
                                                    <th style="text-align: center;">Subscriber Name</th>
                                                    <th style="text-align: center;">Mobile</th>
                                                    <th style="text-align: center;">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $member_data = $this->db->get('tbl_members')->result_array(); ?>
                                            <?php if(!empty($member_data) && is_array($member_data)){ ?>
                                            <?php foreach($member_data as $keys=>$values){ ?>
                                                <tr>
                                                 <td style="text-align: center;"><?php echo isset($values['member_id']) ? $values['member_id'] : ''; ?></td>
                                                 <td style="text-align: center;"><?php echo isset($values['name']) ? $values['name'] : ''; ?></td>
                                                 <td style="text-align: center;"><?php echo isset($values['mobile']) ? $values['mobile'] : ''; ?></td>
                                                 <td style="text-align: center;"><button  member_name="<?php echo isset($values['name']) ? $values['name'] : ''; ?>" member_id="<?php echo isset($values['member_id']) ? $values['member_id'] : ''; ?>" class="btn btn-primary subscriber_ids">Select</button></td>
                                                </tr>
                                            <?php } } ?>
                                             </tbody>
                                        </table>
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
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    
        <script>
        $(document).ready(function(){
           $("#option_service_provider").hide(); 
           $("#option_subscriber").hide();
           $("#option_cheque").hide();
           $("#option_bank").hide();
           $("#denomation").hide(); 
           $("#denomation1").hide();
           $(".tax_show").hide();
        });
        </script>
       
        <script>
            $("#transaction_type").on("change", function () {
                let type = $(this).val();
                if(type == 'subscriber money'){
                    $("#option_subscriber").show();
                    $("#option_service_provider").hide();
                }else if(type == 'service provider'){
                     $("#option_service_provider").show();
                     $("#option_subscriber").hide();
                }else{
                    $("#option_subscriber").hide();
                    $("#option_service_provider").hide();
                }
            });
            
            $("#gst_check").on('change',function(){
                if($(this).prop('checked') == true){
                   $(".tax_show").show(); 
                }else{
                   $(".tax_show").hide();
                   
                }
            });
            
            
             $("#gst").on("change", function () {
                var id = $(this).val();
                var amount = $(".amount").val();
                $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/getGstData',
                type: 'POST',
                data: {id:id},
                dataType: 'json',
                success: function (response) {
                  $("#tax_percentage").val(response.gst_percentage);
                   var calculate_gst = (amount*response.gst_percentage)/100;
                   var final_amount = Number(amount)+ Number(calculate_gst);
                  $("#tax_final").val(final_amount);
                },
             }); 
            });
           
            $("#payment_method").on("change", function () {
                let type = $(this).val();
                if(type == 'online'){
                    $("#option_bank").show();
                    $("#option_cheque").hide();
                    $("#denomation").hide(); 
                    $("#denomation1").hide();
                }else if(type == 'cheque'){
                    $("#option_cheque").show();
                    $("#option_bank").show();
                    $("#denomation").hide(); 
                    $("#denomation1").hide();
                }else{
                   $("#option_cheque").hide();
                   $("#option_bank").hide(); 
                   $("#denomation").show(); 
                   $("#denomation1").show();
                }
            });
        </script>
        
         <script>
            $(".transaction_type").on('change',function(){
                let x = $(this).val();
                if(x == 'subscriber money'){
                   $("#edit-note").modal('show');
                }
            });
        </script>
        
        <script>
            $(".subscriber_ids").on('click',function(){
                let id = $(this).attr('member_id');
                let name = $(this).attr('member_name');
                $("#select_member_id").val(name);
                $("#member_id").val(id);
                 $("#edit-note").modal('hide');
           });
        </script>
         <script>
            $(".cashNumber").on('change',function(){
                 let x = $(this).val();
                 let y = $(this).attr('name');
                 var sum = 0;
                 var a = 0; 
                 var b = 0; 
                 var c = 0;  
                 var d = 0; 
                 var e = 0; 
                 var f = 0; 
                 var g = 0;
                 
                 if(y == 'ten'){
                   a = 10*x;
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(a);
                   $("#total_value").val(total2);
                  $("#ten").html('<div class="table-text-total">'+a+'</div>');
                 }else if(y == 'twenty'){
                   b = 20*x;
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(b);
                   $("#total_value").val(total2);
                  $("#twenty").html('<div class="table-text-total">'+b+'</div>');
                 }else if(y == 'fifty'){
                  c = 50*x;  
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(c);
                   $("#total_value").val(total2);
                  $("#fifty").html('<div class="table-text-total">'+c+'</div>');
                 }else if(y == 'hundred'){
                   d = 100*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(d);
                   $("#total_value").val(total2);
                  $("#hundred").html('<div class="table-text-total">'+d+'</div>');
                 }else if(y == 'two_hundred'){
                  e = 200*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(e);
                   $("#total_value").val(total2);
                  $("#two_hundred").html('<div class="table-text-total">'+e+'</div>');
                 }else if(y == 'five_hundred'){
                   f = 500*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(f);
                   $("#total_value").val(total2);
                  $("#five_hundred").html('<div class="table-text-total">'+f+'</div>');
                 }else if(y == 'two_thousand'){
                  g = 2000*x;  
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(g);  
                   $("#total_value").val(total2);
                  $("#two_thousand").html('<div class="table-text-total">'+g+'</div>');
                 }
                 
                 var grandTotal = $("#total_value").val();
                 
                 $("#total").html('<div class="table-text-total">'+grandTotal+'</div>');
            });
            
            $("#submit").on('click',function(){
			     let type = $("#payment_method").val();
				  if(type == 'cash'){
					 var amount_pay = $(".amount").val();
					 var grandTotal1 = $("#total_value").val();
					 if(grandTotal1 == amount_pay){
						return true;
					 }else{
						alert('Kindly check denomation');
						return false;
					 }
				  }else{
					return true;					
				  }
             });
        </script>
        
        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    "order": [[ 3, "desc" ]]
                } );
            } );
        </script>
    
    </body>
</html>
