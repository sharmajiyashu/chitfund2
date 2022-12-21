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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div>
                                    <h4 class="mb-3">Receivables</h4>
                                    <h3 class="mb-3">Total Payments Due : <?php echo isset($total_due) ? $total_due :''; ?></h3>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-lg-12">
                             <div class="table-responsive rounded mb-3">
                                <table id="example1" class=" table mb-0 tbl-server-info" style="width:100%">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>S.no</th>
                                            <th>Particulars</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                        <?php 
                                            if(!empty($data)){ $i=1;
                                                foreach($data as $key=>$val){ ?>
                                                   <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo isset($val['member_name']) ? $val['member_name'] :''; ?></td>
                                                        <td><?php echo isset($val['due']) ? $val['due'] :''; ?></td>
                                                    </tr>
                                           <?php  $i++;    }
                                            }
                                            
                                        ?>
                                        
                                        
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
    <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                   
                } );
            } );
            
              $(document).ready(function() {
                $('#example1').DataTable( {
                    
                } );
            } );
        </script>    
        
        
        
        <!-- Wrapper End-->
        <?php // footer?>
        <?php include APPPATH . 'views/include/js.php'; ?>
    </body>
</html>