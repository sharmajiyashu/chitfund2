<!doctype html>
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
           <!--<ul class="breadcrumb">-->
           <!--         <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>-->
           <!--         <li><a href="<?php echo base_url('Dashboard/subscriber_listing'); ?>">Subscribers</a>&nbsp;&nbsp;>&nbsp;</li>-->
           <!--         <li><a href="<?php echo base_url('Dashboard/getmoreviewmember/'.$data2['member_id']); ?>"><?php print_r($data2['name']); ?></a>&nbsp;&nbsp;>&nbsp;</li>-->
           <!--         <li class="active">Invoice</li>-->
           <!--       </ul>-->
           
          <div id="ui-view">
    <div>
      
    <div class="card" >
        <div class="card-header"> Invoice<strong>#BBB-245432</strong>
            <div class="pull-right"> 
                <a class="btn btn-sm btn-info" href="#" data-abc="true" onclick="printDiv('printableArea')"><i class="fa fa-print mr-1"></i> Print</a> 
                <!--<a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a>-->
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
                   
                    <div class="col-sm-12">
                        <h6 class="mb-3" style="text-align: end; ">Date:02nd Dec'22</h6>
                        <!--<h6 class="mb-3" style="text-align: center; font-size: 33px;"><b>Payment Due Notice</b></h6>-->
                    </div>
                    
                    <div class="col-sm-12">
                        <p>
                            <h6>To,</h6><h5>Mr.Manjunath S</h5>
                            No.17, 4th Cross <br>Magadiroad, Bangalore, Karnataka, 560023<br>Mob: 9886920962


                            
                            
                            <br><br>
                            Dear Subscriber,<br>
                            
                            <h5>Reg: Your Subscription Id  No :032110L37 of Value Rs.1000000/. in Mar'21 10Lac Chit Plan</h5><br>
                            
                           We are pleased to Inform that you became the prized subscriber in the Chit Auction
                            held on 06-Nov-22 for a discount of Rs.1,00,000/- only for the plan mentioned above, and the
                            disbursement particulars are as below. <br> 
                            Kindly provide all the necessary documents with in one weeks time from the date of this 
                            letter with respect to the collaterals and guarantor information along with your bank account 
                            details, without fail to facilitate smooth and timely settlement
                            
                            <br>
                            <br>
    
                        <div class="col-sm-5" style="text-align: center;">
                         <table id="detail_table" class="data-table table mb-0 tbl-server-info ">
                          <tr><th>Particulars</th><td>Amount in Rs.</td></tr>
                          <tr><th>Chit value</th><td> 10,00,000</td></tr>
                          <tr><th>Less Discount</th><td> 1,00,000 </td></tr>
                          <tr><th>Gross Chit Amount</th><td> 9,00,000</td></tr>
                          <tr><th>Bal B/f</th><td>-</td></tr>
                          <tr><th>Less Chit EMI due</th><td> 50,000 </td></tr>
                          <tr><th>Less GST</th><td>-</td></tr>
                          <tr><th>Registration and Govt Duty</th><td> 1,000 </td></tr>
                          <tr><th>Total Deductions</th><td> 51,000 </td></tr>
                          <tr><th>Net Chit Amount</th><td> 8,49,000 </td></tr>
                        </table>
                        </div>

                            <br>Thanks & Regards,<br><br>
                            <h6>MYM Chit Fund Pvt Ltd</h6>No.19,  5th, Cross,6th Block,<br>Rajajinagar, Bangalore - 560010
                        </p>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
  </div>
       </div>
    </div>
</div>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>