
<!doctype html>
<html lang="en">

    <!-- Mirrored from iqonic.design/themes/posdash/html/backend/page-add-purchase.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 07:05:28 GMT -->
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
                <div class="container-fluid add-form-list">
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Add Purchase</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="http://iqonic.design/themes/posdash/html/backend/page-list-purchase.html" data-toggle="validator">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="dob">Date *</label>
                                                    <input type="date" class="form-control" id="dob" name="dob" />
                                                </div>
                                            </div>  
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Purchase No *</label>
                                                    <input type="text" class="form-control" placeholder="Purchase No" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Supplier</label>
                                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                                        <option>Select Supplier</option>
                                                        <option>Test Supplier</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label>Received</label>
                                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                                        <option>Received</option>
                                                        <option>Not received yet</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Order Tax</label>
                                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                                        <option>No Text</option>
                                                        <option>GST @5%</option>
                                                        <option>VAT @20%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <input type="text" class="form-control" placeholder="Discount">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Shipping</label>
                                                    <input type="text" class="form-control" placeholder="Shipping">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Payment *</label>
                                                    <input type="text" class="form-control" placeholder="Payment" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Note *</label>
                                                    <div id="quill-tool">
                                                        <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="Bold"></button>
                                                        <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="Underline"></button>
                                                        <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="Add italic text <cmd+i>"></button>
                                                        <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="Upload image"></button>
                                                        <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="Show code"></button>
                                                    </div>
                                                    <div id="quill-toolbar">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>                            
                                        <button type="submit" class="btn btn-primary mr-2">Add Purchase</button>
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

    <!-- Mirrored from iqonic.design/themes/posdash/html/backend/page-add-purchase.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 07:05:28 GMT -->
</html>