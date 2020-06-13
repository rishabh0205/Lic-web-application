
<?php
	$title = 'View Policy Plan | LIC Policy Management System';
	$page = 'gallery';
	include_once 'header.php';
	include_once 'action.php';

	
	if(isset($_GET['planDel'])) {
		$where = array('id' => $_GET['planDel']);
		if($crud->deleteRecord('policy_plan', $where)) {
			echo "<script> alert('Policy Plan Deleted Successfully..!'); window.location.href = 'policyPlanView.php'; </script>";
		} else {
			echo $this->conn->error;
		}
	}
?>

<style>
	tr th {
		font-size: 1.2em;
		text-align: center;
	}
	tr td {
		font-size: 1.1em;
		text-align: center;
	}
	tbody span {
		cursor: pointer;
	}
</style>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- View Policy Plan -:-</h4>
							<a href="policyPlanAdd.php" class="btn btn-primary"> Add Plan </a>&nbsp;&nbsp;&nbsp;
							<a href="#" data-target="#addPolicy" data-toggle="modal" class="btn btn-warning"> View LIC Policy </a>
						</div>
						<div class="clearfix"></div>

						<table id="example" class="table table-striped table-advance table-hover table-bordered table-responsive">
							<thead>
								<tr>
									<th> # </th>
									<th> Lic Policy </th>
									<th> Policy Plan </th>
									<th> Policy Term </th>
									<th> Medical Checkup </th>
									<th> Detail </th>
									<th> Status </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = 1;
								$plan = $crud->selectRecord('policy_plan');
								foreach($plan as $policy_plan) {
							?>
								<tr>
									<td> <?php echo $num; ?> </td>
									<td> <?php echo $policy_plan['lic_policy_id']; ?> </td>
									<td> <?php echo $policy_plan['policy_plan']; ?> </td>
									<td> <?php echo $policy_plan['policy_term']; ?> </td>
									<td> <?php echo $policy_plan['medical_checkup']; ?> </td>
									<td>
										<span data-toggle="modal" data-target="#myModal<?php echo $num; ?>">
											<img src="assets/images/view.png">
										</span>
									</td>
									<td>
									<?php if($policy_plan['isActive'] == 'Active') { ?>
										<img src="assets/images/active.png">
									<?php } else if($policy_plan['isActive'] == 'Deactive') { ?>
										<img src="assets/images/deactive.png">										
									<?php } ?>
									</td>
									<td>
										<!-- <a href=""><img src="assets/images/pencil.png"></a> -->
										<a href="policyPlanView.php?planDel=<?php echo $policy_plan['id']; ?>" onclick="return confirm('Are You Sure..!')">
											<img src="assets/images/trash.png">
										</a>
									</td>
								</tr>
							<?php $num++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

<?php 
	$count = 1;
	$licPlan = $crud->selectRecord('policy_plan');
	foreach($licPlan as $plan) {
?>
	<div id="myModal<?php echo $count; ?>" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 800px">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Policy Detail </h4>
			</div>
			<div class="modal-body">
				<p><b> Policy Plan : </b><?php echo $plan['policy_plan'].'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Policy Term : </b>'. $plan['policy_term'].'.'; ?></p>

				<p><b> Entry Age : </b><?php echo $plan['entry_age'].'. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Maximum Maturity Data : </b>'. $plan['maximun_maturity_age'].'.'; ?></p>

				<p><b> Maximum Premium Price : </b><?php echo $plan['purchase_price'].'. <b> Minimum Sum Assured : </b>'.$plan['minimun_sum_assured'].'.'; ?></p>
			</div>
		</div>

		</div>
	</div>
<?php $count++; } include_once 'footer.php'; ?>