
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
                                    <h4 class="mb-3">Customer List</h4>
                                </div>
                                <a href="<?php echo base_url(); ?>Dashboard/add_customer" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Customer</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                                    <label for="checkbox1" class="mb-0"></label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Country</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Last Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                                    <label for="checkbox2" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Max Conversion</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="19747861597e74787075377a7674">[email&#160;protected]</a></td>
                                            <td>0123456789</td>
                                            <td>USA</td>
                                            <td>2</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox3">
                                                    <label for="checkbox3" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Alex john</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="157479706d557278747c793b767a78">[email&#160;protected]</a></td>
                                            <td>0123456123</td>
                                            <td>USA</td>
                                            <td>3</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox4">
                                                    <label for="checkbox4" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Cliff Hanger</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8be8e7e2ededcbece6eae2e7a5e8e4e6">[email&#160;protected]</a></td>
                                            <td>0189556789</td>
                                            <td>UK</td>
                                            <td>3</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>3</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox5">
                                                    <label for="checkbox5" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Terry Aki</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="04706176767d446369656d682a676b69">[email&#160;protected]</a></td>
                                            <td>0123205789</td>
                                            <td>USA</td>
                                            <td>2</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox6">
                                                    <label for="checkbox6" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Rock lai</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c4b6aba7af84a3a9a5ada8eaa7aba9">[email&#160;protected]</a></td>
                                            <td>0123452289</td>
                                            <td>UK</td>
                                            <td>3</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox7">
                                                    <label for="checkbox7" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Pete Sariya</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d0a0b5a4b590b7bdb1b9bcfeb3bfbd">[email&#160;protected]</a></td>
                                            <td>0111456789</td>
                                            <td>USA</td>
                                            <td>5</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>4</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox8">
                                                    <label for="checkbox8" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Ira Membrit</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="177e657657707a767e7b3974787a">[email&#160;protected]</a></td>
                                            <td>0123458719</td>
                                            <td>UK</td>
                                            <td>4</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox9">
                                                    <label for="checkbox9" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Barb Ackue</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0a686b78684a6d676b636624696567">[email&#160;protected]</a></td>
                                            <td>0123246789</td>
                                            <td>USA</td>
                                            <td>2</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox d-inline-block">
                                                    <input type="checkbox" class="checkbox-input" id="checkbox10">
                                                    <label for="checkbox10" class="mb-0"></label>
                                                </div>
                                            </td>
                                            <td>Paige Turner</td>
                                            <td><a href="http://iqonic.design/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dfafbeb6b8ba9fb8b2beb6b3f1bcb0b2">[email&#160;protected]</a></td>
                                            <td>0125856789</td>
                                            <td>UK</td>
                                            <td>9</td>
                                            <td><div class="badge badge-warning">Pending</div></td>
                                            <td>7</td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                       href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                       href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="popup text-left">
                                    <div class="media align-items-top justify-content-between">                            
                                        <h3 class="mb-3">Product</h3>
                                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                                    </div>
                                    <div class="content edit-notes">
                                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>
                                                </div>
                                                <div id="quill-toolbar1">
                                                    <p>Virtual Digital Marketing Course every week on Monday, Wednesday and Saturday.Virtual Digital Marketing Course every week on Monday</p>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0">
                                                <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                                    <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                                    <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                                </div>
                                            </div>
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
</html>