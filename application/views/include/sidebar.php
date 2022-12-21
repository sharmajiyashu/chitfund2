<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .intro {
  background-color: gainsboro;
  
}
a:link {
  color: #1679c9;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: #1679c9;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: green;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: #1679c9;
  background-color: transparent;
  text-decoration: underline;
}

</style>

<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="#" class="header-logo">
            <img src="<?php echo base_url(); ?>assets/assets/images/logo1.png" class="img-fluid rounded-normal light-logo" alt="logo"><h5 class="logo-title light-logo ml-3">Welcome</h5>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="fa fa-home"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                    <a href="<?php echo base_url(); ?>Dashboard" class="svg-icon">                        
                        <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="ml-4">Dashboards</span>
                    </a>
                </li>
                
                <li class="">
                  <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                      <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                          <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                      </svg>
                      <span class="ml-4">Master</span>
                      <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                      </svg>
                  </a>
                  <ul id="category" class="iq-submenu collapse intro" data-parent="#iq-sidebar-toggle">
                          <li class="">
                                 <a href="<?php echo base_url(); ?>Dashboard/gstListing" class="svg-icon">  
                                      <i class="fa fa-arrow-right"></i><span>Gst</span>
                                  </a>
                          </li>
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/auction_register" class="svg-icon">  
                                      <i class="fa fa-arrow-right"></i><span>Auction Register</span>
                                  </a>
                          </li>
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/service_provider_listing" class="svg-icon">  
                                      <i class="fa fa-arrow-right"></i><span>Service Provider</span>
                                  </a>
                          </li>
                          
                           <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/ledgerTypeList" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Ledger Account</span>
                                  </a>
                          </li>
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/transaction_type_master_listing" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Transaction Type Master</span>
                                  </a>
                          </li>
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/EmployeesMasterList" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Employees </span>
                                  </a>
                          </li>
                           <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/bankAccountList" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Master Bank Account </span>
                                  </a>
                          </li>
                          <!-- <li class="">-->
                          <!--        <a href="<?php echo base_url(); ?>Dashboard/MasterPaymentListing" class="svg-icon">  -->
                          <!--           <i class="las la-minus"></i><span>Master Payment List </span>-->
                          <!--        </a>-->
                          <!--</li>-->
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/CategoryListing" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Master Category</span>
                                  </a>
                          </li>
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/ExpensesListing" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Master Expenses</span>
                                  </a>
                          </li>
                          
                          <li class="">
                                  <a href="<?php echo base_url(); ?>Dashboard/TranscationTypeSelectionMaster" class="svg-icon">  
                                     <i class="fa fa-arrow-right"></i><span>Master Tran.T. C.Selection</span>
                                  </a>
                          </li>
                  </ul>
                </li>
                
                <li class="">
                  <a href="#category1" class="collapsed" data-toggle="collapse" aria-expanded="false">
                      <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                          <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                      </svg>
                      <span class="ml-4">Transaction</span>
                      <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                      </svg>
                  </a>
                  <ul id="category1" class="iq-submenu collapse intro" data-parent="#iq-sidebar-toggle">
                      <!--<li class="">-->
                      <!--  <a href="<?php echo base_url(); ?>Dashboard/Receipt" class="">  -->
                      <!--      <i class="las la-minus"></i><span>Receipt</span>-->
                      <!--  </a>-->
                      <!--</li>-->
                      <!--<li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/Payment" class=""> -->
                      <!--      <i class="las la-minus"></i><span>Payment</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                      <li class="">
                          <a href="<?php echo base_url(); ?>Dashboard/transcation_list" class=""> 
                            <i class="fa fa-arrow-right"></i><span>Transaction List</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="<?php echo base_url(); ?>Dashboard/master_payment" class=""> 
                            <i class="fa fa-arrow-right"></i><span>Payment / Receipt</span>
                          </a>
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/master_Receipt" class=""> -->
                      <!--      <i class="las la-minus"></i><span>Master Receipt</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                  </ul>
                </li>
                 
                
                <li class=" ">
                    <a href="<?php echo base_url(); ?>Dashboard/subscriber_listing" class="">
                        <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-4">Subscribers</span>
                    </a>
                </li>
                 
                 <li class=" ">
                    <a href="<?php echo base_url(); ?>Dashboard/agent_listing" class="">
                        <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                        <span class="ml-4">Agents</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>Dashboard/subscription_listing" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Chit Plans</span>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                
                <li class="">
                    <a href="<?php echo base_url(); ?>Dashboard/listCollateral" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Collateral</span>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                
                <!-- <li class="">-->
                <!--    <a href="<?php echo base_url(); ?>Dashboard/getControlSheetWithFilter" class="">-->
                <!--        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
                <!--            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>-->
                <!--        </svg>-->
                <!--        <span class="ml-4">Reports</span>-->
                <!--    </a>-->
                <!--    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">-->
                <!--    </ul>-->
                <!--</li>-->
                
                 <li class="">
                  <a href="#category12" class="collapsed" data-toggle="collapse" aria-expanded="false">
                      <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                          <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                      </svg>
                      <span class="ml-4">Reports</span>
                      <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                      </svg>
                  </a>
                  <ul id="category12" class="iq-submenu collapse intro" data-parent="#iq-sidebar-toggle">
                      </li> <li class="">
                          <a href="<?php echo base_url(); ?>Report/DailtReconcilition" class=""> 
                            <i class="fa fa-arrow-right"></i><span>Daily Reconciliation <br>Summary</span>
                          </a>
                      </li>
                      <li class="">
                        <a href="<?php echo base_url(); ?>Report/Receivables" class="">  
                            <i class="fa fa-arrow-right"></i><span>Receivables</span>
                        </a>
                      </li>
                      <!--<li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Report/Receipts" class=""> -->
                      <!--      <i class="fa fa-arrow-right"></i><span>Receipts</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                      <!--<li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="fa fa-arrow-right"></i><span>Payments Complete</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                     
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="fa fa-arrow-right"></i><span>Payables</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                      
                      
                      
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="las la-minus"></i><span>Payables</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                  </ul>
                </li>
                
                <li class="">
                  <a href="#Letters" class="collapsed" data-toggle="collapse" aria-expanded="false">
                      <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                          <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                      </svg>
                      <span class="ml-4">Letters </span>
                      <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                      </svg>
                  </a>
                  <ul id="Letters" class="iq-submenu collapse intro" data-parent="#iq-sidebar-toggle">
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="fa fa-arrow-right"></i><span>Daily Reconciliation <br>Summary</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                      <li class="">
                        <a href="<?php echo base_url(); ?>Letters/CoverringLetter" class="">  
                            <i class="fa fa-arrow-right"></i><span>Coverring Letter</span>
                        </a>
                      </li>
                      <li class="">
                          <a href="<?php echo base_url(); ?>Letters/DiscountConfiramation" class=""> 
                            <i class="fa fa-arrow-right"></i><span>Discount Confirmation <br> Letter</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="<?php echo base_url(); ?>Letters/paymentDue" class=""> 
                            <i class="fa fa-arrow-right"></i><span>Payment Due Notice </span>
                          </a>
                      </li>
                     
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="fa fa-arrow-right"></i><span>Payables</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                      
                      
                      
                      <!--</li> <li class="">-->
                      <!--    <a href="<?php echo base_url(); ?>Dashboard/" class=""> -->
                      <!--      <i class="las la-minus"></i><span>Payables</span>-->
                      <!--    </a>-->
                      <!--</li>-->
                  </ul>
                </li>
                
                
                <li class="">
                    <a href="<?php echo base_url(); ?>Dashboard/planAvailableForAuction" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Auction</span>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                
                <li class="">
                    <a href="<?php echo base_url(); ?>Dashboard/ImportExport" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Import/Export</span>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                
                
                <!--<li class="">-->
                <!--    <a href="<?php echo base_url(); ?>Dashboard/ledgerAccount" class="">-->
                <!--        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
                <!--            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>-->
                <!--        </svg>-->
                <!--        <span class="ml-4">General Ledger</span>-->
                <!--    </a>-->
                <!--    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">-->
                <!--    </ul>-->
                <!--</li>-->
                
                <li class="">
                    <a href="<?php echo base_url(); ?>Dashboard/masterledgerAccount" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <i class="fa fa-arrow-right"></i><span class="ml-4">Master General Ledger</span>
                    </a>
                    <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
    
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>  

<div class="col-md-12">
    <script type="text/javascript">
        <?php if($this->session->flashdata('success')){ ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php $this->session->unset_userdata ( 'success' ); }else if($this->session->flashdata('Failure')){  ?>
            toastr.error("<?php echo $this->session->flashdata('Failure'); ?>");
        <?php $this->session->unset_userdata ( 'Failure' );}else if($this->session->flashdata('warning')){  ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php $this->session->unset_userdata ( 'warning' );}else if($this->session->flashdata('info')){  ?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php $this->session->unset_userdata ( 'info' ); } ?>
    
    </script>
 </div>