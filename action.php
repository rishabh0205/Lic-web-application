<?php
	
	include_once 'dataBase/db.php';
	date_default_timezone_set('Asia/Kolkata');

	class CrudFunction extends dataBase
	{

	// Insert Data Function 
		public function insertRecord($table, $fields)
		{
			$sql = "";
			$sql .= "INSERT INTO ".$table;
			$sql .= "(". implode(", ", array_keys($fields)).") VALUES ";
			$sql .= "('". implode("', '", array_values($fields))."')";

			$insert = $this->conn->query($sql);
			if($insert) {

				return true;
			}
		}


	// Delete Data Function 
		public function deleteRecord($table, $where) {

			$sql = '';
			$condition = '';
			foreach ($where as $key => $value) 
			{
				$condition .= $key .'="'.$value.'" AND ';
			}
			$condition = substr($condition, 0, -5);
			$sql = "DELETE FROM ".$table." WHERE ".$condition;
			if($this->conn->query($sql))
			{
				return true;
			}
		}


	// All Type Select Data Function 
		public function selectRecord($table) {

			$sql = "SELECT * FROM ".$table;
			$array = array();
			$query = $this->conn->query($sql);
			while($res_policy = $query->fetch_assoc()) {
				$array[] = $res_policy;
			}
			return $array;
		}
		public function selectByDate($table, $colmName, $dateFrom, $dateTo) {

			$sql = "SELECT * FROM ".$table." WHERE ";
			$sql .= $colmName." BETWEEN '".$dateFrom."' AND '".$dateTo."'";
			$array = array();
			$query = $this->conn->query($sql);
			while($res_policy = $query->fetch_assoc()) {
				$array[] = $res_policy;
			}
			return $array;
			//echo $sql;
		}
		public function selectByPolicy($table, $colmName, $condition) {

			$sql = "SELECT * FROM ".$table." WHERE ";
			$sql .= $colmName." = '".$condition."'";
			$array = array();
			$query = $this->conn->query($sql);
			while($res_plan = $query->fetch_assoc()) {
				$array[] = $res_plan;
			}
			return $array;
			//echo $sql;
		}
		public function selectWhere($table, $colName, $data) {

			$sql = "SELECT * FROM ".$table." WHERE ";
			$sql .= $colName." = '".$data."'";
			$array = array();
			$rs_data = $this->conn->query($sql);
			while($res_data = $rs_data->fetch_assoc()) {
				$array[] = $res_data;
			}
			return $array;
		}

	}

	$crud = new CrudFunction;

?>