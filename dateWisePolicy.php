
<?php
	$title = 'Client By Date | LIC Policy Management System';
	$page = 'report';
	include_once 'header.php';
	include_once 'action.php';

	$result = '';
	if(isset($_POST['datewise'])) {
		$fromDate = $_POST['from_date'];
		$toDate = $_POST['to_date'];
		
		$result = $crud->selectByDate('client_policy', 'create_date', $fromDate, $toDate);
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
								<label class="col-md-1 col-sm-1 col-xs-12 label-control"> From :</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="date" name="from_date" class="form-control">
								</div>

								<label class="col-md-1 col-sm-1 col-xs-12 label-control"> To :</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<input type="date" name="to_date" class="form-control">
								</div>

								<input type="submit" name="datewise" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>



				<div class="content-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- View Client By Date -:-</h4>
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
										<th> Email </th>
										<th> Email </th>
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
										<td> <?php echo $policy['email']; ?> </td>
										<td> <?php echo $policy['email']; ?> </td>
										<td> <?php echo $policy['email']; ?> </td>
										<td> 
											<a href="#">
												<img src="assets/images/view.png">
											</a>
										</td>
										<td>
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