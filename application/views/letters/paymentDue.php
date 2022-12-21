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
                        <h6 class="mb-3" style="text-align: center; font-size: 33px;"><b>Payment Due Notice</b></h6>
                    </div>
                    
                    <div class="col-sm-12">
                        <p>
                            <h6>To,</h6><h5>Shri.Ravi Ji</h5>
                            #36,Nagamma Nagar , KP Agrahara <br>Bangalore-560023
                            <br><br>
                            <h4>Reference: Payment of Rs.1,07,753/. required Immediately</h4>
                            <br>
                            Dear Madam & Sir,<br>
                            We have not received any communication regarding all the dues to be settled,towards MYM Chit Fund Pvt Ltd as detailed in the schedule of charges below.
                            <br>Please consider this as high priority to respond and settle all the dues towards MYM chit Fund Pvt. Ltd. before 03rd Nov 2022. <br> 
                            We regret that you have ignored our intimation calls and messages requesting you to make the payments overdue in respect of your chits. We agreed to take you as a member
                            on the clear understanding that you would pay your instalments regularly each month. But,now we can only conclude that you are endeavoring to avoid your responsibility under the
                            agreement you entered with us at the time of your enrollment and while bidding and accepting your chit amounts from us.
                            <br><h6>
                                This is a final request for your immediate payment of the following instalments without fail by end of day 03rd Nov’22 else effort will be made to recover the
                                current dues, future dues without any dividend with damage charges being applicable with the help of Court of Law and Police department. 
                            </h6>Please refer to the statement of charges attached to this note for breakup of your Dues,Damage charges and Receipts which are final.
                            <br>Regards,<br><br>
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