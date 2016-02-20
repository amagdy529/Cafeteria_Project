<?php
include_once 'database/DataBase_Class.php';
$dt1=$_GET['dt1'];
$dt2=$_GET['dt2'];
$nm=$_GET['name'];
$arr['customer_name']=$nm;
$con = db::getInstance();
$con->setTable("customers") ;
$ret=$con->select($arr);
while($id = mysqli_fetch_assoc($ret)){
$sen['order_customer_id']=$id['customer_id'];
				$conobj = db::getInstance();
				$conobj->setTable("orders") ;
				$res = $conobj->select_date("order_date",$dt1,$dt2,$sen);
while($qrow = mysqli_fetch_assoc($res)){
$rt[$qrow['order_id']]=array("date"=>$qrow['order_date'],"status"=>$qrow['order_status'],"amount"=>$qrow['order_amount']);
}
}

echo json_encode($rt);
?>
