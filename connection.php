<?php

	class connection{
		private $servername = "localhost";
		private $username = "khaled";
		private $password = "iti";
		private $dbname = "cafeteria";
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		public function __construct($sql){
			if($asd=$conn->query($sql)){
				while($qrow = mysqli_fetch_assoc($asd)){
					echo $qrow['room_no'];
				}	
			}
		
   		}
	} 
$sql="SELECT room_no FROM rooms";
$asd  = new connection($sql);
?>
