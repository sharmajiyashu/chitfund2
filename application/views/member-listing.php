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
                
            <ul class="breadcrumb">
<li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
<li class="active">Subscribers</li>
</ul>
                <div class="container-fluid">
                    <!--<div style="text-align:end;"><a href="javascript: history.go(-1)">Go Back</a></div>-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class="mb-3">Subscriber List</h4>
                                </div> 
                                
                            <!--<div style="">-->
                            <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import"><i class="las la-plus mr-2"></i>Import</a>-->
                            <!--</div>-->
                        
                            <!--<div style="margin-left: 10px;">-->
                            <!--    <a href="<?php echo base_url();?>Dashboard/exportSubscriber" class="btn btn-primary"><i class="las la-plus mr-2"></i>Export</a>-->
                            <!--</div>-->
                                
                            <div>
                                <a href="<?php echo base_url(); ?>Dashboard/addSubscriber" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Subscriber</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info table-responsive">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No </th>
                                            <th>Image</th>
                                            <th>Subscriber Name</th>
                                            <th>Last Name</th>
                                            <!--<th>Reference</th>-->
                                            <th>Father Name</th>
                                            <th>DOB</th>
                                            <th>Mobile No.</th>
                                            <!--<th>Other Contact No.</th>-->
                                            <!--<th>Office Contact No.</th>-->
                                            <th>Email</th>
                                            <!--<th>Address</th>-->
                                            <!--<th>Current Address</th>-->
                                            <!--<th>Marital Status</th>-->
                                            <!--<th>Nominee Name</th>-->
                                            <!--<th>Nominee Relation</th>-->
                                            <th>PAN No.</th>
                                            <th>Aadhar No.</th>
                                            <!--<th>Income Type</th>-->
                                            <!--<th>Passport Photo</th>-->
                                            <!--<th>Id Proof</th>-->
                                            <!--<th>Address Proof</th>-->
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php if (isset($get_member) && is_array($get_member)) { ?>
                                            <?php
                                            $i = 1;
                                            foreach ($get_member as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo $i; ?></a></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <?php if(!empty($value->member_profile)){ ?>
                                                            <img src="<?php echo base_url('images/profile/'.$value->member_profile ) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                            <?php }else{ ?>
                                                                <img src="<?php echo base_url('images/profile/no-image.png' ) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                         <?php   } ?>
                                                            <div>
                                                                <!--Organic Cream-->
                                                                <!--<p class="mb-0"><small>This is test Product</small></p>-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" ><?php echo isset($value->name) ? $value->name : ''; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->last_name) ? $value->last_name : ''; ?></a></td>
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->reference) ? $value->reference : ''; ?></a></td>-->
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->father_name) ? $value->father_name : ''; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->dob) ? $value->dob : ''; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->mobile) ? $value->mobile : ''; ?></a></td>
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->secondary_mobile) ? $value->secondary_mobile : ''; ?></a></td>-->
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->office_phone) ? $value->office_phone : ''; ?></a></td>-->
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->email) ? $value->email : ''; ?></a></td>
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->permanent_address) ? $value->permanent_address : ''; ?></a></td>-->
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->current_potal_address) ? $value->current_potal_address : ''; ?></a></td>-->
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->marital_status) ? $value->marital_status : ''; ?></a></td>-->
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->nominee_name) ? $value->nominee_name : ''; ?></a></td>-->
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->nominee_relationship) ? $value->nominee_relationship : ''; ?></a></td>-->
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->pan_number) ? $value->pan_number : ''; ?></a></td>
                                                    <td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->adhaar_number) ? $value->adhaar_number : ''; ?></a></td>
                                                    <!--<td><a href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>" style="color: black;"><?php echo isset($value->income_type) ? $value->income_type : ''; ?></a></td>-->
                                                    <td>
                                                        <div class="d-flex align-items-center list-action">
                                                            <!--<a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"-->
                                                            <!--   href="<?php echo base_url();?>Dashboard/getmoreviewmember/<?php echo isset($value->member_id)? $value->member_id : '' ; ?>"><i class="ri-eye-line mr-0"></i></a>        -->
                                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                                               href="<?php echo base_url(); ?>Dashboard/subscriberupdate/<?php echo isset($value->member_id) ? $value->member_id : ''; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                                            <!--<a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"-->
                                                            <!--   class="data-delete" href="<?php echo base_url(); ?>Dashboard/member_delete/<?php echo isset($value->member_id) ? $value->member_id : ''; ?>"><i class="ri-delete-bin-line mr-0"></i></a>-->
                                                            
                                                            <a class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                                       href="#" onclick="GetDetails(<?php echo isset($value->member_id) ? $value->member_id : ''; ?>)"><i class="ri-eye-line mr-0"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Page end  -->
                </div>
                <!-- Modal Edit -->
            </div>
        </div>
        
        
        <div class="modal fade " id="import" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="detail_table" class="data-table table mb-0 tbl-server-info ">
                          
                        </table>
                        <div class="col-md-12" style="    text-align: center;   margin-top: 15px;">
                            <div class="btn btn-primary mr-4" data-dismiss="modal">Close</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        
        
        
        
        
        
        <!-- Wrapper End-->
        <?php // footer   ?>
        <?php include APPPATH . 'views/include/js.php'; ?>
        <script>
            $(".data-delete").click(function () {
                if (!confirm("Do you really want to delete this?")) {
                    return false;
                }
            });
            
            
             function GetDetails(id){
                $.ajax({
                    type:'ajax',
                    url:'<?php echo base_url('Dashboard/GetMemberDetails'); ?>', 
                    type: 'POST',
                    data: {id: id,},
                    async:false,
                    dataType:'json',
                    success:function(data)
                    {   
                        $("#detail_table").html('');
                        // $("#detail_table").append("<tr><th style='    font-size: 28px;'>Current Balance</th><td style='    font-size: 28px;color: brown;'>"+data.current_account_balance+"</td></tr>");
                        $("#detail_table").append("<tr><th>First Name</th><td>"+data.name+"</td></tr>");
                        $("#detail_table").append("<tr><th>Last Name</th><td>"+data.last_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>Father Name</th><td>"+data.father_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>DOB</th><td>"+data.dob+"</td></tr>");
                        $("#detail_table").append("<tr><th>Mobile</th><td>"+data.mobile+"</td></tr>");
                        $("#detail_table").append("<tr><th>Secondary Mobile</th><td>"+data.secondary_mobile+"</td></tr>");
                        
                        $("#detail_table").append("<tr><th>Office Phone</th><td>"+data.office_phone+"</td></tr>");
                        $("#detail_table").append("<tr><th>Email</th><td>"+data.email+"</td></tr>");
                        $("#detail_table").append("<tr><th>Permanent Address</th><td>"+data.permanent_address+"</td></tr>");
                        $("#detail_table").append("<tr><th>Current Potal Address</th><td>"+data.current_potal_address+"</td></tr>");
                        $("#detail_table").append("<tr><th>Village city</th><td>"+data.village_city_name+"</td></tr>");
                        $("#detail_table").append("<tr><th>District</th><td>"+data.district+"</td></tr>");
                        $("#detail_table").append("<tr><th>State</th><td>"+data.state+"</td></tr>");
                        $("#detail_table").append("<tr><th>Pincode</th><td>"+data.address_pincode+"</td></tr>");
                        $("#detail_table").append("<tr><th>Reference</th><td>"+data.reference+"</td></tr>");
                        $("#detail_table").append("<tr><th>Gender</th><td>"+data.gender+"</td></tr>");
                        $("#detail_table").append("<tr><th>Nominee Name</th><td>"+data.nominee_name+"</td></tr>");
                        
                        $("#detail_table").append("<tr><th>Nominee Relationship</th><td>"+data.nominee_relationship+"</td></tr>");
                        $("#detail_table").append("<tr><th>Nominee d.o.b</th><td>"+data.nominee_d_o_b+"</td></tr>");
                        $("#detail_table").append("<tr><th>Percentage of Nomination</th><td>"+data.percentage_of_nomination+"</td></tr>");
                        $("#detail_table").append("<tr><th>Pan Number</th><td>"+data.pan_number+"</td></tr>");
                        $("#detail_table").append("<tr><th>Adhaar Number</th><td>"+data.adhaar_number+"</td></tr>");
                        
                        $('#import').modal('show');
                    },
                    error:function(data)
                    {
                        alert('ajax error'); 
                    }
                });
            }

        </script>
        
        
        
        
        
    </body>
</html>