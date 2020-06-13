
<?php
	$title = 'Add Policy Plan | LIC Policy Management System';
	include_once 'action.php';
	include_once 'header.php';
	
	if(isset($_POST['enq_submit'])) {
		$enquiry = array(
			'customer_name'	=>	ucwords($_POST['cus_name']),
			'customer_address'	=>	ucwords($_POST['cus_address']),
			'customer_dob'	=>	$_POST['dob'],
			'customer_age'	=>	$_POST['age'],
			'contact'	=>	$_POST['phone'],
			'email'	=>	$_POST['emailId'],
			'possibility'	=>	ucwords($_POST['possibility']),
			'description'	=>	ucfirst($_POST['description'])
		);
		if($crud->insertRecord('enquiry', $enquiry)) {
			echo "<script> alert('Enquiry Added Successfully..!'); window.location.href = 'enquiryView.php'; </script>";
		} else {
			echo $this->conn->error;
		}
	}
?>

<style>
	.form-panel form label {
		font-size: 1.3em;
	}
</style>
<script>
    function getAge() {
        var dob = document.getElementById("dob").value;
        dob = new Date(dob);
        var currentdt = new Date();
        var age = Math.floor((currentdt-dob)/(365.25 * 24 * 60 * 60 * 1000));
        document.getElementById("age").value = age + ' Year';
    }
</script>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- Add Enquiry -:-</h4>
							<a href="policyPlanView.php" class="btn btn-warning"> View Enquiry </a>
						</div>
						<div class="clearfix"></div>

						<form role="form" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
							<div class="form-group"></div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Customer Name :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="cus_name" class="form-control" placeholder="Customer Name..!">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Customer Address :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<textarea name="cus_address" class="form-control" placeholder="Customer Address..!" rows="3"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Date Of Birth :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="date" name="dob" id="dob" class="form-control" onchange="getAge()">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Age :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="age" id="age" class="form-control" placeholder="Customer Age..!" readonly="readonly">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Contact No. :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="phone" class="form-control" placeholder="Contact Number..!" maxlength="10">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Email Id </label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="email" name="emailId" class="form-control" placeholder="Customer Email Id..!">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Description :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<textarea name="description" class="form-control" placeholder="Description Of Enquiry..!" rows="3"></textarea>
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Status :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="possibility" class="form-control">
										<option value="" selected disabled="disabled"> Select Possibilities </option>
										<option value="Planned"> Planned </option>
										<option value="Held"> Held </option>
										<option value="Not Held"> Not Held </option>
										<option value="Interested"> Interested </option>
										<option value="Not Interested"> Not Interested </option>
										<option value="Rejected"> Rejected </option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-11 col-sm-offset-11 col-xs-offset-10">
									<input type="submit" name="enq_submit" value="Submit" class="btn btn-primary">
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

<?php include_once 'footer.php'; ?>