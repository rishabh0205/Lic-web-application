<?php 
	include_once 'action.php';
	$sql = $_GET['policy'];
	$res_data = $crud->selectWhere('policy_plan', 'lic_policy_id', $sql);
?>

	<label class="col-md-2 col-sm-2 col-xs-12 label-control"> Policy Plan :</label>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<select class="form-control" name="policyPlan" required="required">
			<option value="" selected disabled="disabled"> Select Policy Plan </option>
		<?php foreach($res_data as $data) { ?>
			<option value="<?php echo $data['id']; ?>"> <?php echo $data['policy_plan']; ?> </option>
		<?php } ?>
		</select>
	</div>
	