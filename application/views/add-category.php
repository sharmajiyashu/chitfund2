
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
                                        <h4 class="card-title">Add category</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                  
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/add_category/<?php echo isset($get_category['id']) ? $get_category['id'] :  '' ; ?>" method="post">
                                        <div class="row">    
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Parent Category</label>
                                                    <?php $get_category = $this->db->get('category')->result_array(); ?>                                              
                                                    <select name="category_id" class="selectpicker form-control" data-style="py-0">
                                                        <?php foreach($get_category as $key=>$value) {?>
                                                        <option value="<?php echo isset($value['id']) ? $value['id'] : ''; ?>"><?php echo isset($value['category_name']) ? $value['category_name'] : ''; ?></option>
                                                        <?php }?>                                                   
                                                    </select>
                                                </div>
                                            </div>  
                                           
                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Category Name *</label>
                                                    <input type="text" class="form-control" placeholder="Enter Product Name" name="category_name" value="<?php  echo isset($get_category['category_name']) ? $get_category['category_name'] :  '' ; ?>">
                                                    <div><font><?php echo form_error('category_name') ?></font></div>
                                                </div>
                                            </div>                                 
                                                                    
                                        </div>                            
                                        <button type="submit" class="btn btn-primary mr-2">Add category</button>
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

                      category_name: {

                            required: true
                        }
                        
                    },
                    messages: {

                        category_name: {

                            required: "Enter  category_name"
                        },
                        
                    }

                });
            });
            </script>
    </body>
</html>