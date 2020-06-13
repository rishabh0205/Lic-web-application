
<?php
	$title = 'View Enquiry | LIC Policy Management System';
	$page = 'enquiry';
	include_once 'header.php';
	include_once 'action.php';

	$result = $crud->selectRecord('adminlogin');
?>



<style>
	.form-panel form label {
		font-size: 1.3em;
	}
</style>

<script>
	$(document).ready(function() {
    	$("#marryDate").prop("disabled", true);
	    $("#getInput").click(function() {

	    	$("#marryDate").prop("disabled", false);
	    });
    });
</script>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">
				<div class="form-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- Profile -:-</h4>
							<span class="btn btn-warning"> Edit Profile </span>
						</div>
						<div class="clearfix"></div>

						<form role="form" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
							<div class="form-group"></div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Name :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="name" class="form-control" placeholder="Customer Name..!" value="<?php echo $result['name']; ?>">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Short Name :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="short" class="form-control" placeholder="Customer Name..!" value="<?php echo $result['short_name']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Email :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="email" name="email" class="form-control" placeholder="Customer Name..!" value="<?php echo $result['email']; ?>">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Contact :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="contact" class="form-control" placeholder="Customer Name..!" maxlength="10" value="<?php echo $result['phone']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Address :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<textarea name="address" class="form-control" placeholder="Customer Name..!" rows="3"><?php echo $result['address']; ?></textarea>
								</div>

								<div class="col-md-2 col-sm-2 col-xs-12">
									<label> Pin :</label>
									<input type="text" name="pin" class="form-control" placeholder="Customer Name..!" maxlength="6" value="<?php echo $result['pin']; ?>">
								</div>

								<div class="col-md-4 col-sm-4 col-xs-12">
									<label> State :</label>
									<select name="state" class="form-control">
										<option value="" selected disabled="disabled"> Select State </option>
										<option value="Andhra Pradesh"> Andhra Pradesh </option>
										<option value="Arunachal Pradesh"> Arunachal Pradesh </option>
										<option value="Assam"> Assam </option>
										<option value="Bihar"> Bihar </option>
										<option value="Chhattisgarh"> Chhattisgarh </option>
										<option value="Goa"> Goa </option>
										<option value="Gujarat"> Gujarat </option>
										<option value="Haryana"> Haryana </option>
										<option value="Himachal Pradesh"> Himachal Pradesh </option>
										<option value="Jammu and Kashmir"> Jammu and Kashmir </option>
										<option value="Jharkhand"> Jharkhand </option>
										<option value="Karnataka"> Karnataka </option>
										<option value="Kerala"> Kerala </option>
										<option value="Madhya Pradesh"> Madhya Pradesh </option>
										<option value="Maharashtra"> Maharashtra </option>
										<option value="Manipur"> Manipur </option>
										<option value="Meghalaya"> Meghalaya </option>
										<option value="Mizoram"> Mizoram </option>
										<option value="Nagaland"> Nagaland </option>
										<option value="Odisha"> Odisha </option>
										<option value="Punjab"> Punjab </option>
										<option value="Rajasthan"> Rajasthan </option>
										<option value="Sikkim"> Sikkim </option>
										<option value="Tamil Nadu "> Tamil Nadu   </option>
										<option value="Telangana"> Telangana </option>
										<option value="Tripura"> Tripura </option>
										<option value="Uttar Pradesh"> Uttar Pradesh </option>
										<option value="Uttarakhand"> Uttarakhand </option>
										<option value="West Bengal"> West Bengal </option>
									</select>
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