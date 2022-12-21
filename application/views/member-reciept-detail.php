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
                                    <h4 class="mb-3">Transaction History Details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                                                           
                            <div class="row">
                                        <?php if (isset($data) && is_array($data)) { ?>
                                            <?php $i=1; foreach($data as $key => $values) {  
                                                ?> 
                                         
                                             <div class="col-lg-6" style=""  >
                                                <div class="card shadow-sm" >      
                                                    <div style="padding: 1px;">   
                                                        <div class="row" >
                                                            <div class="col-lg-3">
                                                                <div style="padding: 3px;border-right: 1px solid darkgray;" >
                                                                    <div style="text-align: center;"><span style="background-color: darkseagreen;color: aliceblue;border-radius: 8px;padding: 4px;"><?php echo isset($values['plan_name'])? $values['plan_name'] :'' ?></span></div> 
                                                                     <div style="text-align: center;"><span style="font-size: 10px;"><?php echo isset($values['paid_date'])? $values['paid_date'] :'' ?></span></div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <div><span style="font-size: 20px;color: crimson;"> ₹<?php echo isset($values['emi_amount'])? $values['emi_amount'] :'' ?></span></div> 
                                                                     <div><span> Emi Month : <?php echo isset($values['emi_month'])? $values['emi_month'] :'' ?></span></div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">                                                               
                                                                <div style=" height: 40px; width: 40px;background-color: aliceblue;border-radius: 50%;border: 1px solid #0000000d;padding-top: 3px;margin-top: 10px;">
                                                                     <div style="text-align: center;"><span style="color: crimson;font-size: 19px;"><?php echo isset($values['emi_number'])? $values['emi_number'] :''  ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        

                                                         <div class="col-lg-12" style="padding: 3px;border-top: 1px solid darkgray;">
                                                            <div style="text-align: center;">
                                                                <a href="#"  > <button class="btn btn-dark" style="border-radius: 18px;WIDTH: 69px;height: 30px;font-size: 10px;" ><span>RECEIPT</span></button></a>
                                                            </div>
                                                                
                                                        </div>
                                                        
                                                    </div>                                
                                                </div> 
                                             </div> 
                                                  
                                             <!-- <figure class="table"><table><thead><tr><th>Basis</th><th>File System</th><th>DBMS</th></tr></thead><tbody><tr><th>Structure</th><td>The file system is software that manages and organizes the files in a storage medium within a computer.</td><td>DBMS is software for managing the database.</td></tr><tr><th>Data Redundancy</th><td>Redundant data can be present in a file system.</td><td>In DBMS there is no redundant data.</td></tr><tr><th>Backup and Recovery</th><td>It doesn’t provide backup and recovery of data if it is lost.</td><td>It provides backup and recovery of data even if it is lost.</td></tr><tr><th>Query processing</th><td>There is no efficient query processing in the file system.</td><td>Efficient query processing is there in DBMS.</td></tr><tr><th>Consistency</th><td>There is less data consistency in the file system.</td><td>There is more data consistency because of the process of normalization.</td></tr><tr><th>Complexity</th><td>It is less complex as compared to DBMS.</td><td>It has more complexity in handling as compared to the file system.</td></tr><tr><th>Security Constraints</th><td>File systems provide less security in comparison to DBMS.</td><td>DBMS has more security mechanisms as compared to file systems.</td></tr><tr><th>Cost</th><td>It is less expensive than DBMS.</td><td>It has a comparatively higher cost than a file system.</td></tr><tr><th>Data Independence</th><td>There is no data independence.</td><td>In DBMS data independence exists.</td></tr><tr><th>User Access</th><td>Only one user can access data at a time.</td><td>Multiple users can access data at a time.</td></tr></tbody></table></figure> -->
                                             <!-- <img width="981" height="634" src="https://www.guru99.com/images/1/042919_0417_DataIndepen1.png" alt="" class="lazyloaded" data-ll-status="loaded"> -->

                                            <?php $i++; } ?>
                                        <?php } ?>
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
        <script>
            $(".data-delete").click(function () {
                if (!confirm("Do you really want to delete this?")) {
                    return false;
                }
            });

        </script>        
    </body>
</html>