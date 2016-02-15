<?php

/*
require('database/DataBase_Class.php'); 

$tableName="customers";

$db = new db();
$db = db::getinstance();
$db->getConnection();

$db->setTable($tableName);

*/


$name 		=$_POST["fname"];
$email		=$_POST["email"];
$password	=$_POST["password"];
$roomNo		=$_POST["roomNo"];
$ext		=$_POST["ext"];
$imageName  =$_FILES['filename']['name'];
$submit     =$_POST["save_btn"];

/*
$custArr = array('name' => $name,
					'email'	=>$email,
					'password'=>$password,
					'roomNo'=>$roomNo,
					'ext'=>$ext,
					'imageName'=>$imageName);

$db->insert($custArr);

*/


if($submit){
$con=@mysql_connect("localhost","khaled","iti","cafeteria");

$db= mysql_select_db("cafeteria",$con);

if($con){
	echo "connected";
}
//$query ="insert into emp values('ahmed','adel')";
$query = "INSERT INTO customers VALUES ('', '$email' ,'$password','$roomNo','$name','$imageName','$ext')";
mysql_query($query,$con);

if ($query){
echo "you added data successfully";
}

mysql_close($con);

}

?>