
<?php
	$title = 'Add Policy Plan | LIC Policy Management System';
	include_once 'action.php';
	include_once 'header.php';
	
	if(isset($_POST['plan_submit'])) {
		$plan = array(
			'lic_policy_id'	=>	$_POST['policy_id'],
			'policy_plan'	=>	ucwords($_POST['plan_name']),
			'entry_age'	=>	ucwords($_POST['entry_age']),
			'maximun_maturity_age'	=>	ucwords($_POST['maturity_age']),
			'policy_term'	=>	ucwords($_POST['policy_term']),
			'purchase_price'	=>	number_format((float)$_POST['premium_price'],'2','.',''),
			'minimun_sum_assured'	=>	number_format((float)$_POST['sum_assured'],'2','.',''),
			'medical_checkup'	=>	ucwords($_POST['medi_exam'])
		);
		if($crud->insertRecord('policy_plan', $plan)) {
			echo "<script> alert('Policy Plan Added Successfully..!'); window.location.href = 'policyPlanView.php'; </script>";
		} else {
			echo $this->conn->error;
		}
	}

	
	if(isset($_POST['submit_policy'])) {
		$policy = array(
			'lic_policy' => ucwords($_POST['policy_name'])
		);
		if ($crud->insertRecord('lic_policy', $policy)) {
			echo "<script> alert('LIC Policy Added Successfully..!'); window.location.href = 'policyPlanAdd.php'; </script>";
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

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					<div class="container-fluid">
						<div class="title">
							<h4>-:- Add Policy Plan -:-</h4>
							<a href="policyPlanView.php" class="btn btn-primary"> View Plan </a>&nbsp;&nbsp;&nbsp;
							<a href="#"  data-toggle="modal" data-target="#addPolicy" class="btn btn-warning"> Add LIC Policy </a>
						</div>
						<div class="clearfix"></div>

						<form role="form" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
							<div class="form-group"></div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> LIC Policy :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" required="required" name="policy_id">
										<option value="" selected disabled="disabled"> Select LIC Policy </option>
									<?php
										$myData = $crud->selectRecord('lic_policy');
										foreach ($myData as $data) {
									?>
										<option value="<?php echo $data['id']; ?>"><?php echo $data['lic_policy']; ?></option>
									<?php } ?>
									</select>
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Medical Examin :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select class="form-control" required="required" name="medi_exam">
										<option value="Yes"> Yes </option>
										<option value="No"> No </option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Plan :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="plan_name" class="form-control" placeholder="Policy Name..!">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Term :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="policy_term" class="form-control" placeholder="Policy Term..!">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Entry Age :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="entry_age" class="form-control" placeholder="Policy Entry Age..!">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Maturity Age </label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="maturity_age" class="form-control" placeholder="Policy Maturity Age..!">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Premium / Purchase Price :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="premium_price" class="form-control" placeholder="Premium / Purchase Price..!">
								</div>

								<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Minimum Sum Assured :</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" name="sum_assured" class="form-control" placeholder="Minimum Sum Assured..!">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-offset-11 col-sm-offset-11 col-xs-offset-10">
									<input type="submit" name="plan_submit" value="Submit" class="btn btn-primary">
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>



<div id="addPolicy" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    <!-- Modal content-->
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title"> Add LIC Plan -:- </h4>
	      	</div>
      		<div class="modal-body">
      			<form role="form" method="post" class="form-horizontal style-form" action="action.php">
      				<div class="form-group">
						<label class="col-md-offset-1 col-lg-offset-1 col-sm-offset-1 col-md-3 col-lg-3 col-sm-10 control-label"> Policy Name : </label>
						<div class="col-md-7 col-lg-7 col-sm-10">
							<input type="text" name="policy_name" class="form-control" placeholder="LIC Policy Name..!">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-10 col-xs-offset-10">
	                        <input type="submit" name="submit_policy" class="btn btn-primary" value="Submit">
	                    </div>
					</div>

      			</form>
      		</div>
    	</div>
  	</div>
</div>

<?php include_once 'footer.php'; ?>