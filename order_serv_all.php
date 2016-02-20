<?php
include_once 'database/DataBase_Class.php';
$page= $_GET['page'];
if($page=="n" || $page=="1"){
$offset=0;
}else{
$offset=($page*4)-4;
}
$nm=$_GET['name'];
$arr['customer_name']=$nm;
$con = db::getInstance();
$con->setTable("customers") ;
$ret=$con->select($arr);
while($id = mysqli_fetch_assoc($ret)){
$sen['order_customer_id']=$id['customer_id'];
				$conobj = db::getInstance();
				$conobj->setTable("orders") ;
				$res = $conobj->select_limit($sen,$offset,4);
while($qrow = mysqli_fetch_assoc($res)){
$rt[$qrow['order_id']]=array("date"=>$qrow['order_date'],"status"=>$qrow['order_status'],"amount"=>$qrow['order_amount']);
}
}

echo json_encode($rt);
?>
