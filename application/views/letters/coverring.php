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
                        <h6 class="mb-3" style="text-align: end; ">Date:02nd Dec'22 <br>Place:Bangalore </h6>
                        <h6 class="mb-3" style="text-align: center; font-size: 20px;"><b>FORM - V <br>(See Section 9(1) and Rule 10)</b></h6>
                    </div>
                    
                    <div class="col-sm-12">
                        <p>
                            <h6>To,</h6><h5>The Registrar of Chit funds,</h5>
                            Central Zone, Bangalore, <br>Karnataka
                            <br><br>
                            <h5>Sub: Requesting CC for the chit plan with PSO# DRB-4/Chits/CFS/384/2022-23/Jul 2022 50K A</h5>
                            <br>
                            Dear Madam & Sir,<br>
                                       By your letter dated the 01 Sep, 2022 you were pleased to grant us Prior Sanction ,				

                            <br>Order# (PSO) DRB-4/Chits/CFS/384/2022-23 to commence a new chit plan of chit amount	,			
                            
                            Rs.50000/. (Rupees Fifty Thousand Only) with a duration of 25 months , 				

                            We have subsequently enlisted the required number of members and we hereby declare in 		
                            
terms of sub-section(1) of Section 9 of the Chit Funds Act, 1982 (Central Act No. 40 of 1982)  ,	
			that all the tickets specified in the chit agreement have been fully subscribed and hence 				
<br>requesting you to provide us with CC for the same purpose mentioned above. 			 <br>	


                            <br>Yours faithfully,<br><br>V.Kalaiarasi <br>for and on behalf of (Foreman)
                            <h6>MYM Chit Fund Pvt Ltd</h6>
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