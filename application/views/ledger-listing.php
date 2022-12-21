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
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Ledger Transactions List</h4>
                                </div>
                            </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead>
                                    <tr>
                                      
                                      <th>DESCRIPTION</th>
                                      <!--<th>More Information</th>-->
                                      <th class="text-right">DEBITS</th>
                                      <th class="text-right">CREDITS</th>
                                      <th class="text-right">DATE</th>
                                      <th class="text-right">IS SYSTEM</th>
                                      <!--<th class="text-right">ACTIONS</th>-->
                                    </tr>
                              </thead>
                              <tbody>
                                  <?php if(isset($getLedger) && is_array($getLedger)){ ?>
                                  <?php $i=1; foreach($getLedger as $key => $value){ ?>
                                 <?php  if($value['id'] % 4 == 1){  ?>
                                     
                                      <tr class="even">
                                        <td class="ft-600"><?php echo isset($value['reference']) ? strtoupper($value['reference']) : '' ; ?></td>
                                        <td></td>
                                        <td></td>

                                        <td class="text-right"><?php echo isset($value['added_date']) ? date('d-m-Y h:i',strtotime($value['added_date'])) : '' ; ?></td>
                                        <?php if($value['is_system'] == 'Yes'){ ?>
                                        <td class="text-right"><span style="color:green">Yes</span></td>
                                        <?php }else{ ?>
                                         <td class="text-right"><span style="color:red">No</span></td>
                                        <?php } ?>
                                      </tr>
                                      
                                  <?php }else{ ?> 
                                      
                                      <?php if($value['debit'] != ''){ ?>
                                       <tr class="odd">
                                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><?php echo isset($value['reference']) ? strtoupper($value['reference']) : '' ; ?></a></td>
                                          <td class="text-right" style="color:red"><?php echo isset($value['debit']) ? $value['debit'] : '' ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>

                                    <?php }else if($value['credit'] != ''){ ?>
                                       <tr>
                                          <td><a href="#" style="margin-left: 24%;"><?php echo isset($value['reference']) ? strtoupper($value['reference']) : '' ; ?></a></td>
                                          <td></td>
                                          <td class="text-right" style="color:green"><?php echo isset($value['credit']) ? $value['credit'] : '' ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                    <?php }else{  ?>
                                        <tr>
                                          <td><a><?php echo isset($value['reference']) ? strtoupper($value['reference']) : '' ; ?></a></td>
                                          <td></td>
                                          <td class="text-right" style="color:green"><?php echo isset($value['credit']) ? $value['credit'] : '' ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <td></td>
                                    <?php } ?>
                                  <?php } ?>
                                 <?php $i++; } }?>
                                 
                                 <?php $master_legder_data =  $this->db->get('tbl_general_ledger_master')->result_array();
                                 if(!empty($master_legder_data)){
                                     foreach($master_legder_data as $keys=>$values){
                                         if($values['type'] == 'Payment'){?>
                                            <?php if($values['Dr/Cr'] == 'Dr'){?>
                                                     <tr class="even">
                                                        <td class="ft-600"><?php echo isset($values['transaction_type']) ? strtoupper($values['transaction_type']) : '' ; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right"><?php echo isset($values['added_date']) ? date('d-m-Y h:i',strtotime($values['added_date'])) : '' ; ?></td>
                                                        <?php if($value['is_system'] == 'Yes'){ ?>
                                                        <td class="text-right"><span style="color:green">Yes</span></td>
                                                        <?php }else{ ?>
                                                         <td class="text-right"><span style="color:red">No</span></td>
                                                        <?php } ?>
                                                      </tr>
                                            
                                                 <tr class="odd">
                                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                  <td class="text-right" style="color:red"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                             <?php }else{ ?>
                                                     <tr>
                                                      <td><a href="#" style="margin-left: 24%;"><?php echo isset($values['account_description']) ? strtoupper($values['account_description']) : '' ; ?></a></td>
                                                      <td></td>
                                                      <td class="text-right" style="color:green"><?php echo isset($values['amount']) ? $values['amount'] : '' ; ?></td>
                                                      <td></td>
                                                      <td></td>
                                                      <td></td>
                                                    </tr>
                                                    <tr class="even">
                                                    <td class=""> <?php echo isset($values['transaction_description']) ? $values['transaction_description'] : '' ; ?> </td>
                                                    </tr>
                                                    <td></td>
                                             <?php } 
                                         }
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