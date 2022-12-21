<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
    <body class="  ">
    <?php include APPPATH . 'views/include/sidebar.php'; ?>  
            <?php include APPPATH . 'views/include/header.php'; ?>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
           
            <div class="content-page">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$data2['member_id']); ?>"><?php print_r($data2['name']); ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active">Pay Money</li>
                  </ul>
                
                <div class="container-fluid">
                  <form action="<?php echo base_url(); ?>Dashboard/chidHandover" method="POST">

                  <div class="col-lg-12">
                      <h5 style="color: black;">Chit Detail</h5>
                      <div class="col-lg-10" style="border-radius: 10px;background: aliceblue;border: 1px solid darkgray;padding: 16px;" >
                          <div><h6 style="color: darkslategray;">Plan Name <span style="margin-left: 99px"> : <?php echo isset($plan_detail['plan_name']) ? $plan_detail['plan_name'] : 'Null'; ?></span></h6></div>
                          <div><h6 style="color: darkslategray;">Group Name <span style="margin-left: 86px;"> : <?php echo isset($plan_detail['group_name']) ? $plan_detail['group_name'] : 'X'; ?></span></h6></div>
                          <div><h6 style="color: darkslategray;">Return Chit Amount <span style="margin-left: 32px;"> : <?php echo isset($plan_detail['return_chit_amount']) ? $plan_detail['return_chit_amount'] : '00'; ?></span></h6></div>
                          <div><h6 style="color: darkslategray;">Discount Amount <span style="margin-left: 52px;"> : <?php echo isset($plan_detail['forgo_amount']) ? $plan_detail['forgo_amount'] : '00'; ?></span></h6></div>
                          <div><h6 style="color: darkslategray;">Amount To Pay <span style="margin-left: 70px;color :red;"> : <?php echo isset($data['chit_emi_total_due_amount']) ? $data['chit_emi_total_due_amount'] : '00'; ?></span> </h6></div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <h5 style="color: black;">Subscriber Dues</h5>
                      <div class="col-lg-10" style="border-radius: 10px;background: aliceblue;border: 1px solid darkgray;padding: 16px;" >
                          <div><h6 style="color: darkslategray;">Emi <span style="margin-left: 119px;color: cadetblue;"> : <?php echo isset($data['emi_total_due_amount']) ? $data['emi_total_due_amount'] : ''; ?> </span></h6></div>
                          <div><h6 style="color: darkslategray;">Additional Due <span style="margin-left: 38px;color: cadetblue;"> : <?php echo isset($data['additional_dues']) ? $data['additional_dues'] : ''; ?> </span></h6></div>
                          <div><h6 style="color: darkslategray;">registration <span style="margin-left: 62px;color: cadetblue;"> : <?php echo isset($data['registration_dues']) ? $data['registration_dues'] : ''; ?> </span></h6></div>                         
                      </div>
                  </div>
                  <div class="col-lg-12">
                  <h5></h5>
                  <?php $total_chit = isset($plan_detail['return_chit_amount']) ? $plan_detail['return_chit_amount'] : '0';
                        $total_emi_due = isset($data['emi_total_due_amount']) ? $data['emi_total_due_amount'] : '0';
                        $total_final_payment = $total_chit - $total_emi_due;
                  ?>

                      <div class="col-lg-10" style="border-radius: 10px;background: aliceblue;border: 1px solid darkgray;padding: 16px;margin-top: 18px;" >
                          <div><h6 style="color: darkslategray;text-align: center;padding-bottom: 10px;">Final Payment = Amount To Payment - Subscriber Total Dues</h6></div>
                          <div style="border-top: 2px solid darkgray; text-align: center;font-size: 31px;"><h6 style="color: darkslategray;">Final Amount : <span style="color:red"> <?php echo isset($total_final_payment) ? $total_final_payment :'0' ?> </span>  </h6></div>
                      </div>                      
                  </div>
                    <?php if(!empty($plan_detail['plan_name'])){ ?>
                    <div class="col-lg-12"  >                        
                            <div  class="col-lg-10" style="background: oldlace;border: 1px solid darkgray;height: auto;padding:20px;border-radius: 10px;margin-top: 20px;margin-bottom:20px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Amount To Pay:</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="amount" style="width:100%;background: darkgray;" readonly id="amount_pay" value="<?php echo isset($total_final_payment) ?  $total_final_payment : '';?>">
                                        <input type="hidden" name="chit_id" value="<?php echo isset($plan_detail['chit_id']) ? $plan_detail['chit_id'] :'' ?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <input type="checkbox" id="gst_check" name="gst_check"  style="width: 17px;height: 15px;">
                                        <label for="gst"> Is Gst</label><br>
                                    </div>
                                </div>
                                    
                                
                                 <div class="col-md-3 tax_show" style="margin-left: 2%;">    
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
                                        <input type="text" name="gst_percentage" readonly id="tax_percentage">  
                                    </div>
                                </div> 
                                
                                
                                <div class="col-md-3 tax_show">                      
                                    <div class="form-group">
                                        <label> Tax Final Amount *</label>
                                        <input type="text" readonly id="tax_final">  
                                    </div>
                                </div> 
                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Payment Method</label>       
                                                <select class="form-control" id="payment_mode" name="payment_mode">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="online">Online</option>
                                                    <option value="cheque">Cheque</option>
                                                    <option value="offline">Cash</option>
                                                </select>
                                        </div> 
                                    </div>

                                        <div class="col-md-4" id="bank_account">
                                            <div class="form-group">
                                                <label>Bank Account</label>       
                                                <select class="form-control" name="bank_account_id">
                                                    <option value="">Select Bank Type</option>
                                                     <?php
                                                    $bankdetail = $this->db->get('bank_accounts')->result_array();
                                                     if(!empty($bankdetail)){
                                                        foreach($bankdetail as $keys=>$values){ ?>
                                                            <option value="<?php echo isset($values['bank_account_id']) ? $values['bank_account_id'] : '';  ?>"> <?php echo isset($values['bank_name']) ? $values['bank_name'] : ''; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div> 
                                        </div>
                                            
                                        <div class="col-md-4" id="cheque_number" >
                                            <label>Cheque Number</label><br>
                                            <input type="text"  placeholder="Enter Cheque Number" style="width:100%;" name="cheque_no">
                                        </div>
                                    </div>
                                    
                                     <div class="row" style="margin-left: auto;" id="denomation">
                                    <div class="col-lg-6">
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
                                </div>
                                    <div class="row">
                                      <button class="btn btn-success" id="submit" style="margin-left:50%">Submit</button>
                                    </div>
                                </div>                                
                            </div> 
                        </div>
                  </form>
                 <input type="hidden" name="total" id="total_value">
                    </div>
                </div> 
            <?php }?>  
        </div>
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        
        <script>
            $(document).ready(function(){
               $("#bank_account").hide(); 
               $("#cheque_number").hide();
               $("#denomation").hide(); 
               $("#denomation1").hide(); 
               $(".tax_show").hide();

            });
        </script>
    
        <script>
          $("#payment_mode").on('change',function(){
            var payment_value = $(this).val();
            if(payment_value == "cheque"){
              $("#cheque_number").show();  
              $("#denomation").hide(); 
              $("#denomation1").hide(); 
            }else if(payment_value == "offline"){
               $("#cheque_number").hide(); 
               $("#bank_account").hide(); 
               $("#denomation").show(); 
               $("#denomation1").show(); 
            }else if(payment_value == "online"){
               $("#cheque_number").show(); 
               $("#bank_account").show(); 
               $("#denomation").hide();  
               $("#denomation1").hide(); 
            }
         });
        </script>
        
        <script>
         $(".Payemi").on('change',function(){
           let doc_arr = [];
           let id = $(this).attr('emi_id');     
           let amount = $("#number_"+id).val();
           $("#abc_"+id).val(amount);
           //Multiple choose checkbox then get the value input box
           let selectedValues = $('input[name="checkbox"]:checked').map(function() {return this.value;}).get(); 
           const numbers = selectedValues.map(Number);
           const sum = numbers.reduce((partialSum, a) => partialSum + a, 0);
           $("#amount_pay").val(sum);
            
          
          $('input[name="checkbox"]:checked').each(function(){
            let emi_id = $(this).attr('emi_id');
           doc_arr.push({"id":emi_id,"amount":this.value,"status":'plan_emi'});
          });
          
          let json_doc_data = JSON.stringify(doc_arr);
          $("#doc").val(json_doc_data);
         
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
                 }
                 
                 if(y == 'twenty'){
                   b = 20*x;
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(b);
                   $("#total_value").val(total2);
                  $("#twenty").html('<div class="table-text-total">'+b+'</div>');
                 }
                 
                 if(y == 'fifty'){
                  c = 50*x;  
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(c);
                   $("#total_value").val(total2);
                  $("#fifty").html('<div class="table-text-total">'+c+'</div>');
                 }
                 
                 if(y == 'hundred'){
                   d = 100*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(d);
                   $("#total_value").val(total2);
                  $("#hundred").html('<div class="table-text-total">'+d+'</div>');
                 }
                 
                 if(y == 'two_hundred'){
                  e = 200*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(e);
                   $("#total_value").val(total2);
                  $("#two_hundred").html('<div class="table-text-total">'+e+'</div>');
                 }
                 
                 if(y == 'five_hundred'){
                   f = 500*x;   
                   var total1  = $("#total_value").val();
                   if(total1 == ''){
                       total1 = 0;
                   }
                   var total2 = parseInt(total1)+parseInt(f);
                   $("#total_value").val(total2);
                  $("#five_hundred").html('<div class="table-text-total">'+f+'</div>');
                 }
                 
                 if(y == 'two_thousand'){
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
			     let type = $("#payment_mode").val();
				  if(type == 'Cash'){
					 var amount_pay = $("#amount_pay").val();
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
            $("#gst_check").on('change',function(){
                if($(this).prop('checked') == true){
                   $(".tax_show").show(); 
                }else{
                   $(".tax_show").hide();
                }
            });
            
            $("#gst").on("change", function () {
                var id = $(this).val();
                var amount = $("#amount_pay").val();
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
        </script>
        
        <script>
            $("#submit").on('click',function(){
              if($("#payment_mode").val() == ""){
                  alert('Please selected payment method');
                  return false;
              }
            });
        </script>
        
        
     
    </body>
</html>