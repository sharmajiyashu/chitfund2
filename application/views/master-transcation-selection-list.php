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
                    <li><a href="#">Master </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Master Tran.T. C.Selection</li>
                  </ul> 
                    <div class="row">
                         
                        
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Master Transaction Selection category</h4>
                                </div>
                                 <!--<a href="<?php echo base_url(); ?>Dashboard/MasterTranscationSelectionList" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Employee </a>-->
                            </div>
                        
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr.No.</th>
                                            <th>Transaction Type</th>
                                            <th>Transaction Category</th>
                                            <th>General Ledger(From)</th>
                                            <th>General Ledger(TO)</th>
                                        </tr>
                                    </thead>
                                    
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/AddtranscationSelectCategory" method="post" data-toggle="validator">
                                    
                                    <tbody class="ligth-body">
                                        <?php $data = $this->db->get('tbl_transaction_type_master')->result_array(); if(isset($data) && is_array($data)){ ?>
                                        <?php $i=1; foreach($data as $key => $value) {  ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo isset($value['name']) ? $value['name'] : ''; ?></td>
                                            
                                              <input type="hidden" name="transcation_type_code[]" value="<?php echo isset($value['transaction_type_master_id']) ? $value['transaction_type_master_id'] : ''; ?>">
                                              
                                            <td><div class="form-group">
                                                        <select class="form-control" name="category_code[]" id="payment_method">
                                                            <?php $checkgl = $this->db->where('transaction_type_id',$value['transaction_type_master_id'])->get('tbl_transcation_type_category_selection_master')->row_array(); ?>
                                                            <?if(empty($checkgl['category_id'])){?>
                                                                <option value="">(Select Category) </option>
                                                                 <?php $data1 = $this->db->get('tbl_category')->result_array();?>
                                                                 <?php foreach($data1 as $keys=>$values){ ?>
                                                                    <option value="<?php echo isset($values['category_id']) ? $values['category_id'] :''; ?>" ><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                                 <?php } ?>
                                                            <?php }else{ ?>
                                                                <option value="">(Select Category) </option>
                                                             <?php $data1 = $this->db->get('tbl_category')->result_array();?>
                                                             <?php foreach($data1 as $keys=>$values){ ?>
                                                                <option value="<?php echo isset($values['category_id']) ? $values['category_id'] :''; ?>" <?PHP if ($checkgl['category_id'] == $values['category_id'] ) echo 'selected'; ?> ><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                             <?php } ?>
                                                           <?php } ?>
                                                             
                                                        </select>
                                                </div>
                                            </td>
                                            <td><div class="form-group">
                                                        <select class="form-control" name="general_ledger_code_from[]" id="payment_method">
                                                            <?php $checkgl = $this->db->where('transaction_type_id',$value['transaction_type_master_id'])->get('tbl_transcation_type_category_selection_master')->row_array(); ?>
                                                            <?php if(empty($checkgl['general_ledger_id_from'])){ ?>
                                                                 <option value="">(Select General ledger)</option>
                                                                 <?php $data2 = $this->db->get('tbl_ledger_account')->result_array();?>
                                                                 <?php foreach($data2 as $keys=>$values){ ?>
                                                                    <option value="<?php echo isset($values['id']) ? $values['id'] :''; ?>" ><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                                 <?php } ?>
                                                          <?php  }else{ ?>
                                                                 <option value="">(Select General ledger)</option>
                                                                 <?php $data2 = $this->db->get('tbl_ledger_account')->result_array();?>
                                                                 <?php foreach($data2 as $keys=>$values){ ?>
                                                                    <option value="<?php echo isset($values['id']) ? $values['id'] :''; ?>" <?PHP if ($checkgl['general_ledger_id_from'] == $values['id'] ) echo 'selected'; ?>><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                                 <?php } ?>
                                                         <?php   } ?>
                                                            
                                                        </select>
                                                </div>
                                            </td>
                                            <td><div class="form-group">
                                                        <select class="form-control" name="general_ledger_code[]" id="payment_method">
                                                            <?php $checkgl = $this->db->where('transaction_type_id',$value['transaction_type_master_id'])->get('tbl_transcation_type_category_selection_master')->row_array(); ?>
                                                            <?php if(empty($checkgl['general_ledger_id'])){ ?>
                                                                 <option value="">(Select General ledger)</option>
                                                                 <?php $data2 = $this->db->get('tbl_ledger_account')->result_array();?>
                                                                 <?php foreach($data2 as $keys=>$values){ ?>
                                                                    <option value="<?php echo isset($values['id']) ? $values['id'] :''; ?>" ><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                                 <?php } ?>
                                                          <?php  }else{ ?>
                                                                 <option value="">(Select General ledger)</option>
                                                                 <?php $data2 = $this->db->get('tbl_ledger_account')->result_array();?>
                                                                 <?php foreach($data2 as $keys=>$values){ ?>
                                                                    <option value="<?php echo isset($values['id']) ? $values['id'] :''; ?>" <?PHP if ($checkgl['general_ledger_id'] == $values['id'] ) echo 'selected'; ?>><?php echo isset($values['name']) ? $values['name'] :'' ?></option> 
                                                                 <?php } ?>
                                                         <?php   } ?>
                                                            
                                                        </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4" ><button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Submit</button></td>
                                        </tr>
                                        </form>
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