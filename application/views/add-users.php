
<!doctype html>
<html lang="en">

    <!-- Mirrored from iqonic.design/themes/posdash/html/backend/page-add-users.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 07:05:28 GMT -->
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
         <div class="row">
            <div class="col-xl-3 col-lg-4">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title"></h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form >
                           <div class="form-group">
                              <div class="crm-profile-img-edit position-relative">
                                 <img class="crm-profile-pic rounded avatar-100" src="<?php echo base_url(); ?>assets/assets/images/user/01.jpg" alt="profile-pic">
                                 <div class="crm-p-image bg-primary">
                                    <i class="fa fa-pencil"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" style="height:50px">
                              <a href="" class="btn btn-success">SUBSCRIPTION</a>
                           </div>
                           <div class="form-group">
                               <a href="" class="btn btn-success">SUBSCRIBE</a>
                           </div>
                           <div class="form-group">
                              <a href="" class="btn btn-success">RECEIVE MONEY</a>
                           </div>
                           <div class="form-group">
                              <a href="" class="btn btn-success">PAY MONEY</a>
                           </div>
                            <div class="form-group">
                              <a href="" class="btn btn-success">Invoice</a>
                           </div>
                            <div class="form-group">
                              <a href="" class="btn btn-success">Receipts</a>
                           </div>
                           <div class="form-group">
                              <a href="" class="btn btn-success">Subscriber Summary</a>
                           </div>
                        </form>
                     </div>
                  </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Subscriber Profile</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="new-user-info">
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="sname">Subsciber Name:</label>
                                    <input type="text" class="form-control" readonly placeholder="Subscriber Name">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="e-mail">E-mail:</label>
                                    <input type="email" class="form-control" readonly placeholder="E-mail">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="contact">Contact No.:</label>
                                    <input type="number" class="form-control" readonly placeholder="Contact No.">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" readonly placeholder="Address"> </textarea>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="collateral">Collateral:</label>
                                    <input type="text" class="form-control" readonly placeholder="Collateral">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="collateral">Sub Collateral:</label>
                                    <input type="text" class="form-control" readonly placeholder="Sub Collateral">
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label for="collateral">Risk Calculation:</label>
                                    <input type="number" class="form-control" readonly placeholder="Risk Calculation">
                                 </div>
                                 
                              </div>
                              <hr>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      </div>
    </div>
        </div>
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>

    <!-- Mirrored from iqonic.design/themes/posdash/html/backend/page-add-users.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 07:05:29 GMT -->
</html>