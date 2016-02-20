<?php
include_once 'database/DataBase_Class.php';
$dt1 = $_GET['dt1'];
$dt2=$_GET['dt2'];
$us=$_GET['user'];

$conobj = db::getInstance();

if(empty($us)){
	if( empty($dt1) && empty($dt2)){
		$res = $conobj->select_all_orders();
		while($qrow = mysqli_fetch_assoc($res)){
			$con = db::getInstance();
			$name = $con->select_name($qrow['order_customer_id']);
			while($namerow = mysqli_fetch_assoc($name)){
				$ret[$qrow['order_customer_id']]=array("name"=>$namerow['customer_name'],"total"=>$qrow['total']);
			}
		}
		echo json_encode($ret);
	}
	else if(!empty($dt1) && !empty($dt2)){
		$conobj->setTable("orders") ;
		$res = $conobj->select_sum_col($dt1,$dt2);
		while($qrow = mysqli_fetch_assoc($res)){
			//$arr[$qrow['total']]=$qrow['total'];
			$con = db::getInstance();
			$name = $con->select_name($qrow['order_customer_id']);
			while($namerow = mysqli_fetch_assoc($name)){
				$ret[$qrow['order_customer_id']]=array("name"=>$namerow['customer_name'],"total"=>$qrow['total']);
				}
		}
echo json_encode($ret);
	}

}else{
	if( empty($dt1) && empty($dt2)){
		$res = $conobj->select_customerid($us);
		while($qrow = mysqli_fetch_assoc($res)){
			//$arr[$qrow['customer_id']] = $qrow['customer_id'];
			$con = db::getInstance();
			$name = $con->select_sum_wh("order_amount",$arr,"order_customer_id");
			while($namerow = mysqli_fetch_assoc($name)){
				$ret[$qrow['customer_id']]=array("nm"=>$us,"total"=>$namerow['total']);
			}
		}
		echo json_encode($ret);
	}
	else if(!empty($dt1) && !empty($dt2)){
		$res = $conobj->select_customerid($us);
		while($qrow = mysqli_fetch_assoc($res)){
			$con = db::getInstance();
			$con->setTable("orders") ;
			$arr['order_customer_id']=$qrow['customer_id'];
			$name = $con->select_sum("order_amount",$arr,"order_customer_id","order_date",$dt1,$dt2);
			while($namerow = mysqli_fetch_assoc($name)){
				$ret[$qrow['customer_id']]=array("nm"=>$us,"total"=>$namerow['total']);
			}
//$ret[$qrow['customer_id']]=$us
		}
		echo json_encode($ret);
	}

}
?>


					
		
