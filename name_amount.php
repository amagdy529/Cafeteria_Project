<?php
include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
$res = $conobj->select_all_orders();
while($qrow = mysqli_fetch_assoc($res)){
$con = db::getInstance();
$name = $con->select_name($qrow['order_customer_id']);
	while($namerow = mysqli_fetch_assoc($name)){
$ret[$qrow['order_customer_id']]=array("name"=>$namerow['customer_name'],"total"=>$qrow['total']);
	}
}
echo json_encode($ret);
?>


					
		
