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
                        <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Home </a>&nbsp;&nbsp; > &nbsp;</li>
                    <li class="active">Auctions</li>
                  </ul>
						<div class="row">
							<div class="col-lg-12">
								<div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
									<div>
										<h4 class="mb-3">Available Plan For Auction</h4>
									</div>
								</div>
							</div>
							<!--<div class="col-lg-12">-->
							<!--	<div class="row">-->
							<!--				<?php if (isset($data) && is_array($data)) { ?>-->
							<!--					<?php $i=1; foreach($data as $key => $values) { ?> -->
							<!--					 <div class="col-lg-4">-->
							<!--						<div class="card shadow-sm" > -->
							<!--						<form action="<?php echo base_url(); ?>Dashboard/planGroupForAuction/<?php echo isset($values['plan_id']) ? $values['plan_id'] : '' ?>" method="POST">-->
							<!--						    <input type="hidden" name="plan_name" value="<?php echo isset($values['plan_name']) ? $values['plan_name'] : '' ?>">-->
							<!--							<div style="padding: 16px;">             -->
							<!--								<h6>Plan Amount<span style="color:red;margin-left: 82px">: <?php echo isset($values['plan_amount']) ? $values['plan_amount'] :'' ?></span></h6>                              -->
							<!--								<h6>Plan Tenure <span style="color:red;margin-left: 88px"> : <?php echo isset($values['tenure']) ? $values['tenure'] :'' ?></span></h6> -->
							<!--								<h6>Start Month<span style="color:red;margin-left: 85px"> : <?php echo isset($values['start_month']) ? $values['start_month'] :'' ?></span></h6>-->
							<!--								<h6>Emi<span style="color:red;margin-left: 145px"> : <?php echo isset($values['emi']) ? $values['emi'] :'' ?></span></h6>-->
							<!--								<h6>Total Subsription<span style="color:red;margin-left: 50px"> : <?php echo isset($values['total_subscription']) ? $values['total_subscription'] :'' ?></span></h6>-->
							<!--								<button style="background:#1ABC21;color: white;border-radius:10px; margin-left:100PX; margin-top: 20px;">NEXT</button>-->
							<!--							</div>-->
							<!--						</form>-->
							<!--						</div> -->
							<!--					 </div>                                  -->
							<!--					<?php $i++; } ?>-->
							<!--				<?php } ?>-->
							<!--		    </div> -->
							<!--	</div>-->
							
							<!-- table -->
							
							 <div class="col-lg-12">
                            <div class="table-responsive rounded mb-3">
                                <table class="data-table table mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>Sr No</th>
                                            <th>Plan Name</th>
                                            <th>Gross Chit Amount</th>
                                            <th>Plan Tenure</th>
                                            <th>Start Month</th>
                                            <th>EMI</th>
                                            <th>Total Subscription</th>
                                            <!--<th>Action</th>-->
                                            
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="ligth-body">
                                        <?php if (isset($data) && is_array($data)) { ?>
												<?php $i=1; foreach($data as $key => $values) { ?> 
                                                <tr>
                 <!--                                   <form action="<?php echo base_url(); ?>Dashboard/planGroupForAuction/<?php echo isset($values['plan_id']) ? $values['plan_id'] : '' ?>" method="POST">-->
													    <!--<input type="hidden" name="plan_name" value="">-->
														
                                                   <td><?php echo $i ; ?></td>
                                                   <td><a href="<?php echo base_url(); ?>Dashboard/planGroupForAuction/<?php echo isset($values['plan_id']) ? $values['plan_id'] : '' ?>"><?php echo isset($values['plan_name']) ? $values['plan_name'] :'' ?><a></td>
                                                   <td><?php echo isset($values['plan_amount']) ? $values['plan_amount'] :'' ?></td>
                                                   <td><?php echo isset($values['tenure']) ? $values['tenure'] :'' ?></td>
                                                   <td><?php echo isset($values['start_month']) ? $values['start_month'] :'' ?></td>
                                                   <td><?php echo isset($values['emi']) ? $values['emi'] :'' ?></td>
                                                   <td><?php echo isset($values['total_subscription']) ? $values['total_subscription'] :'' ?></td>
                                                   <!--<th><button class="btn btn-success">NEXT</button></th>-->
                                                   <!--</form>-->
                                                </tr>
                                            <?php $i++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
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