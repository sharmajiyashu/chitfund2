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
    
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
       <div class="container-fluid mt-100 mb-100">
          <div id="ui-view">
    <div>
    <div class="card">
        <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
        <div class="card-header"> Invoice<strong>#BBB-245432</strong>
            <!--<div class="pull-right"> <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-print mr-1"></i> Print</a> <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a></div>-->
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <h6 class="mb-3">Details:</h6>
                        <div>Invoice<strong>N-195520</strong></div>
                        <div>Name: <?php echo isset($member_name) ? $member_name : ''; ?></div>
                        <div>Month: Feb-22</div>
                        <div>Chit-Discount Date/Auction Date: 6-Feb-22</div>
                    </div>
                    
                    <div class="col-sm-8">
                        <h6 class="mb-3"></h6>
                        <div>Cust#<strong>MYM0482</strong></div>
                        <div>Mob#:<?php echo isset($member_mobile) ? $member_mobile : ''; ?> </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Tenure</th>
                                <th>EMI</th>
                                <th>Div</th>
                                <th>Mth</th>
                                <th>Rem</th>
                                <th>Bid Amt </th>
                                <th>End_Mth</th>
                                <th>Total Div</th>
                                <th>Chit Tkn?</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php if(isset($data) && is_array($data)) { ?>
                          <?php foreach($data as $key => $value) { ?>
                            <tr>
                                <td class="left"><?php echo isset($value['plan_name']) ? $value['plan_name'] : ''; ?></td>
                                <td class="left"><?php echo isset($value['tenure']) ? $value['tenure'] : ''; ?></td>
                                <td class="center">₹<?php echo isset($value['emi']) ? $value['emi'] : ''; ?></td>
                                <td class="right">₹0</td>
                                <td class="right"><?php echo isset($value['months_completed']) ? $value['months_completed'] : ''; ?></td>
                                <td class="left"><?php echo isset($value['remaining_month']) ? $value['remaining_month'] : ''; ?></td>
                                <td class="center">2100,2100</td>
                                <td class="right"><?php echo isset($value['end_date_for_subscription']) ? $value['end_date_for_subscription'] : ''; ?></td>
                                <td class="right">₹16,800</td>
                                <td class="right">Feb-22</td>
                            </tr>
                         <?php } ?>
                         <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-5">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: darkgray;">
                                    <td class="left"><strong>Total</strong></td>
                                    <td></td>
                                    <td class="right" style="text-align: center;">₹8500</td>
                                    <td class="right">₹8500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: beige;">
                                    <td class="left"><strong>Net Payment Calculation</strong></td>
                                    <td class="right"></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Total EMI</strong></td>
                                    <td class="right" style="text-align: center;">₹46,000</td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Dividend</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹-980</strong></td>
                                </tr>
                                <tr style="background: coral;">
                                    <td class="left"><strong>Gross Amount</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹45,020</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: beige;">
                                    <td class="left"><strong>Chit Taken (if any)</strong></td>
                                    <td class="right"></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Feb '20 2.1 Lac</strong></td>
                                    <td class="right" style="text-align: center;">₹2,10,000</td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Less:Bid Amount</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹-2,100</strong></td>
                                </tr>
                                <tr style="background: coral;">
                                    <td class="left"><strong>Principal Less Bid</strong></td>
                                    <td class="right" style="text-align: center;"><strong>₹2,07,900</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <table class="table table-clear">
                            <tbody>
                                <tr style="background: lightblue;">
                                    <td class="left"><strong>NET AMOUNT PAYABLE</strong></td>
                                    <td class="right" style="text-align: center;">₹1,62,880</td>
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
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>