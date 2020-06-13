
<?php
	$title = 'Client By Policy | LIC Policy Management System';
	$page = 'report';
	include_once 'header.php';
	include_once 'action.php';

	$result = '';
	if(isset($_POST['policywise'])) {
		$policyPlan = $_POST['policy_plan'];
		
		$result = $crud->selectByPolicy('client_policy', 'policy_plan', $policyPlan);
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
	.form-panel form label {
		font-size: 1.3em;
	}
</style>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">

				<div class="form-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- Select Date -:-</h4>
						</div>
						<div class="clearfix"></div>

						<form role="form" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
							<div class="form-group"></div>
							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Plan :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" name="policy_plan">
										<option value="" selected disabled="disabled"> Select Policy Plan </option>
									<?php
										$policy = $crud->selectRecord('policy_plan');
										foreach ($policy as $plan) {
									?>
										<option value="<?php echo $plan['id']; ?>"> <?php echo $plan['policy_plan']; ?> </option>
									<?php } ?>
									</select>
								</div>

								<input type="submit" name="policywise" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>



				<div class="content-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- View Client By Policy -:-</h4>
						</div>
						<div class="clearfix"></div>

						<div class="table-responsive">
							<table id="example" class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<tr>
										<th> # </th>
										<th> LIC Policy </th>
										<th> Policy Plan </th>
										<th> Customer Name </th>
										<th> Customer Address </th>
										<th> Contact </th>
										<th> Email </th>
										<th> View Detail </th>
										<th> Print </th>
									</tr>
								</thead>
								
								<tbody>
								<?php 
									$num = 1;
									foreach($result as $policy) {
								?>
									<tr>
										<td> <?php echo $num; ?> </td>
										<td> <?php echo $policy['lic_policy']; ?> </td>
										<td> <?php echo $policy['policy_plan']; ?> </td>

										<td> <?php echo $policy['client_name']; ?> </td>
										<td> <?php echo $policy['client_address']; ?> </td>

										<td> <?php echo $policy['contact']; ?> </td>
										<td> <?php echo $policy['email']; ?> </td>
										<td>  </td>
										<td>
											<!-- <a href=""><img src="assets/images/pencil.png"></a> -->
											<a href="cilentPolicyView.php?enqDel=<?php echo $policy['id']; ?>" onclick="return confirm('Are You Sure..!')">
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
		</div>
	</section>
</section>

<?php include_once 'footer.php'; ?>