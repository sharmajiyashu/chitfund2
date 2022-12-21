<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
    </head>
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
                <div class="container-fluid">
                    <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Master General Ledger</li>
                  </ul>      
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Ledger Transactions List</h4>
                                </div>
                            </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3" style="overflow-x:auto;">
                                <table class="data-table table mb-0 tbl-server-info" id="dtExample" >
                                    <thead>
                                    <tr class="ligth ligth-data">
                                      <th>S.No</th>
                                      <th>DESCRIPTION</th>
                                      <th>Amount</th>
                                      <th>Transaction Type</th>
                                      <th>Sub Id</th>
                                      <th>Customer</th>
                                      <th>Gl Account</th>
                                      <th>C Code</th>
                                      <th>Category desc</th>
                                      <th>Account Name</th>
                                      <th >Transcation Mode</th>
                                      <th>Additional_ref</th>
                                      <!--<th>Transaction dt</th>-->
                                      <th>When Posted</th>
                                      <th>Item</th>
                                      <th>T Ref</th>
                                      <th>User</th>
                                      <th>Plan Name</th>
                                      <th>Installment Number</th>
                                      <th>Dr/Cr</th>
                                    </tr>
                              </thead>
                              <tbody>
                                 <?php $master_legder_data =  $this->db->get('tbl_general_ledger_master')->result_array();
                                 if(!empty($master_legder_data)){ $i=0;
                                     foreach($master_legder_data as $keys => $values){
                                         if($values['type'] == 'Payment'){ ?>
                                            <?php if($values['Dr/Cr'] == 'Dr'){ $i++;?>
                                                 <tr class="odd">
                                                  <td style="text-align: center;"><?php echo $i; ?></td>
                                                  <td style="text-align: center;"><a href="#"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                  <td class="text-" style="color:red;text-align: center;"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                  <td style="text-align: center;"><?php echo isset($values['transaction_type']) ? $values['transaction_type'] : '' ; ?></td>
                                                  <td style="text-align: center;"><?php if(!empty($values['sub_id'])){ echo isset($values['sub_id']) ? $values['sub_id'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['customer'])){echo isset($values['customer']) ? $values['customer'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['gl_account'])){echo isset($values['gl_account']) ? $values['gl_account'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['c_code'])){echo isset($values['c_code']) ? $values['c_code'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['category_desc'])){echo isset($values['category_desc']) ? $values['category_desc'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['account_name'])){echo isset($values['account_name']) ? $values['account_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['transaction_mode'])){echo isset($values['transaction_mode']) ? $values['transaction_mode'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['additional_ref'])){echo isset($values['additional_ref']) ? $values['additional_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <!--<td style="text-align: center;"><?php echo isset($values['transaction_dt']) ? $values['transaction_dt'] : '' ; ?></td>-->
                                                          <td style="text-align: center;"><?php if(!empty($values['added_date'])){echo isset($values['added_date']) ? $values['added_date'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['item'])){echo isset($values['item']) ? $values['item'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['t_ref'])){echo isset($values['t_ref']) ? $values['t_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['user'])){echo isset($values['user']) ? $values['user'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['plan_name'])){echo isset($values['plan_name']) ? $values['plan_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['installment_number'])){echo isset($values['installment_number']) ? $values['installment_number'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['Dr/Cr'])){echo isset($values['Dr/Cr']) ? $values['Dr/Cr'] : '' ;}else{ echo '-';} ?></td>
                                                </tr>
                                             <?php }else{ ?>
                                                     <tr>
                                                       <td></td>
                                                      <td style="text-align: center;"><a href="#"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                      <td class="text" style="color:green;text-align: center;"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                      <td style="text-align: center;"><?php echo isset($values['transaction_type']) ? $values['transaction_type'] : '' ; ?></td>
                                                      <td style="text-align: center;"><?php if(!empty($values['sub_id'])){ echo isset($values['sub_id']) ? $values['sub_id'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['customer'])){echo isset($values['customer']) ? $values['customer'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['gl_account'])){echo isset($values['gl_account']) ? $values['gl_account'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['c_code'])){echo isset($values['c_code']) ? $values['c_code'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['category_desc'])){echo isset($values['category_desc']) ? $values['category_desc'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['account_name'])){echo isset($values['account_name']) ? $values['account_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['transaction_mode'])){echo isset($values['transaction_mode']) ? $values['transaction_mode'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['additional_ref'])){echo isset($values['additional_ref']) ? $values['additional_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <!--<td style="text-align: center;"><?php echo isset($values['transaction_dt']) ? $values['transaction_dt'] : '' ; ?></td>-->
                                                          <td style="text-align: center;"><?php if(!empty($values['added_date'])){echo isset($values['added_date']) ? $values['added_date'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['item'])){echo isset($values['item']) ? $values['item'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['t_ref'])){echo isset($values['t_ref']) ? $values['t_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['user'])){echo isset($values['user']) ? $values['user'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['plan_name'])){echo isset($values['plan_name']) ? $values['plan_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['installment_number'])){echo isset($values['installment_number']) ? $values['installment_number'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['Dr/Cr'])){echo isset($values['Dr/Cr']) ? $values['Dr/Cr'] : '' ;}else{ echo '-';} ?></td>
                                                    </tr>
                                                    <tr>
                                                        <!--<td colspan="250" style="text-align: center;"><b><?php echo isset($values['transaction_description']) ? $values['transaction_description'] : '' ; ?></b></td>-->
                                                        
                                                    <!--</tr><tr>-->
                                                    <!--    <td colspan="20" style="background-color: floralwhite;"></td>-->
                                                    <!--</tr>-->
                                                    
                                             <?php } 
                                         }
                                         else{ ?>
                                                   <?php if($values['Dr/Cr'] == 'Dr'){ $i++;?>
                                                       <tr>
                                                           <td style="text-align: center;" ><?php echo $i; ?></td>
                                                          <td style="text-align: center;"><a href="#"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                          <td class="text" style="color:green;text-align: center;"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['transaction_type'])){echo isset($values['transaction_type']) ? $values['transaction_type'] : '' ;}else{echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['sub_id'])){ echo isset($values['sub_id']) ? $values['sub_id'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['customer'])){echo isset($values['customer']) ? $values['customer'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['gl_account'])){echo isset($values['gl_account']) ? $values['gl_account'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['c_code'])){echo isset($values['c_code']) ? $values['c_code'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['category_desc'])){echo isset($values['category_desc']) ? $values['category_desc'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['account_name'])){echo isset($values['account_name']) ? $values['account_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['transaction_mode'])){echo isset($values['transaction_mode']) ? $values['transaction_mode'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['additional_ref'])){echo isset($values['additional_ref']) ? $values['additional_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <!--<td style="text-align: center;"><?php echo isset($values['transaction_dt']) ? $values['transaction_dt'] : '' ; ?></td>-->
                                                          <td style="text-align: center;"><?php if(!empty($values['added_date'])){echo isset($values['added_date']) ? $values['added_date'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['item'])){echo isset($values['item']) ? $values['item'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['t_ref'])){echo isset($values['t_ref']) ? $values['t_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['user'])){echo isset($values['user']) ? $values['user'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['plan_name'])){echo isset($values['plan_name']) ? $values['plan_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['installment_number'])){echo isset($values['installment_number']) ? $values['installment_number'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['Dr/Cr'])){echo isset($values['Dr/Cr']) ? $values['Dr/Cr'] : '' ;}else{ echo '-';} ?></td>
                                                    </tr>
                                                    <?php }else{ ?>
                                                     <tr class="odd">
                                                         <td></td>
                                                          <td style="text-align: center;"><a href="#"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                          <td class="text-" style="color:red;text-align: center;"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                          <td style="text-align: center;" ><?php echo isset($values['transaction_type']) ? $values['transaction_type'] : '' ; ?></td>
                                                         <td style="text-align: center;"><?php if(!empty($values['sub_id'])){ echo isset($values['sub_id']) ? $values['sub_id'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['customer'])){echo isset($values['customer']) ? $values['customer'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['gl_account'])){echo isset($values['gl_account']) ? $values['gl_account'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['c_code'])){echo isset($values['c_code']) ? $values['c_code'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['category_desc'])){echo isset($values['category_desc']) ? $values['category_desc'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['account_name'])){echo isset($values['account_name']) ? $values['account_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['transaction_mode'])){echo isset($values['transaction_mode']) ? $values['transaction_mode'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['additional_ref'])){echo isset($values['additional_ref']) ? $values['additional_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <!--<td style="text-align: center;"><?php echo isset($values['transaction_dt']) ? $values['transaction_dt'] : '' ; ?></td>-->
                                                          <td style="text-align: center;"><?php if(!empty($values['added_date'])){echo isset($values['added_date']) ? $values['added_date'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['item'])){echo isset($values['item']) ? $values['item'] : '' ; }else{ echo '-';}?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['t_ref'])){echo isset($values['t_ref']) ? $values['t_ref'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['user'])){echo isset($values['user']) ? $values['user'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['plan_name'])){echo isset($values['plan_name']) ? $values['plan_name'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['installment_number'])){echo isset($values['installment_number']) ? $values['installment_number'] : '' ;}else{ echo '-';} ?></td>
                                                          <td style="text-align: center;"><?php if(!empty($values['Dr/Cr'])){echo isset($values['Dr/Cr']) ? $values['Dr/Cr'] : '' ;}else{ echo '-';} ?></td>
                                                     </tr>
                                                    <!--<tr>-->
                                                    <!--    <td colspan="250" style="text-align: center;"><b><?php echo isset($values['transaction_description']) ? $values['transaction_description'] : '' ; ?></b></td>-->
                                                    <!--</tr><tr>-->
                                                    <!--    <td colspan="20" style="background-color: floralwhite;"></td>-->
                                                    <!--</tr>-->
                                             
                                       <?php } }
                                     }
                                 }
                                 ?>
                                    </tbody>
                                </table>
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
    </body>
</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>  

<script>
   $(document).ready( function () {  
    $('#dtExample').DataTable();  
    } )
</script>