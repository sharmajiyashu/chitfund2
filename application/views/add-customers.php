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
                <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                <div class="container-fluid add-form-list">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Add Member</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="http://iqonic.design/themes/posdash/html/backend/page-list-customers.html" data-toggle="validator">
                                        <div class="row"> 
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Name" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Email" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Phone Number" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Country" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>City *</label>
                                                    <input type="text" class="form-control" placeholder="Enter City" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>State *</label>
                                                    <input type="text" class="form-control" placeholder="Enter State" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Customer Group</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>                            
                                        <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
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
    </body>
</html>