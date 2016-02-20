<!DOCTYPE html>
<?php
session_start(); 
if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {header('Location: login.php');}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>order_user</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/code.js"></script>
</head>
<body>
<div class="container">
			<!--  Nav Bar -->
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			      </button>

			    </div>
		
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
				
			      	<li><a class=" nav navbar-nav navbar-left" href="#"><img alt="Brand" src="logo.png"></a></li>
			      
				<li ><a href="adminhome.php">Home |<span class="sr-only">(current)</span></a></li>
				<li><a href="allproducts.php">Products</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="Order_admin.php">Manual order</a></li>
				<li><a href="checks.php">Checks</a></li>
				
			    
				</ul>
					
					<table class="nav navbar-nav navbar-right">
						<tr>
							<td>
					<div class="nav navbar-nav navbar-right" >
<img class="  img-circle" width="90" height="90" src="img/user.png"  alt="profile pic" style="text-align:left" class="imgcircle">	
							</td>
							<td style="margin:25px">
								<div class="nav navbar-nav navbar-right"><a href="#" style="margin:20px
								 ;text-align:center"><h4><?php echo $_SESSION['admin'] ?></h4> </a></div>
								</div>
			
							</td>
						</tr>
					</table>
			     
			     </div> <!-- end div navbar  -->

<!-- - - -  end navbar - - - - - - -->



		<div class="row" style="margin-top:25px;">

				<div class="panel panel-info">
				<div class="panel-heading" >Orders</div>
				</div>
			
			</div>	
			</div>
		</div>
		<?php
		include_once 'database/DataBase_Class.php';
		$conobj = db::getInstance();
		$conobj->setTable("orders");
		$stat['order_status']= "processing";
		$res = $conobj->select($stat);
		while($qrow = mysqli_fetch_assoc($res)){
		echo "<table class='table table-striped'><tr><th>order date</th><th>name</th><th>room</th><th>ext</th><th>action</th></tr><tr><td>".$qrow['order_date']."</td>";
			$con = db::getInstance();
			$conobj->setTable("customers");
			$arr['customer_id']=$qrow['order_customer_id'];
			$ret=$con->select($arr);
			while($name = mysqli_fetch_assoc($ret)){
			echo "<td>".$name['customer_name']."</td><td>".$name['room_no']."</td><td>".$name['EXT']."</td><td><form method=post action=adminhome.php ><button type=submit name=deliver value=".$qrow['order_id']." >deliver</button></form></td></tr></table><div class=row style='margin-top:25px'>";
				$fin = db::getInstance();
				$fin->setTable("order_products");
				$ord['order_id']=$qrow['order_id'];
				$back = $fin->select($ord);
				while($prod = mysqli_fetch_assoc($back)){
					$im = db::getInstance();
					$im->setTable("products");
					$image['product_name']=$prod['product'];
					$sh = $im->select($image);
					while($pic = mysqli_fetch_assoc($sh)){
			echo "<div><img class='img-rounded' src='".$pic['product_image']."' width='100' height='100'><span class='badge'>".$pic['product_price']." LE</span><h3>".$pic['product_name']."</h3><p>".$prod['quantity']."</p></div>";
					}
				}
			echo "</div><p>total EGP : ".$qrow['order_amount']."</p>";
			}
		}
		?>
  	 
</div>
</body>
</html>

<?php
$dv = $_POST['deliver'];
if(isset($dv)){
	if(!empty($dv)){
		include_once 'database/DataBase_Class.php';
		$conobj = db::getInstance();
		$conobj->setTable("orders");
		$stat['order_status']= "processing";
		$stat['order_id']=$dv;
		$nstat['order_status']= "done";
		$res = $conobj->update($stat,$nstat);
		header('Location:adminhome.php ');
	}
}
?>
