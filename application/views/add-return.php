
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
                <div class="container-fluid add-form-list">
                    <div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Add Return</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="http://iqonic.design/themes/posdash/html/backend/page-list-returns.html" data-toggle="validator">
                                        <div class="row">                                  
                                            <div class="col-md-6">                      
                                                <div class="form-group">
                                                    <label>Date *</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Reference No *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Reference No" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Biller *</label>
                                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                                        <option>Test Biller</option>
                                                    </select>
                                                </div> 
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Customer *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Customer Name" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>   
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label>Order Tax *</label>
                                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                                        <option>No Text</option>
                                                        <option>GST @5%</option>
                                                        <option>VAT @10%</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Order Discount</label>
                                                    <input type="text" class="form-control" placeholder="Discount">
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Shipping</label>
                                                    <input type="text" class="form-control" placeholder="Shipping">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Attach Document</label>
                                                    <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Return Note *</label>
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
                                        <button type="submit" class="btn btn-primary mr-2">Add Returns</button>
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