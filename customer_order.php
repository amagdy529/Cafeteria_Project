<?php
include_once 'database/DataBase_Class.php';
$customerid=$_GET['id'];
$dt1=$_GET['dt1'];
$dt2=$_GET['dt2'];
				$conobj = db::getInstance();
				$conobj->setTable("orders") ;
				$arr['order_customer_id']=$customerid;
if(empty($dt1) || empty($dt2)){
				$res = $conobj->select($arr);
	while($qrow = mysqli_fetch_assoc($res)){
	$ret[$qrow['order_id']]=array("date"=>$qrow['order_date'],"amount"=>$qrow['order_amount']);
}
}else{
	
	$res = $conobj->select_date("order_date",$dt1,$dt2,$arr);
	while($qrow = mysqli_fetch_assoc($res)){
	$ret[$qrow['order_id']]=array("date"=>$qrow['order_date'],"amount"=>$qrow['order_amount']);
	}
}
	
echo json_encode($ret);
?>
