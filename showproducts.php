<?php
include_once 'database/DataBase_Class.php';
$nm=$_GET['name'];
				$conobj = db::getInstance();
				$conobj->setTable("products") ;
$arr['product_name']=$nm;
				$res = $conobj->select($arr);
while($qrow = mysqli_fetch_assoc($res)){
$ret[$qrow['product_price']]=array("img"=>$qrow['product_image']);
}
echo json_encode($ret);
?>
