<?php
include_once 'database/DataBase_Class.php';
$key=$_GET['key'];
				$conobj = db::getInstance();
				$conobj->setTable("order_products") ;
$arr['order_id']=$key;
				$res = $conobj->select($arr);
while($qrow = mysqli_fetch_assoc($res)){
$ret[$qrow['order_id']]=array("product"=>$qrow['product'],"quantity"=>$qrow['quantity']);
}
echo json_encode($ret);
?>
