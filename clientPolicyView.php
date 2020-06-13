
<?php
	$title = 'View Client Policy | LIC Policy Management System';
	$page = 'client';
	include_once 'header.php';
	include_once 'action.php';

	if(isset($_GET['cliDel'])) {
		$where = array('id' => $_GET['cliDel']);
		if($crud->deleteRecord('client_policy', $where)) {
			echo "<script> alert('Client Policy Deleted Successfully..!'); window.location.href = 'clientPolicyView.php'; </script>";
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
							<h4>-:- View Client Policy -:-</h4>
							<a href="clientPolicyAdd.php" class="btn btn-warning"> Add Client Policy </a>
						</div>
						<div class="clearfix"></div>

						<div class="table-responsive">
							<table id="example" class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<tr>
										<th> # </th>
										<th> Customer Name </th>
										<th> Customer Address </th>
										<th> Contact </th>
										<th> Email </th>
										<th> LIC Policy </th>
										<th> Policy Plan </th>
										<th> Details </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$num = 1;
									$cli = $crud->selectRecord('client_policy');
									foreach($cli as $cli_data) {
								?>
									<tr>
										<td> <?php echo $num; ?> </td>
										<td> <?php echo $cli_data['client_name']; ?> </td>
										<td> <?php echo $cli_data['client_address']; ?> </td>
										<td> <?php echo $cli_data['contact']; ?> </td>
										<td> <?php echo $cli_data['email']; ?> </td>
										<td> <?php echo $cli_data['lic_policy']; ?> </td>
										<td> <?php echo $cli_data['policy_plan']; ?> </td>
										
										<td>
											<a href="#?cliDel=<?php echo $cli_data['id']; ?>">
												<img src="assets/images/view.png">
											</a>
										</td>
										<td>
											<!-- <a href=""><img src="assets/images/pencil.png"></a> -->
											<a href="clientPolicyView.php?cliDel=<?php echo $cli_data['id']; ?>" onclick="return confirm('Are You Sure..!')">
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