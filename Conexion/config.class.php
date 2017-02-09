<?php
	class conf_class{
		var $hostdb;
		var $userdb;
		var $passdb;
		var $db;

		function conf_class(){
			$this->hostdb="localhost";
			$this->userdb="root";
			$this->passdb="";
			$this->db="sustituciones";
		}

		public function getHostdb(){
			return $this->hostdb;
		}
		
		public function getUserdb(){
			return $this->userdb;
		}

		public function getPassdb(){
			return $this->passdb;
		}

		public function getDb(){
			return $this->db;
		}
	}
	
?>