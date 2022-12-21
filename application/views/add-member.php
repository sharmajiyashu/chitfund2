<!doctype html>
<html lang="en">
    <head>
        <?php include APPPATH . 'views/include/css.php'; ?>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css" type="text/css">
    </head>
    <style>
      .error{
          color:brown;
      }
.custom-file-input {
  color: transparent;
  /*margin-top:-20px;*/
  margin-left:-35px;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  /content: '\f574';/
  color: black;
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active {
  outline: 0;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9); 
}
    </style>
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
                    
                      <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li><a href="<?php echo base_url('Dashboard/subscriber_listing');?>">Subscribers </a>&nbsp;&nbsp; > &nbsp;</li>
                        <li class="active"><?php if(isset($data['member_id'])){ ?> Update Subscriber <?php } else{?> Add Subscriber <?php } ?></h4> </li>
                      </ul>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title"><?php if(isset($data['member_id'])){ ?> Update Subscriber <?php } else{?> Add Subscriber <?php } ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="myform" action="<?php echo base_url(); ?>Dashboard/addSubscriber/" method="post"  class="dropzone" enctype="multipart/form-data">
                                    <input type="hidden"  id="member_id" name="member_id" value="<?php echo isset($data['member_id']) ? $data['member_id'] : '' ;  ?>"/>  
                                    <input type="hidden" name="docs" id="docs">
                                    <input type="hidden" name="upload_image" id="upload_image">
                                        <div class="row">                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Subscriber First Name</label>
                                                    <input  class="form-control" name="name" placeholder="Enter Subscriber Name" id="name" value="<?php echo isset($data['name']) ? $data['name'] : '' ?>">
                                                </div> 
                                            </div>  
                                            <?php if(isset($data['member_id'])){ ?>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="" style="text-align: end;">
                                                        <i class="las la-pen upload-button"></i>
                                                        
                                                         <?php if(!empty($data['member_profile'])){ ?>
                                                            <img src="<?php echo base_url('images/profile/'.$data['member_profile']) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image" style="width: 143px; height: auto;">
                                                            <?php }else{ ?>
                                                                <img src="<?php echo base_url('images/profile/no-image.png' ) ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                         <?php   } ?>
                                                         
                                                        <input class="file-upload" id="imageupdateprofile" type="file" accept="image/*">
                                                    </div>
                                                </div> 
                                            </div> 
                                            
                                            <?php }else{ ?>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="" style="text-align: end;">
                                                        <i class="las la-pen upload-button"></i>
                                                        <img id="myImg" src="" alt="" class="img-fluid rounded avatar-50 mr-3" alt="image" style="width: 143px; height: 143px;">
                                                        <input class="file-upload " id="imageprofile" type="file" accept="image/*">
                                                    </div>
                                                </div> 
                                            </div> 
                                            
                                            <?php }?>
                                           
                                            
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Subscriber Last Name</label>
                                                    <input  class="form-control" name="last_name" placeholder="Enter Subscriber last Name" id="last_name" value="<?php echo isset($data['last_name']) ? $data['last_name'] : '' ?>">
                                                </div> 
                                            </div> 

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Father Name</label>
                                                    <input  class="form-control" name="father_name" placeholder="Enter Father Name" value="<?php echo isset($data['father_name']) ? $data['father_name'] : '' ?>">
                                                </div> 
                                            </div> 
                                            
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Reference </label>
                                                    <input  class="form-control" name="reference" placeholder="Enter Your reference" value="<?php echo isset($data['reference']) ? $data['reference'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">                      
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" class="form-control" placeholder="Enter DOB" name="dob" value="<?php echo isset($data['dob']) ? $data['dob'] : '' ?>">
                                                </div>
                                            </div>    

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="number" id="MobileNumber" class="form-control"  name="mobile" placeholder="Enter Contact Number" value="<?php echo isset($data['mobile']) ? $data['mobile'] : '' ?>">
                                                    <div id="error_needwork_mobile"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Another Contact Number</label>
                                                    <input  class="form-control" name="secondary_mobile" placeholder="Enter Another Contact Number" value="<?php echo isset($data['secondary_mobile']) ? $data['secondary_mobile'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Office Number</label>
                                                    <input  class="form-control" name="office_phone" placeholder="Enter Office Contact Number" value="<?php echo isset($data['office_phone']) ? $data['office_phone'] : '' ?>">
                                                </div>
                                            </div>

                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input  class="form-control" name="email" placeholder="Enter Your Mail Id" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>">
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Split Address into Address Line 1</label>
                                                    <textarea class="form-control" rows="3" name="address" placeholder="Enter Your Permanent Address" ><?php echo isset($data['permanent_address']) ? $data['permanent_address'] : '' ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address Line 2 </label>
                                                    <textarea class="form-control" rows="3" name="potal_address" placeholder="Enter Your Postal Address" ><?php echo isset($data['current_potal_address']) ? $data['current_potal_address'] : '' ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Village Name</label>
                                                    <input  class="form-control" name="village_city_name" placeholder="Enter Your Village Name" value="<?php echo isset($data['village_city_name']) ? $data['village_city_name'] : '' ?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>District</label>
                                                    <input  class="form-control" name="district" placeholder="Enter Your District" value="<?php echo isset($data['district']) ? $data['district'] : '' ?>">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                     <select name="state" id="state" class="form-control">
                										<option value="">(select state)</option>
                										<option value="Andhra Pradesh"<?php if(isset($data['state']) && $data['state'] == "Andhra Pradesh"){echo "selected";}?>>Andhra Pradesh</option>
                										<option value="Andaman and Nicobar Islands" <?php if(isset($data['state']) && $data['state'] == "Andaman and Nicobar Islands"){echo "selected";}?>>Andaman and Nicobar Islands</option>
                										<option value="Arunachal Pradesh"<?php if(isset($data['state']) && $data['state'] == "Arunachal Pradesh"){echo "selected";}?>>Arunachal Pradesh</option>
                										<option value="Assam"<?php if(isset($data['state']) && $data['state'] == "Assam"){echo "selected";}?>>Assam</option>
                										<option value="Bihar"<?php if(isset($data['state']) && $data['state'] == "Bihar"){echo "selected";}?>>Bihar</option>
                										<option value="Chandigarh"<?php if(isset($data['state']) && $data['state'] == "Chandigarh"){echo "selected";}?>>Chandigarh</option>
                										<option value="Chhattisgarh"<?php if(isset($data['state']) && $data['state'] == "Chhattisgarh"){echo "selected";}?>>Chhattisgarh</option>
                										<option value="Dadar and Nagar Haveli"<?php if(isset($data['state']) && $data['state'] == "Dadar and Nagar Haveli"){echo "selected";}?>>Dadar and Nagar Haveli</option>
                										<option value="Daman and Diu"<?php if(isset($data['state']) && $data['state'] == "Daman and Diu"){echo "selected";}?>>Daman and Diu</option>
                										<option value="Delhi"<?php if(isset($data['state']) && $data['state'] == "Delhi"){echo "selected";}?>>Delhi</option>
                										<option value="Lakshadweep"<?php if(isset($data['state']) && $data['state'] == "Lakshadweep"){echo "selected";}?>>Lakshadweep</option>
                										<option value="Puducherry"<?php if(isset($data['state']) && $data['state'] == "Puducherry"){echo "selected";}?>>Puducherry</option>
                										<option value="Goa"<?php if(isset($data['state']) && $data['state'] == "Goa"){echo "selected";}?>>Goa</option>
                										<option value="Gujarat"<?php if(isset($data['state']) && $data['state'] == "Gujarat"){echo "selected";}?>>Gujarat</option>
                										<option value="Haryana"<?php if(isset($data['state']) && $data['state'] == "Haryana"){echo "selected";}?>>Haryana</option>
                										<option value="Himachal Pradesh"<?php if(isset($data['state']) && $data['state'] == "Himachal Pradesh"){echo "selected";}?>>Himachal Pradesh</option>
                										<option value="Jammu and Kashmir"<?php if(isset($data['state']) && $data['state'] == "Jammu and Kashmir"){echo "selected";}?>>Jammu and Kashmir</option>
                										<option value="Jharkhand"<?php if(isset($data['state']) && $data['state'] == "Jharkhand"){echo "selected";}?>>Jharkhand</option>
                										<option value="Karnataka"<?php if(isset($data['state']) && $data['state'] == "Karnataka"){echo "selected";}?>>Karnataka</option>
                										<option value="Kerala"<?php if(isset($data['state']) && $data['state'] == "Kerala"){echo "selected";}?>>Kerala</option>
                										<option value="Madhya Pradesh"<?php if(isset($data['state']) && $data['state'] == "Madhya Pradesh"){echo "selected";}?>>Madhya Pradesh</option>
                										<option value="Maharashtra"<?php if(isset($data['state']) && $data['state'] == "Maharashtra"){echo "selected";}?>>Maharashtra</option>
                										<option value="Manipur"<?php if(isset($data['state']) && $data['state'] == "Manipur"){echo "selected";}?>>Manipur</option>
                										<option value="Meghalaya"<?php if(isset($data['state']) && $data['state'] == "Meghalaya"){echo "selected";}?>>Meghalaya</option>
                										<option value="Mizoram"<?php if(isset($data['state']) && $data['state'] == "Mizoram"){echo "selected";}?>>Mizoram</option>
                										<option value="Nagaland"<?php if(isset($data['state']) && $data['state'] == "Nagaland"){echo "selected";}?>>Nagaland</option>
                										<option value="Odisha"<?php if(isset($data['state']) && $data['state'] == "Odisha"){echo "selected";}?>>Odisha</option>
                										<option value="Punjab"<?php if(isset($data['state']) && $data['state'] == "Punjab"){echo "selected";}?>>Punjab</option>
                										<option value="Rajasthan"<?php if(isset($data['state']) && $data['state'] == "Rajasthan"){echo "selected";}?>>Rajasthan</option>
                										<option value="Sikkim"<?php if(isset($data['state']) && $data['state'] == "Sikkim"){echo "selected";}?>>Sikkim</option>
                										<option value="Tamil Nadu"<?php if(isset($data['state']) && $data['state'] == "Tamil Nadu"){echo "selected";}?>>Tamil Nadu</option>
                										<option value="Telangana"<?php if(isset($data['state']) && $data['state'] == "Telangana"){echo "selected";}?>>Telangana</option>
                										<option value="Tripura"<?php if(isset($data['state']) && $data['state'] == "Tripura"){echo "selected";}?>>Tripura</option>
                										<option value="Uttar Pradesh"<?php if(isset($data['state']) && $data['state'] == "Uttar Pradesh"){echo "selected";}?>>Uttar Pradesh</option>
                										<option value="Uttarakhand"<?php if(isset($data['state']) && $data['state'] == "Uttarakhand"){echo "selected";}?>>Uttarakhand</option>
                										<option value="West Bengal"<?php if(isset($data['state']) && $data['state'] == "West Bengal"){echo "selected";}?>>West Bengal</option>
                										</select>
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PINCODE</label>
                                                    <input  class="form-control" name="address_pincode" placeholder="Enter Your Mail Id" value="<?php echo isset($data['address_pincode']) ? $data['address_pincode'] : '' ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Subscriber Type </label>
                                                    <div class="row">
                                                    <div class="col-md-2">
                                                    <input type="radio" id="" name="subscriber_type" value="Individual"<?php if(isset($data['subscriber_type']) && $data['subscriber_type'] == "Individual"){echo "checked";}?>> <span>Individual</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="radio" id="" name="subscriber_type" value="Company"<?php if(isset($data['subscriber_type']) && $data['subscriber_type'] == "Company"){echo "checked";}?>> <span>Company</span> 
                                                    </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Gender </label>
                                                    <div class="row">
                                                    <div class="col-md-2">
                                                    <input type="radio" id="" name="gender" value="Male"<?php if(isset($data['gender']) && $data['gender'] == "Male"){echo "checked";}?>> <span>Male</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="radio" id="" name="gender" value="Female"<?php if(isset($data['gender']) && $data['gender'] == "Female"){echo "checked";}?>> <span>Female</span> 
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="radio" id="" name="gender" value="Not Applicable"<?php if(isset($data['gender']) && $data['gender'] == "Not Applicable"){echo "checked";}?>> <span>Not Applicable</span>
                                                    </div>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-12">   
                                                <div class="form-group">
                                                    <label>Marital Status</label> <br>
                                                    <div class="row">
                                                    <div class="col-md-2">
                                                    <input type="checkbox" id="married" name="marital_status" value="married"<?php if(isset($data['marital_status']) && $data['marital_status'] == "Married"){echo "checked";}?>> <span>Married</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="checkbox" id="single" name="marital_status" value="single"<?php if(isset($data['marital_status']) && $data['marital_status'] == "Single"){echo "checked";}?>> <span>Single</span> 
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="checkbox" id="widowed" name="marital_status" value="widowed"<?php if(isset($data['marital_status']) && $data['marital_status'] == "Widowed"){echo "checked";}?>> <span>Widowed</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="checkbox" id="divorced" name="marital_status" value="divorced"<?php if(isset($data['marital_status']) && $data['marital_status'] == "Divorced"){echo "checked";}?>> <span>Divorced</span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <input type="checkbox" id="" name="marital_status" value="Not Applicable"<?php if(isset($data['marital_status']) && $data['marital_status'] == "Not Applicable"){echo "checked";}?>> <span>Not Applicable</span>
                                                    </div>
                                                    </div> 
                                                </div> 
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row" id="family_details" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >

                                                            <label>Spouse Name </label>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Spouse Name" name="spouse_name" value="<?php echo isset($data['spouse_name']) ? $data['spouse_name'] : '' ?>">
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Anniversary Date </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="date" class="form-control" name="annivarsary_date" placeholder="Enter Anniversary Date" value="<?php echo isset($data['annivarsary_date']) ? $data['annivarsary_date'] : '' ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>No. Of Kids </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="kids" class="form-control" placeholder="Enter Number Of Kids" value="<?php echo isset($data['no_of_kids']) ? $data['no_of_kids'] : '' ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>No Of Dependents </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="dependents" class="form-control" placeholder="Enter Number Of Dependents" value="<?php echo isset($data['no_of_depend']) ? $data['no_of_depend'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            </div> 

                                            <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>No. Of Nominee</label>       
                                                    <select class="form-control" name="nominee">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div> 
                                            </div>  -->

                                            <div class="col-md-12">   
                                                <div class="form-group">
                                                    <label>Add Nominee</label> <br>
                                                    <input type="checkbox" id="variant" name='addnominee'> <span>Max Nominee-3  </span>  
                                                </div> 
                                            </div>
                                            <?php if(!empty($data['nominee_name'])){ ?>
                                            <?php $nominee = explode(',',$data['nominee_name']);  ?>
                                            <?php $nominee_rel = explode(',',$data['nominee_relationship']);  ?>
                                            <?php $nominee_dob = explode(',',$data['nominee_d_o_b']);  ?>
                                            <?php $nominee_pre = explode(',',$data['percentage_of_nomination']);  ?>
                                            <?php $nominee_gaur = explode(',',$data['nominee_gaurdian_name']);  ?>
                                            <?php } ?>

                                            <div class="col-md-12" id="option">  
                                                <div class="col-md-12">                                             
                                                <small>Nominee 1</small> <br> <div class="col-md-12" style="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-"><input type="text" class="form-control" placeholder="enter name..." name="nominee_name[]" value="<?php echo isset($nominee[0]) ? $nominee[0] : '' ?>" ></div>
                                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="enter relationship of nominee.." name="nominee_relation[]"  value="<?php echo isset($nominee_rel[0]) ? $nominee[0] : '' ?>"></div>
                                                            <div class="col-md-2"><input type="date" class="form-control" name="nominee_dob[]" value="<?php echo isset($nominee_dob[0]) ? $nominee_dob[0] : '' ?>"></div>
                                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="percentage of nominee" name="nominee_precentage[]" value="<?php echo isset($nominee_pre[0]) ? $nominee_pre[0] : '' ?>"></div>
                                                            <div class="col-md-2"><input type="text" class="form-control" placeholder="Guardian Name (if Nominee is Minor)" name="nominee_gaurdian_name[]" value="<?php echo isset($nominee_gaur[0]) ? $nominee_gaur[0] : '' ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">                                                    
                                                        <button class="form-control" id="add_another_options1" style="padding: 0px;"> Add Nominee </button>
                                                    </div>
                                                </div>
                                                </div> 
                                           
                                                <div class="col-md-12" id="option2">                                                
                                                    <small>Nominee 2</small> <br> <div class="col-md-12" style="">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-"><input type="text" class="form-control" placeholder="enter name..." name="nominee_name[]" value="<?php echo isset($nominee[1]) ? $nominee[1] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="enter relationship of nominee.." name="nominee_relation[]" value="<?php echo isset($nominee_rel[1]) ? $nominee[1] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="date" class="form-control" name="nominee_dob[]" value="<?php echo isset($nominee_dob[1]) ? $nominee_dob[1] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="percentage of nominee" name="nominee_precentage[]" value="<?php echo isset($nominee_pre[1]) ? $nominee_pre[1] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="Guardian Name (if Nominee is Minor)" name="nominee_gaurdian_name[]"  value="<?php echo isset($nominee_gaur[1]) ? $nominee_gaur[1] : '' ?>"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">                                                    
                                                            <button class="form-control" id="add_another_options2" style="padding: 0px;"> Add Nominee </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" id="option3"><small>Nominee 3</small> <br>
                                                    <div class="col-md-12" style="">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-"><input type="text" class="form-control" placeholder="enter name..." name="nominee_name[]" value="<?php echo isset($nominee[2]) ? $nominee[2] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="enter relationship of nominee.." name="nominee_relation[]" value="<?php echo isset($nominee_rel[2]) ? $nominee[2] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="date" class="form-control" name="nominee_dob[]" value="<?php echo isset($nominee_dob[2]) ? $nominee_dob[2] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="percentage of nominee" name="nominee_precentage[]"  value="<?php echo isset($nominee_pre[3]) ? $nominee_pre[3] : '' ?>"></div>
                                                                <div class="col-md-2"><input type="text" class="form-control" placeholder="Guardian Name (if Nominee is Minor)" name="nominee_gaurdian_name[]"   value="<?php echo isset($nominee_gaur[4]) ? $nominee_gaur[4] : '' ?>"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>PAN Number</label>
                                                    <input type="text" placeholder="Enter PAN Number" class="form-control" name="Pan" value="<?php echo isset($data['pan_number']) ? $data['pan_number'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Aadhar Number</label>
                                                    <input type="number" class="form-control" name="Aadhar" placeholder="Enter Aadhar Number" value="<?php echo isset($data['adhaar_number']) ? $data['adhaar_number'] : '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">   
                                                <div class="form-group">
                                                    <label>Income Type</label> <br>
                                                    <div class="row">
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="salaried" name="income_type" value="Salaried"<?php if(isset($data['income_type']) && $data['income_type'] == "Salaried"){echo "checked";}?>> <span>Salaried</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="professional" name="income_type" value="Professional Serivce"<?php if(isset($data['income_type']) && $data['income_type'] == "Professional Serivce"){echo "checked";}?>> <span>Professional Service</span> 
                                                    </div>
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="self" name="income_type" value="Self Employed"<?php if(isset($data['income_type']) && $data['income_type'] == "Self Employed"){echo "checked";}?>> <span>Self Employed</span> 
                                                    </div>
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="retired" name="income_type" value="Retired"<?php if(isset($data['income_type']) && $data['income_type'] == "Retired"){echo "checked";}?>> <span>Retired</span> 
                                                    </div>
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="homemaker" name="income_type" value="Home Maker"<?php if(isset($data['income_type']) && $data['income_type'] == "Home Maker"){echo "checked";}?>> <span>Home Maker</span> 
                                                    </div>
                                                    <div class="col-md-3">
                                                    <input type="checkbox" id="Business" name="income_type" value="Business"<?php if(isset($data['income_type']) && $data['income_type'] == "Business"){echo "checked";}?>> <span>Business</span> 
                                                    </div>

                                                    </div> 
                                                </div> 
                                            </div>

                                            <!--start form field salaried person -->
                                            <div class="col-md-12">
                                                <div class="row" name="salaried" id="income_type_salaried" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >

                                                            <label>Company Name </label>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name[]" value="<?php echo isset($data['company_name']) ? $data['company_name'] : '' ?>">
                                                                    <div><font><?php echo form_error(''); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Company Type</label>       
                                                            <select class="form-control" name="company_type"> 
                                                            <option value="Goverment">Goverment</option>
                                                            <option value="public_sector">Public Sector</option>
                                                            <option value="public_ltd_co.">Public Ltd. Co.</option>
                                                            <option value="private_ltd_co.">Private Ltd. Co.</option>
                                                            <option value="mnc">MNC</option>
                                                            </select>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Designation </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="designation" class="form-control" placeholder="Enter Your Designation" value="<?php echo isset($data['designation']) ? $data['designation'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Work Address / Location</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="work_address" class="form-control" placeholder="Enter Work Address" value="<?php echo isset($data['work_address']) ? $data['work_address'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Monthly Salary</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="salary" class="form-control" placeholder="Enter Your Monthly Salary" value="<?php echo isset($data['salary']) ? $data['salary'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Other Incomes</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="other_income" class="form-control" placeholder="Enter Other Income Source (if any)" value="<?php echo isset($data['other_income']) ? $data['other_income'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Total Years Of Experience</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="experience" class="form-control" placeholder="Enter Total Years Of Experience" value="<?php echo isset($data['experience']) ? $data['experience'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>

                                            <!--end form field salaried person -->
                                            
                                            <!-- start form business fieled -->
                                            
                                            <div class="col-md-12">
                                                <div class="row" name="business_fieled" id="business_fieled" >
                                                    <div class="col-md-12">
                                                        <div class="form-group" >
                                                            <label>Nature of Business </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Nature of Business" name="nature_of_business" value="<?php echo isset($data['nature_of_business']) ? $data['nature_of_business'] : '' ?>">
                                                                    <div><font><?php echo form_error(''); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>PAN/TAN Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="pan_no" class="form-control" placeholder="Enter PAN Number" value="<?php echo isset($data['pan_no']) ? $data['pan_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>GST Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="gst" class="form-control" placeholder="Enter GST Number" value="<?php echo isset($data['gst']) ? $data['gst'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Start Date *</label> 
                                                            <input type="date" class="form-control" placeholder="Enter Start Date"  name="business_start_date" value="">
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>No.of Employees</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="employee_no" class="form-control" placeholder="Enter No.of Employees" value="<?php echo isset($data['employee_no']) ? $data['employee_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--start form field business person -->

                                            <!--start form field professional person -->
                                            <div class="col-md-12">
                                                <div class="row" id="income_type_professional" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >

                                                            <label>Company Name </label>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name[]" value="<?php echo isset($data['company_name']) ? $data['company_name'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Professional Services</label>       
                                                            <select class="form-control" name="professional_service">
                                                            <option value="Advocate">Advocate</option>
                                                            <option value="Banker">Banker</option>
                                                            <option value="Builder">Builder</option>
                                                            <option value="CA">CA</option>
                                                            <option value="Engineer">Engineer</option>
                                                            <option value="Lawyer">Lawyer</option>
                                                            <option value="Others">Others</option>
                                                            </select>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Registered Office Address</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="office_address" class="form-control" placeholder="Enter Your Office Address" value="<?php echo isset($data['office_address']) ? $data['office_address'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>No. Of Employees</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="employee_no" class="form-control" placeholder="Enter Number Of Employees" value="<?php echo isset($data['employee_no']) ? $data['employee_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>PAN/TAN Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="pan_no" class="form-control" placeholder="Enter PAN Number" value="<?php echo isset($data['pan_no']) ? $data['pan_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>GST Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="gst" class="form-control" placeholder="Enter GST Number" value="<?php echo isset($data['gst']) ? $data['gst'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Annual Turnover</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="annual_turnover" class="form-control" placeholder="Enter Annual Turnover" value="<?php echo isset($data['annual_turnover']) ? $data['annual_turnover'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end form field professional person -->

                                            <!--start form field self employed -->
                                            <div class="col-md-12">
                                                <div class="row" id="income_type_self" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Company Name </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name[]" value="<?php echo isset($data['company_name']) ? $data['company_name'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Self Employed</label>       
                                                            <select class="form-control" name="self-employed">
                                                            <option value="Propritor">Propritor</option>
                                                            <option value="partner">partner</option>
                                                            <option value="Director">Director</option>
                                                            <option value="Others">Others</option>
                                                            </select>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Registered Office Address</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="office_address" class="form-control" placeholder="Enter Registerd Office Address" value="<?php echo isset($data['office_address']) ? $data['office_address'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>No. Of Employees</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="employee_no" class="form-control" placeholder="Enter Number Of Employees" value="<?php echo isset($data['employee_no']) ? $data['employee_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>PAN/TAN Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="pan_no" class="form-control" placeholder="Enter PAN/TAN Number" value="<?php echo isset($data['pan_no']) ? $data['pan_no'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>GST Number</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="gst" class="form-control" placeholder="Enter GST Number " value="<?php echo isset($data['gst']) ? $data['gst'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Annual Turnover</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="annual_turnover" class="form-control" placeholder="Enter Annual-Turnover" value="<?php echo isset($data['annual_turnover']) ? $data['annual_turnover'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>

                                            <!--end form field self employed -->

                                            <!--start form field retired person -->
                                            <div class="col-md-12">
                                                <div class="row" id="income_type_retired" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >

                                                            <label>Source Of Income </label>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Source Of Income(If You Are Self Employed)" name="income_source" value="<?php echo isset($data['income_source']) ? $data['income_source'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Monthly Income</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Number Of Dependents" name="monthly_income" value="<?php echo isset($data['monthly_income']) ? $data['monthly_income'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>

                                            <!--end form field retired person -->

                                            <!--start form field home maker -->
                                            <div class="col-md-12">
                                                <div class="row" id="income_type_home_maker" >
                                                    <div class="col-md-6">
                                                        <div class="form-group" >

                                                            <label>Source Of Income </label>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Source of income" name="source_of_income" value="<?php echo isset($data['source_of_income']) ? $data['source_of_income'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group" >
                                                            <label>Monthly Income</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" placeholder="Enter Monthly Income" name="monthly_income" value="<?php echo isset($data['monthly_income']) ? $data['monthly_income'] : '' ?>">
                                                                    <div><font><?php echo form_error('weight'); ?></font></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>

                                            <!--end form field home maker -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Car</label>       
                                                    <select class="form-control" name="car_category">
                                                        <option value="">Select</option>
                                                        <option value="Own">Own</option>
                                                        <option value="Financed">Financed</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Rented">Leased/Rented</option>
                                                        <option value="Company_provided">Company Provided</option>
                                                    </select>
                                                </div> 
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Two Wheeler</label>       
                                                    <select class="form-control" name="two_wheeler_category">
                                                        <option value="">Select</option>
                                                        <option value="Own">Own</option>
                                                        <option value="Financed">Financed</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Rented">Leased/Rented</option>
                                                        <option value="Company_provided">Company Provided</option>
                                                    </select>
                                                </div> 
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>House</label>       
                                                    <select class="form-control"  name="house_category">
                                                        <option value="">Select</option>
                                                        <option value="Own">Own</option>
                                                        <option value="Financed">Financed</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Rented">Leased/Rented</option>
                                                        <option value="Company_provided">Company Provided</option>
                                                    </select>
                                                </div> 
                                            </div>
                                            
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Incorporation Certificate</label> 
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="incorporation_certificate" placeholder="Enter Incorporation Certificate" value="">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                          <span style="display:flex;"><img src="<?php echo base_url(); ?>assets/assets/images/images.png" style="height: 30px;" alt="no file chosen">
                                                          <input type="file" class="custom-file-input imagefile" name="incorporation_certificate" id="incorporation_certificate"></span>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>GST Certificate</label> 
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="" placeholder="Enter GST Certificate" value="">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                          <span style="display:flex;"><img src="<?php echo base_url(); ?>assets/assets/images/images.png" style="height: 30px;" alt="no file chosen">
                                                          <input type="file" class="custom-file-input imagefile" name="gst_certificate" id="gst_certificate"></span>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Identity Proofs</label>    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <select class="form-control sub_type" name="identity_category">
                                                                <option value="">Select Identity Type</option>
                                                                <option value="aadhar_card">Aadhar Card</option>
                                                                <option value="pan_card">PAN Card</option>
                                                                <option value="passport">Passport</option>
                                                                <option value="votar_id_card">Votar Id Card</option>
                                                                <option value="driving_license">Driving License</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                          <span style="display:flex;"><img src="<?php echo base_url(); ?>assets/assets/images/images.png" style="height: 30px;" alt="no file chosen">
                                                          <input type="file" class="custom-file-input imagefile" name="identity_proof" id="identity_proof"></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div> 
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address Proofs</label>  
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <select class="form-control sub_type" name="address_category" >
                                                                <option value="">Select Address Type</option>
                                                                <option value="aadhar_card">Aadhar Card</option>
                                                                <option value="passport">Passport</option>
                                                                <option value="votar_id_card">Votar Id Card</option>
                                                                <option value="driving_license">Driving License</option>
                                                                <option value="latest_telephone_bill">Latest Telephone Bill</option>
                                                                <option value="rental">Rental/Lease Agreement</option>
                                                            </select>  
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                          <span style="display:flex;"><img src="<?php echo base_url(); ?>assets/assets/images/images.png" style="height: 30px;" alt="no file chosen">
                                                          <input type="file" class="custom-file-input imagefile" name="address_proof" id="address_category"></span>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-md-12">   
                                                <div class="form-group">
                                                    <input type="checkbox" onClick="toggle(this)" /><label>Declaration</label> <br>
                                                    <input type="checkbox" name="foo"> 
                                                    <span>I / We, Delcare that the particulars and Information provided here is True & Correct. </span> <br>
                                                    <input type="checkbox" name="foo">
                                                    <span>I am aware of all rules and regulations of the chit and have understood it by reading it / has been translated to me in the language I understand</span><br>
                                                    <input type="checkbox" name="foo">
                                                    <span>I agree to be bound and abide by the terms and conditions of M/s. MYM Chit Fund Pvt. Ltd.</span><br>
                                                    <input type="checkbox" name="foo">
                                                    <span>I have joined the chit plans as subscriber on my own, for my own savings and financial support after going through the terms and conditions of MYM</span><br>
                                                    <input type="checkbox" name="foo">
                                                    <span>I / We, Understand that we have to provide security / Collateral to the extent of the future liabilities (installments) when, I / We bid for any chit.</span><br>
                                                    <input type="checkbox" name="foo">
                                                    <span>I / We, Understand that we have to provide security to the extent of 150% of the future liability in the form of movable or immovable property or Insurance bond / Band Gurantee paid up to 150% of the value of the future liability</span> 
                                                </div> 
                                            </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="submit" id="submit" value="submit"> <?php if(isset($data['member_id'])){ ?> Update Subscriber <?php } else{?> Add Subscriber <?php } ?></button>
                                        <button type="reset" class="btn btn-danger">Reset</button>        
                                            </div> 
                                        </div> 
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
        <?php //footer ?> 
        <?php include APPPATH . 'views/include/js.php'; ?>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        
        <script>
            $("#MobileNumber").on('change',function(){
                var mobile = $("#MobileNumber").val();

            //   $.ajax({
            //         url: '<?php echo base_url(); ?>Dashboard/CheckMobileIsExist',
            //         type: 'post',
            //         data: {mobile: mobile},
            //         contentType: false,
            //         processData: false,
            //         success: function(upload_file_path){
                        
            //         },
            //     });
            
             $.ajax({
               url: '<?php echo base_url(); ?>Dashboard/CheckMobileIsExist',
               type: 'POST',
               data: {mobile: mobile,},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    if(data != '0'){
                        alert('mobile is already exist !');
                        document.getElementById("submit").disabled = true;
                        $('#error_needwork_mobile').html('Mobile no. is already exist !');
                        $('#error_needwork_mobile').css('color','red');
                    }else{
                        document.getElementById("submit").disabled = false;
                        $("#error_needwork_mobile").html('');
                    }
               }
            });
        
            });
        </script>
       
       
       <script>
            $(document).ready(function () {

                $("#myform").validate({
                   
                    rules: {
                        name: {
                            required: true
                         },
                        mobile: {
                            required: true,
                            minlength:10,
                            maxlength:12
                        },
                        address: {
                            required: true
                        },
                        nominee_name: {
                            required: true
                        },
                        nominee_relationship: {
                            required: true
                        },
                        nominee_dob: {
                            required: true
                        },
                        nominee_percentage: {
                            required: true
                        },
                        Pan: {
                            required: true,
                            minlength: 10,
                            maxlength:10
                        },
                        Aadhar: {
                            required: true,
                            minlength: 13,
                            maxlength:13
                        },
                        gst: {
                            required: true,
                            minlength: 15
                        },
                        addnominee: {
                            required: true,
                        },
                       

                    }, messages: {
                        name: {
                            required: "Enter Your First name"
                         },
                         
                        mobile : {
                            required : "Enter mobial number",
                            minlength: "Please minimum 10 Digit only",
                            maxlength: "Please Valid mobile only"
                        },
                       
                        address : {
                            required : "Enter Address"
                        },
                       
                        nominee_name : {
                            required : "Enter Nominee Name"
                        },
                        nominee_relationship : {
                            required : "Enter Nominee Relationship"
                        },
                        nominee_dob : {
                            required : "Enter Nominee Dob"
                        },
                        nominee_percentage : {
                            required : "Enter Nominee Percentage"
                        },                        
                        Pan : {
                            required : "Enter Pan Number",
                            minlength: "Please minimum 10 Digit only",
                            maxlength: "Please minimum 10 Digit only"
                        },
                        Aadhar : {
                            required : "Enter Aadhar Number",
                            minlength: "Please minimum 13 Digit only",
                            maxlength: "Please minimum 13 Digit only"
                        },
                        gst : {
                            required : "Enter Gst Number",
                            minlength: "Please minimum 15 Digit only"
                        },
                        addnominee : {
                            required : "recuired add nominee"
                        },
                    }
                    
                });
            });

        </script>
        <script>
            $(document).ready(function () {

                $("#option").hide();
                $("#variant").on("click", function () {
                    $("#option").toggle();
                });

                $("#quantity").hide();
                $("#track").on("click", function () {

                    $("#quantity").toggle();

                });

                $("#family_details").hide();
                $("#married").on("click", function (){
                    $("#family_details").toggle()

                });

                $("#income_type_salaried").hide();
                $("#salaried").on("click", function () {
                    $("#income_type_salaried").toggle();
                });

                $("#income_type_retired").hide();
                $("#retired").on("click", function () {
                    $("#income_type_retired").toggle();
                });

                $("#income_type_home_maker").hide();
                $("#homemaker").on("click", function () {
                    $("#income_type_home_maker").toggle();
                });
                
                $("#business_fieled").hide();
                $("#Business").on("click", function () {
                    $("#business_fieled").toggle();
                });

                $("#income_type_professional").hide();
                $("#professional").on("click", function () {
                    $("#income_type_professional").toggle();
                });

                $("#income_type_self").hide();
                $("#self").on("click", function () {
                    $("#income_type_self").toggle();
                });

                $("#option2").hide();
                $("#add_another_options1").on("click", function (e) {
                    $("#add_another_options1").hide();
                        e.preventDefault();
                    $("#option2").show();
                });
                $("#option3").hide();
                $("#add_another_options2").on("click", function (e) {
                    $("#add_another_options2").hide();
                          e.preventDefault();
                    $("#option3").show();
                });
               
            });
        </script>
        

    <script>
    $(".imagefile").on('change',function(){
        var type_id  = $(this).attr('id');
        var type  = $(this).attr('name');
        var sub_type = $(".sub_type").val();
        var form_data = new FormData();
        let doc_arr = [];
        // Read selected files
        form_data.append("docs", $("#"+type_id)[0].files[0]);
        
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/imagesUpload',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(upload_file_path){
            doc_arr.push({'doc_type':type,'doc_sub_type':sub_type,'doc_file_path':upload_file_path});
            var json_doc_data = JSON.stringify(doc_arr);
            console.log("json_doc_data"+json_doc_data);
            $("#docs").val(json_doc_data);
            },
        });
    });
    </script>
    
    <script>
    $("#imageprofile").on('change',function(){
        var type_id  = $(this).attr('id');
        var sub_type = $(".sub_type").val();
        var form_data = new FormData();
        // Read selected files
        form_data.append("docs", $("#"+type_id)[0].files[0]);
        
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/profileUpload',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(upload_file_path){
                console.log(upload_file_path);
            $("#upload_image").val(upload_file_path);
            },
        });
    });
    </script>
    
    <script type="text/javascript">
    $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $('#myImg').attr('src', e.target.result);
        $('#yourImage').attr('src', e.target.result);
    };

</script>

<script>
    function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

<script>
    $("#imageupdateprofile").on('change',function(){
        alert("You are trying to upload an image !!");
        var member_id = $("#member_id").val();
        var type_id  = $(this).attr('id');
        var form_data = new FormData();
        // Read selected files
        form_data.append("docs", $("#"+type_id)[0].files[0]);
        
        $.ajax({
            url: '<?php echo base_url(); ?>Dashboard/profileUploadUpdate',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(upload_file_path){
              if(upload_file_path != ''){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url(); ?>Dashboard/memberProfileUpload',
                    data: {
                      "member_id": member_id,
                      "upload_file_path":upload_file_path
                      },
                    success:function(data){
                      location.reload();
                    }
                 });
              }
            
            },
        });
    });
    </script>

    </body>
</html>