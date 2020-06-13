
<?php
	$title = 'Add Client Policy | LIC Policy Management System';
	$page = 'client';
	include_once 'header.php';
	include_once 'action.php';

	if(isset($_POST['cli_submit'])) {
		$client = array(
			'client_name'	=>	ucwords($_POST['cus_name']),
			'client_address'	=>	ucwords($_POST['cus_address']),
			'gender'	=>	$_POST['gender'],
			'category'	=>	$_POST['category'],
			'client_dob'	=>	$_POST['dob'],
			'client_age'	=>	$_POST['age'],
			'marital_status'	=>	$_POST['marital'],
			'marry_date'	=>	$_POST['marriage_date'],
			'contact'	=>	$_POST['phone'],
			'email'	=>	$_POST['emailId'],
			'lic_policy'	=>	$_POST['licPolicy'],
			'policy_plan'	=>	ucwords($_POST['policyPlan']),
			'policy_pay_term'	=>	$_POST['pay_term'],
			'policy_amount_to_paid'	=>	number_format((float)$_POST['tobepaid'],'2','.',''),
			'create_date' 	=>	date('Y-m-d')
		);
		if($crud->insertRecord('client_policy', $client)) {
			echo "<script> alert('Client Policy Added Successfully..!'); window.location.href = 'clientPolicyView.php'; </script>";
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

    function getPlan(str) {
    	if(str.length == 0) {
    		document.getElementById('plan').innerHTML = "";
    		return;
    	} else {
    		var xmlhttp = new XMLHttpRequest();
    		xmlhttp.onreadystatechange = function() {
    			if(this.readyState == 4 && this.status == 200) {
    				document.getElementById('plan').innerHTML = this.responseText;
    			}
    		};
    		xmlhttp.open('GET', 'getaPlan.php?policy='+str, true);
    		xmlhttp.send();
    	}
    }

    $(document).ready(function() {
    	$("#marryDate").prop("disabled", true);
	    
	    $("#getInput").change(function() {
	    	var abc = $(this).children("option:selected").val();
	    	if(abc == 'Married') {
	    		$("#marryDate").prop("disabled", false);
	    	} else {
	    		$("#marryDate").prop("disabled", true);
	    	}
	    });
    });
</script>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- Add Client Policy -:-</h4>
							<a href="policyPlanView.php" class="btn btn-warning"> View Client Policy </a>
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
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Gender :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" required="required" name="gender">
										<option value="" selected disabled="disabled"> Select Gender </option>
										<option value="Male"> Male </option>
										<option value="Female"> Female </option>
									</select>
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Category :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" required="required" name="category">
										<option value="" selected disabled="disabled"> Select Category </option>
										<option value="General"> General </option>
										<option value="OBC"> OBC </option>
										<option value="SC"> SC </option>
										<option value="ST"> ST </option>
									</select>
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
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Marital Status :</label>
								<div class="col-sm-4 col-md-4 col-xs-12">
									<select name="marital" class="form-control" id="getInput">
										<option value="" selected disabled="disabled"> Select Marital Status </option>
										<option value="Married"> Married </option>
										<option value="Un-Married"> Un-Married </option>
									</select>
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Marriage Anniversary :</label>
								<div class="col-sm-4 col-md-4 col-xs-12">
									<input type="date" name="marriage_date" class="form-control" id="marryDate">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> LIC Policy :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" name="licPolicy" onchange="getPlan(this.value)">
										<option value="" selected disabled="disabled"> Select LIC Policy </option>
									<?php
										$num = 1;
										$myData = $crud->selectRecord('lic_policy');
										foreach ($myData as $data) {
									?>
										<option value="<?php echo $data['id']; ?>"><?php echo $data['lic_policy']; ?></option>
									<?php $num++; } ?>
									</select>
								</div>
								<div id="plan">
									<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Plan :</label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<select class="form-control" name="policyPlan" disabled="disabled">
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Pay Term :</label>
								<div class="col-sm-4 col-md-4 col-xs-12">
									<select name="pay_term" class="form-control" id="getInput">
										<option value="" selected disabled="disabled"> Select Pay Term </option>
										<option value="1 Month"> 1 Month </option>
										<option value="3 Month"> 3 Month </option>
										<option value="6 Month"> 6 Month </option>
										<option value="9 Month"> 9 Month </option>
										<option value="1 Year"> 1 Year </option>
									</select>
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Amount To Be Paid :</label>
								<div class="col-sm-4 col-md-4 col-xs-12">
									<input type="text" name="tobepaid" class="form-control" placeholder="Policy Amount To Be Paid..!">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Description :</label>
								<div class="col-sm-10 col-md-10 col-xs-12">
									<textarea class="form-control" name="description" placeholder="Any Other Information, If Any..!" rows="3"></textarea>
								</div>
							</div>


							<div class="form-group">
								<div class="col-md-offset-11 col-sm-offset-11 col-xs-offset-10">
									<input type="submit" name="cli_submit" value="Submit" class="btn btn-primary">
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