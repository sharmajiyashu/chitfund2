<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);


.mt-100 {
    margin-top: 50px
}

.mb-100 {
    margin-bottom: 50px
}

.card {
    border-radius: 1px !important
}

.card-header {
    background-color: #fff
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.btn-sm,
.btn-group-sm>.btn {
    padding: .25rem .5rem;
    font-size: .765625rem;
    line-height: 1.5;
    border-radius: .2rem
}
    </style>
    <body>
        
        <script>
        function printDiv(divName) {
            $('#fill_logo').show();
            
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
    
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
       <div class="container-fluid mt-100 mb-100">
           <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>
                    <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$data2['member_id']); ?>"><?php print_r($data2['name']); ?></a>&nbsp;&nbsp;>&nbsp;</li>
                    <li class="active">Subscriber Summary</li>
                  </ul>
           
          <div id="ui-view">
    <div>
    <div class="card" >
        <div class="card-header"> 
         <div class="pull-right"> 
                <a class="btn btn-sm btn-info " href="#" data-abc="true" onclick="printDiv('printableArea')"><i class="fa fa-print mr-1"></i> Print</a> 
                <!--<a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a>-->
            </div>
            <div class="row">
                <!--<div class="col-md-8" >Invoice<strong>#BBB-245432</strong></div>-->
                
                <div class="col-md-1" >
                      <form action="<?php echo base_url(); ?>Dashboard/subscriberSummary" method="POST">
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
                                     <input type="number" class="form-control" placeholder="Enter Tenure"  required name="year" value="<?php echo isset($date_time['year']) ? $date_time['year'] :'' ?>">
                                     <input type="hidden" name="member_id" value="<?php echo isset($member_detail['member_id'])?$member_detail['member_id']:'' ?>">
                                 </div>
                             </div> 
                            <div class="form-group">
                              <button class="form-control" name="submit">Submit</button>
                            </div>
                             </form> <?php $month = isset($date_time['mnth_filter']) ? $date_time['mnth_filter'] :''; $year = isset($date_time['year']) ? $date_time['year'] :'';  $InputArray = array($year,$month);
                                                                                                                                                                            $month_year =    implode("-",$InputArray);  ?>
            </div>
            </div>
            <div class="card-body" id="printableArea">
                <div class="row mb-4" >
                    
                   
                   <div class="col-md-12">
                        
                       <div><b class="mb-2" style="float:right;">CIN#U65990KA2018PTC119771</b></div><br>
                       
                       <div style="text-align:center;" class="mt-2">
                           <div class="row">
                               <div class="col-md-1">
                                   <img src="<?php echo base_url('images/logo.jpeg') ?>" alt="image" style="width: 100px;    height: 100px;margin-bottom: 33px;">
                               </div>
                               <div class="col-md-10">
                                   <h2 style="text-align:center">MYM Chit Fund Pvt Ltd.</h2>
                       <h4>No.19, 5th cross, 6th Block ,Rajajinager,Bangalore, Pin-560010</h4>
                       <h4>Email: mymchitfund@gmail.com, Contact: 7349338333</h4>
                               </div>
                           </div>
                           
                       
                       </div>
                   </div>
                </div>
                
                <div class="row mb-4">
                    <?php 
                         foreach($data as $keys=>$values){
                                if($values['chit_taken']!='No'){
                                    $chit_detail = $values['chit_taken'];
                                    break;
                                }
                            }if(!empty($chit_detail)){
                            $month_date = isset($chit_detail) ? $chit_detail :'No';
                            $newDate = date("Y-M-d", strtotime($month_date));  
                            }
                            else{
                                $newDate = 'No';
                            }
                              
                    ?>
                    
                    <div class="col-sm-4">
                        
                        <h6 class="mb-3">Details:</h6>
                        <div>subscriber<strong>N-195520</strong></div>
                        <div>Name: <?php echo isset($member_detail['name'])?$member_detail['name']:''; ?></div>
                        <div>Month: <?php echo $month_year ?></div>
                        <!--<div>Chit-Discount Date/Auction Date:<?php echo isset($newDate) ? $newDate :'No' ?></div>-->
                    </div>
                    
                    <div class="col-sm-8">
                        <h6 class="mb-3"></h6>
                        <div>Cust#<strong>MYM<?php echo isset($member_detail['member_id'])?$member_detail['member_id']:''; ?></strong></div>
                        <div>Mob#: <?php echo isset($member_detail['mobile'])?$member_detail['mobile']:''; ?></div>
                        <div>Opening Balance#: <?php echo isset($member_detail['opening_balance'])?$member_detail['opening_balance']:''; ?></div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Mths</th>
                                <th>EMI</th>
                                <th>Share of Discount</th>
                                <th>C.Mth</th>
                                <th>Rem</th>
                                <th>Subscription Id</th>
                                <th>End_Mth</th>
                                <th>Discount Amount</th>
                                <!--<th>Total Divident </th>-->
                                <th>Chit Tkn?</th>
                            </tr>
                        </thead>
                        <?php if(!empty($data)){
                            $sum_of_emi = 0; $sum_of_divident = 0;
                            foreach($data as $keys=>$values){
                                    $sum_of_emi += isset($values['emi']) ? $values['emi'] :0;
                                    if(is_numeric($values['divident'])){
                                    $sum_of_divident += isset($values['divident']) ? $values['divident'] :0;
                                    }else{
                                       $sum_of_divident +=0; 
                                    }
                                ?>
                        <tbody>
                            <tr>
                                <td class="left"><?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?></td>
                                <td class="left"><?php echo isset($values['total_months']) ? $values['total_months'] :'' ?></td>
                                <td class="center">₹<?php echo isset($values['emi']) ? $values['emi'] :'' ?></td>
                                <td class="right">₹<?php  if(!empty($values['divident'])){ echo isset($values['divident']) ? $values['divident'] :'0'; }else{echo '0';}?></td>
                                <td class="right"><?php echo isset($values['months_completed']) ? $values['months_completed'] :'' ?></td>
                                <td class="left"><?php echo isset($values['remaining_month']) ? $values['remaining_month'] :'' ?></td>
                                <td class="center"><?php echo isset($values['subscription_id']) ? $values['subscription_id'] :'0' ?></td>
                                <td class="right"><?php echo isset($values['end_month']) ? $values['end_month'] :'' ?></td>
                                <td class="right"><?php if(!empty($values['discount'])){echo isset($values['discount']) ? $values['discount'] :'0';}else{echo '-';} ?></td>
                                <!--<td class="right"><?php echo isset($values['total_divident']) ? $values['total_divident'] :'0' ?></td>-->
                                <td class="right"><?php echo isset($values['chit_taken']) ? $values['chit_taken'] :'No' ?></td>
                            </tr>
                        </tbody>
                        <?php
                            }}
                         ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: darkgray;">
                                    <td class="left"><strong>Total</strong></td>
                                    <td style="width:7%;"></td>
                                    <td class="right" style="text-align: center;">₹<?php echo isset($sum_of_emi) ? $sum_of_emi :'0' ?></td>
                                    <td class="right">₹<?php echo isset($sum_of_divident) ? $sum_of_divident :'0' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table table-clear">
                            <!--<tbody>-->
                                <tr style="background: beige;">
                                    <td class="left"><strong>Net Payment Calculation</strong></td>
                                    <td class="right"></td>
                                    <!--<td></td>-->
                                </tr>
                                <tr>
                                    <td style="width:49%"><strong>Total EMI</strong></td>
                                    <td class="right">₹<?php echo isset($sum_of_emi) ? $sum_of_emi :'0' ?></td>
                                    <!--<td></td>-->
                                </tr>
                                <tr>
                                    <td class="left"><strong>Share of Discount</strong></td>
                                    <td class="right"><strong>₹<?php echo isset($sum_of_divident) ? $sum_of_divident :'0' ?></strong></td>
                                    <!--<td></td>-->
                                </tr>
                                
                                <?php 
                                    $sum_of_emi = isset($sum_of_emi) ? $sum_of_emi :'0';
                                    $sum_of_divident = isset($sum_of_divident) ? $sum_of_divident :'0';
                                    $GrossAmount = ($sum_of_emi - $sum_of_divident);
                                ?>
                                
                                <tr style="background: coral;">
                                    <td class="left"><strong>Gross Amount</strong></td>
                                    <td class="right"><strong>₹<?php echo isset($GrossAmount) ? $GrossAmount : 0; ?></strong></td>
                                    <!--<td></td>-->
                                </tr>
                            <!--</tbody>-->
                        </table>
                    </div>
                </div>
                
                <?php if(!empty($data)){
                    $chit_detail_for_invoice = array();
                            foreach($data as $keys=>$values){
                                if($values['chit_taken']!='No'){
                                    $chit_data = array(
                                        'plan_name'=>$values['plan_name'],
                                        'plan_amount'=>$values['plan_amount'],
                                        'winning_bid_amount'=>$values['winning_bid_amount'],
                                        );
                                        $chit_detail_for_invoice[] = $chit_data;
                                }
                            }
                }
                ?>
                
                <?php if(!empty($chit_detail_for_invoice)){
                    $sum_of_plan_amount = 0;
                    $sum_of_winning_bid_amount = 0;
                    foreach($chit_detail_for_invoice as $k=>$v){
                       $plnamt = isset($v['plan_amount'])?$v['plan_amount']:0;
                        $wngbidamt =  isset($v['winning_bid_amount'])?$v['winning_bid_amount']:0;
                         $sum_of_winning_bid_amount =+ $wngbidamt;
                          $sum_of_plan_amount =+ $plnamt;
                        
                    ?> 
                    
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: beige;">
                                    <td class="left"><strong>Chit Taken (if any)</strong></td>
                                    <td class="right"></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong><?php echo isset($v['plan_name'])?$v['plan_name']:'' ?></strong></td>
                                    <td class="right" style="text-align: center;">₹<?php echo isset($v['plan_amount'])?$v['plan_amount']:'' ?></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Less:Discount Amount</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹<?php echo isset($v['winning_bid_amount'])?$v['winning_bid_amount']:'' ?></strong></td>
                                </tr>
                                <tr style="background: coral;">
                                    <td class="left"><strong>Principal Less Discount</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹<?php $defference_of_plan_amount_and_bid = $sum_of_plan_amount - $sum_of_winning_bid_amount; echo isset($defference_of_plan_amount_and_bid)?$defference_of_plan_amount_and_bid:''; ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                }}
                ?>
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: lightblue;">
                                    <td class="left"><strong>NET AMOUNT PAYABLE</strong></td>
                                    <?php $g_amount = isset($GrossAmount)?$GrossAmount:'0';
                                        $pld = isset($defference_of_plan_amount_and_bid)?$defference_of_plan_amount_and_bid:'0';
                                        $defference_of_ga_pld = $g_amount - $pld; ?>
                                    <td class="right" style="text-align: center;">₹<?php echo isset($defference_of_ga_pld)?$defference_of_ga_pld:''  ;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h1> </h1>
            </div>
        </div>
    </div>
  </div>
       </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
    $('#fill_logo').hide();
});
</script>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>