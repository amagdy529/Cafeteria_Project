<?php


require('database/DataBase_Class.php'); 

$tableName="customers";

$db = new db();
$db->getConnection();
$db->setTable($tableName);

$name 		=$_POST["fname"];
$email		=$_POST["email"];
$password	=$_POST["password"];
$roomNo		=$_POST["roomNo"];
$ext		=$_POST["ext"];
$imageName  = $_FILES['filename']['name'];

$custArr = array('name' => $name,
					'email'	=>$email,
					'password'=>$password,
					'roomNo'=>$roomNo,
					'ext'=>$ext,
					'imageName'=>$imageName);

$db->insert($custArr);




?>