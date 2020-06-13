<?php

	class dataBase {

		protected $host = 'localhost';
		protected $user = 'root';
		protected $pass = '';
		protected $db = 'lic_india';

		public $conn;

		public function __construct () {

			$this->conn = new mysqli ($this->host, $this->user, $this->pass, $this->db);
			/*if ($this->conn) {

				echo 'Connected';
			} else {

				echo $this->conn->error;
			}*/
		}
	}

	$obj = new dataBase;
?>