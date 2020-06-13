
<?php
	$title = 'View Enquiry | LIC Policy Management System';
	$page = 'enquiry';
	include_once 'header.php';
	include_once 'action.php';

	if(isset($_GET['enqDel'])) {
		$where = array('id' => $_GET['enqDel']);
		if($crud->deleteRecord('enquiry', $where)) {
			echo "<script> alert('Enquiry Deleted Successfully..!'); window.location.href = 'enquiryView.php'; </script>";
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
							<h4>-:- View Enquiry -:-</h4>
							<a href="enquiryAdd.php" class="btn btn-warning"> Add Enquiry </a>
						</div>
						<div class="clearfix"></div>

						<table id="example" class="table table-striped table-advance table-hover table-bordered table-responsive">
							<thead>
								<tr>
									<th> # </th>
									<th> Customer Name /<br> Customer Address </th>
									<th> DOB / Age </th>
									<th> Contact / Email </th>
									<th> Description / Possibility </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$num = 1;
								$enq = $crud->selectRecord('enquiry');
								foreach($enq as $cus_enq) {
							?>
								<tr>
									<td> <?php echo $num; ?> </td>
									<td width="25%"> <?php echo $cus_enq['customer_name'].' /<br><b>'.$cus_enq['customer_address'].'</b>'; ?> </td>
									<td width="10%"> <?php echo date('d-m-Y', strtotime($cus_enq['customer_dob'])).' /<br>'.$cus_enq['customer_age']; ?> </td>
									<td width="20%"> <?php echo $cus_enq['contact'].' /<br>'.$cus_enq['email']; ?> </td>
									<td width="30%"> <?php echo $cus_enq['description'].' / <b>'.$cus_enq['possibility'].'</b>'; ?> </td>
									</td>
									<td>
										<!-- <a href=""><img src="assets/images/pencil.png"></a> -->
										<a href="enquiryView.php?enqDel=<?php echo $cus_enq['id']; ?>" onclick="return confirm('Are You Sure..!')">
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

<?php include_once 'footer.php'; ?>