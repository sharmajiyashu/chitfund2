<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
    <style>
        .table-text{
            height: 35px;
    line-height: 35px;
    background: #fff;
    border: 1px solid #DCDFE8;
    font-size: 14px;
    color: #676E8A;
    border-radius: 10px;
    text-align: center;
    width: 40px;
        }
        .table-text-total{
            height: 35px;
    line-height: 35px;
    background: #fff;
    border: 1px solid #DCDFE8;
    font-size: 14px;
    color: #676E8A;
    border-radius: 10px;
    text-align: center;
    width: auto;
        }
        .form-control{
            height: 35px !important;
    line-height: 35px !important;
        }
        .table td{
            padding:5px !important;
        }
    </style>
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
                    <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$member_id); ?>"><?php print_r($member_name); ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active">Receive Money</li>
                  </ul>
                
                <div class="container-fluid">
                  <form action="<?php echo base_url(); ?>Dashboard/payDues" method="POST">
                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                <div>
                                    <input type="hidden" name="doc" id="doc">
                                    <h4 class="mb-3">Plan Emi Due</h4>
                                    <h5>Name: <span><?php echo isset($member_name) ?  $member_name : '';?></span></h5>
                                    <h5>Mobile: <span><?php echo isset($member_mobile) ?  $member_mobile : '';?></span></h5>
                                </div>
                                <!--<div><a href="javascript: history.go(-1)">Go Back</a></div>-->
                            </div>
                        </div>
                       <div class="col-lg-12" style="height:339px;overflow:scroll;">      <!--there the emi strt -->
                            <div class="row">
                            <?php if (isset($data) && is_array($data)) { 
                                $total_amunt = array(); ?>
                                <?php $i=1; foreach($data as $key => $values) { ?> 
                                 <div class="col-lg-4" style=""  >
                                    <div class="card shadow-sm" >      
                                        <div style="padding: 6px;">        
                                            <div class="row">
                                                <div style="background-color: salmon;border-radius: 8px;margin-left: 27px;width: 156px;"><h6 style="color:aliceblue;padding-left: 14px;padding-right: 14px;"> <?php echo $i?> . Emi Due  <span style="color:aliceblue;"> <?php echo isset($values['emi_month']) ? $values['emi_month'] :'';?> <br> <?php $plan_data = $this->db->where('plan_id',$values['plan_id'])->get('tbl_plans')->row_array(); echo isset($plan_data['plan_name']) ? $plan_data['plan_name'] :''; ?></span></h6></div>                               
                                                <div style="background-color: currentcolor;border-radius: 8px;margin-left: 14px"><h6 style="color:aliceblue;padding-left: 14px;padding-right: 14px;"> 
                                                <input type="number"  id="number_<?php echo $values['emi_id']; ?>" class="number" style="background-color:inherit;border: 0;color: aliceblue;width: 103px;" emi_id = "<?php echo $values['emi_id']; ?>" max="<?php if($values['is_partial_payment']=='Yes'){echo isset($values['amount_due']) ? $values['amount_due'] :'';$total_amunt[] = isset($values['amount_due']) ? $values['amount_due'] :'';} else {echo isset($values['plan_emi']) ? $values['plan_emi'] :''; $total_amunt[] = isset($values['plan_emi']) ? $values['plan_emi'] :'';} ?>" value="<?php if($values['is_partial_payment']=='Yes'){echo isset($values['amount_due']) ? $values['amount_due'] :'';$total_amunt[] = isset($values['amount_due']) ? $values['amount_due'] :'';} else {echo isset($values['plan_emi']) ? $values['plan_emi'] :''; $total_amunt[] = isset($values['plan_emi']) ? $values['plan_emi'] :'';} ?>"></h6> </div> 
                                                <div><input type="checkbox" class="Payemi" name="checkbox" style="margin-left: 24px;width: 17px;height: 16px;" id="abc_<?php echo $values['emi_id']; ?>" emi_id = "<?php echo $values['emi_id']; ?>"></div>                                                   
                                            </div>     
                                        </div>                                
                                    </div> 
                                 </div>                                                 
                                
                                <?php $i++; } ?>
                            <?php } ?>
                            </div> 
                            <!--<?php   $sum = 0; foreach($total_amunt as $keys=>$values){ $sum += $values; } ?>                                     -->
                            <?php   $sum = 0; foreach($total_amunt as $keys=>$values){ $sum = 0; } ?>   
                            </div>
                            <div  class="col-lg-12" style="background: oldlace;border: 1px solid;height: auto;padding:20px;border-radius: 10px;margin-top: 20px;margin-bottom:20px;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Amount To Pay:</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="total_sum" style="width:100%;background: darkgray;" readonly id="amount_pay" value="<?php echo isset($sum) ?  $sum : '';?>">
                                    </div>
                                    
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                             <input type="checkbox" id="gst_check" name="gst_check"  style="width: 17px;height: 15px;">
                                            <label for="gst"> Is Gst</label><br>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group" style="display:flex;">
                                            <label>Payment Method</label>       
                                                <select class="form-control payment_mode" id="payment_mode" name="payment_mode" style="width: 70%;margin-left: 20px;">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="form-group">-->
                                    <!--         <input type="checkbox" id="gst_check" name="gst_check"  style="width: 17px;height: 15px;">-->
                                    <!--        <label for="gst"> Is Gst</label><br>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                
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
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="form-group">-->
                                    <!--         <input type="checkbox" id="gst_check" name="gst_check"  style="width: 17px;height: 15px;">-->
                                    <!--        <label for="gst"> Is Gst</label><br>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    <!--<div class="col-md-5">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>Payment Method</label>       -->
                                    <!--            <select class="form-control payment_mode" id="payment_mode" name="payment_mode">-->
                                    <!--                <option value="">Select Payment Type</option>-->
                                    <!--                <option value="Online">Online</option>-->
                                    <!--                <option value="Cheque">Cheque</option>-->
                                    <!--                <option value="Cash">Cash</option>-->
                                    <!--            </select>-->
                                    <!--        </div> -->
                                    <!--    </div>-->

                                        <div class="col-md-4" id="bank_account">
                                            <div class="form-group">
                                                <label>Bank Account</label>       
                                                <select class="form-control" name="bank_account">
                                                    <option value="">Select Bank Account</option>
                                                    <?php
                                                    $bankdetail = $this->db->get('bank_accounts')->result_array();
                                                     if(!empty($bankdetail)){
                                                                foreach($bankdetail as $keys=>$values){
                                                                    ?>
                                                            <option value="<?php echo isset($values['bank_account_id']) ? $values['bank_account_id'] : '';  ?>"> <?php echo isset($values['bank_name']) ? $values['bank_name'] : ''; ?></option>
                                                              <?php        }
                                                            }?>
                                                </select>
                                            </div>  
                                        </div>
                                            
                                        <div class="col-md-4" id="cheque_number">
                                            <label>Cheque Number</label><br>
                                            <input type="text" class="form-control" placeholder="Enter Cheque Number" name="cheque_number">
                                        </div>
                                        <div>
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
                              
                                <div class="row" style="margin-left: 43%;">
                                <div class="col-lg-6">
                                    <input type="hidden" value="<?php echo isset($member_id) ?  $member_id : '';?>" name="member_id">
                                  <button class="btn btn-success" id="submit">Submit</button>
                                </div>
                               </div>
                            </div> 
                        </div>
                    </form>
                    <input type="hidden" name="total" id="total_value">
                    
                    <input type="hidden"  id="ten_val" value="0">
                    <input type="hidden"  id="twenty_val" value="0">
                    <input type="hidden"  id="fifty_val"  value="0">
                    <input type="hidden"  id="hundred_val" value="0">
                    <input type="hidden"  id="two_hundred_val" value="0">
                    <input type="hidden"  id="five_hundred_val" value="0">
                    <input type="hidden"  id="two_thousand_val" value="0">
                </div>
            </div> 
        </div>
        
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        
        <script>
            $(document).ready(function(){
               $("#cheque_number").hide(); 
               $("#bank_account").hide(); 
               $("#denomation").hide(); 
               $("#denomation1").hide(); 
               $(".tax_show").hide();

            });
        </script>
    
        <script>
         $("#payment_mode").on('change',function(){
            var payment_value = $(this).val();
            if(payment_value == "Cheque"){
              $("#cheque_number").show();  
              $("#bank_account").show(); 
              $("#denomation").hide(); 
              $("#denomation1").hide(); 
            }else if(payment_value == "Cash"){
               $("#cheque_number").hide(); 
               $("#bank_account").hide(); 
               $("#denomation").show(); 
               $("#denomation1").show(); 
            }else if(payment_value == "Online"){
               $("#cheque_number").hide(); 
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
         $(".number").on('click',function(){
             let id = $(this).attr('emi_id');  
            $("#abc_"+id).prop('checked', false);
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
         $(".payment_mode").on('change',function(){
             $("#edit-note").modal('show');
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
                  $("#ten_val").val(a);
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
                  $("#twenty_val").val(b);
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
                  $("#fifty_val").val(c);
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
                  $("#hundred_val").val(d);
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
                  $("#two_hundred_val").val(e);
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
                  $("#five_hundred_val").val(f);
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
                  $("#two_thousand_val").val(g);
                 }
                 
                 const  ten_val = $("#ten_val").val();
                 const  twenty_val  = $("#twenty_val").val();
                 const  fifty_val = $("#fifty_val").val();
                 const  hundred_val = $("#hundred_val").val();
                 const  two_hundred_val = $("#two_hundred_val").val();
                 const  five_hundred_val = $("#five_hundred_val").val();
                 const  two_thousand_val = $("#two_thousand_val").val();
                 
                 const  ttt = parseInt(ten_val) + parseInt(twenty_val) + parseInt(fifty_val) + parseInt(hundred_val) + parseInt(two_hundred_val) + parseInt(five_hundred_val) + parseInt(two_thousand_val);
                //  alert(ttt);
                //  var grandTotal = $("#total_value").val();
                 $("#total_value").val(ttt);
                 $("#total").html('<div class="table-text-total">'+ttt+'</div>');
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
            $("#submit").on('click',function(){
                //   $(".number").on('click',function(){
                //  let id = $(this).attr('emi_id');  
                // $("#abc_"+id).prop('checked', false);
         
               if($('#payment_mode').val() == ''){
                   alert('Please selected payment method');
                   return false;
               }
            });
        </script>
    
    </body>
</html>