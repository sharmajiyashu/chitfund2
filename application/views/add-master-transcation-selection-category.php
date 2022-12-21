
<!doctype html>
<html lang="en">

    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
     <style>
      .error{
          color:#E08DB4;
      }

    </style>
    <body class="  ">
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
                <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                <div class="container-fluid add-form-list">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <?php if(!empty($data['master_employee_id'])){ ?> 
                                        <h4 class="card-title">
                                          Update Employee 
                                          <?php } else{ ?>
                                          Add Employee
                                        </h4>
                                       <?php } ?> 
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/AddtranscationSelectCategory" method="post" data-toggle="validator">
                                     
                                        <input type="hidden" name="id" value="<?php echo isset($data['master_employee_id']) ? $data['master_employee_id'] : '' ;  ?>" /> 
                                        
                                        <?php  $data = $this->db->get('tbl_transaction_type_master')->result_array();
                                        if(!empty($data)){
                                            foreach($data as $keys => $values){
                                        ?>
                                                                       
                                         <div class="row"> 
                                           
                                            <div class="col-md-4"> 
                                                <div class="form-group">
                                                    <label> Select Subscriber*</label>
                                                    <input type="text" readonly class="form-control" value="<?php echo isset($values['name']) ? $values['name'] : '' ;  ?>">
                                                </div>
                                            </div> 
                                            
                                            <div class="col-md-4">                      
                                                <div class="form-group">
                                                    <label> Select Category *</label>
                                                        <select class="form-control" name="payment_method" id="payment_method">
                                                             <option value="">Select Transaction Type</option>
                                                             <?php $data = $this->db->get('tbl_transaction_type_master')->result_array();?>
                                                             <?php foreach($data as $keys=>$values){ ?>
                                                                <option value="<?php echo isset($values['code']) ? $values['code'] :''; ?>"><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                             <?php } ?>
                                                        </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">                      
                                                <div class="form-group">
                                                    <label> General Ledger AC *</label>
                                                        <select class="form-control" name="payment_method" id="payment_method">
                                                             <option value="">Select Transaction Type</option>
                                                             <?php $data = $this->db->get('tbl_ledger_account')->result_array();?>
                                                             <?php foreach($data as $keys=>$values){ ?>
                                                                <option value="<?php echo isset($values['code']) ? $values['code'] :''; ?>"><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                             <?php } ?>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        <?php }} ?>
                                        <?php if(!empty($data['master_employee_id'])){ ?> 
                                            <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit"> Update Employee  </button> 
                                        <?php } else{ ?>  
                                           <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">  Add Employee  </button>
                                        <?php } ?>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
            </div>
        </div>
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>
             $(document).ready(function () {

                $("#myform").validate({

                    rules: {

                        agent_commission: {
                            required: true,
                            min: 1,
                            max:100
                        },   
                        foreman_fees: {
                            required: true,
                            min: 1,
                            max:100
                        },  
                         max_bid: {
                            required: true,
                            min: 1,
                            max:100
                        },  
                          
                          admission_fee: {
                            required: true,
                            min: 1,
                            max:100
                        },
                    },
                    messages: {

                        agent_commission: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        },          
                         foreman_fees: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 
                        max_bid: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 
                         admission_fee: {
                            min: "Please enter valid Percentage ",
                            max: "Please enter valid Percentage"
                        }, 

                    }

                });
            });
        </script>
        
        <script>
        $('#num').keydown(function(e) {
          if (e.keyCode === 190 || e.keyCode === 110) {
            e.preventDefault();
          }
        });
        </script>
        
        <script>
            $("#total_month").on('change',function(){
                let start_month = $("#start_month").val();
                let total_month = $(this).val();
                let futureDate = convert(addMonths(new Date(start_month),total_month).toString());
                $("#endSubscription").val(futureDate);
            });
        </script>
        
        <script>
            $("#tenure").on('change',function(){
                let start_month = $("#plan_amount").val();
                let tenure = $(this).val();
                let futureDate = start_month / tenure ;
                $("#emi_calculate").val(futureDate);
            });
        </script>
        
        <script>
            function addMonths(date, months) {
                var d = date.getDate();
                date.setMonth(date.getMonth() + +months);
                if (date.getDate() != d) {
                  date.setDate(0);
                }
                return date;
            } 
            
            function convert(str) {
              var date = new Date(str),
                mnth = ("0" + (date.getMonth())).slice(-2),
                day = ("0" + date.getDate()).slice(-2);
              return [date.getFullYear(), mnth, day].join("-");
            }
        </script>
    </body>
</html>