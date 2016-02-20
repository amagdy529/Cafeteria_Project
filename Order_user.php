<?php
require 'database/DataBase_Class.php';
session_start(); 
if(!isset($_SESSION['name']) || empty($_SESSION['name'])) {header('Location: login.php');}
?>

<?php
        session_start();
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
			      
				<li ><a href="Order_user.php">Home |<span class="sr-only">(current)</span></a></li>
				<li><a href="My_orders.php">My Orders</a></li>
				
			    
				</ul>
					
					<table class="nav navbar-nav navbar-right">
						<tr>
							<td>
			<div class="nav navbar-nav navbar-right" >
			<img class="  img-circle" width="90" height="90" 
			src="img/user.png"  alt="profile pic" style="text-align:left" class="img-circle">
								
							</td>
							<td style="margin:25px">
								<div class="nav navbar-nav navbar-right"><a href="#" style="margin:20px
								 ;text-align:center"><h4> ahmed magdy</h4> </a></div>
								</div>
			
							</td>
						</tr>
					</table>
			     
			     </div> <!-- end div navbar  -->

                       <div class="row" style="margin-top:25px;">

				<div class="panel panel-info">
				<div class="panel-heading" >My orders</div>
				  <div class="panel-body">

				  <div class= "row" style="text-align:right ; margin-right:8px;" > 
						<form class="form-inline pull-xs-right " >
 						   <input class="form-control" type="text" placeholder="Search">
						   <button class="btn btn-success-outline" type="submit">Search</button>
						  </form>
				  </div>		 <!-- row 1 (row with search ) --> 					
				


            <div class=" col-md-3 panel panel-default"  id="create_order">
                <div class="panel panel-heading">

                    <h1>   Order  </h1>
                </div>
                <form method="post"  >
                    <div class="row panel-body" id="create_order_products">

                    </div>
                    <label  class="col-sm-2 control-label">Notes:</label>
                    <textarea class="form-control" rows="3" name='notes' id="notes"></textarea>
                    <label  class="col-sm-2 control-label">Rooms:</label>
                    <select name="room" id="room" class="form-control">
                        <?php
				$conobj = db::getInstance();
				$conobj->setTable("rooms") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
				echo "<option value=".$qrow['room_no'].">".$qrow['room_no']."</option>";
				}
			?>
                    </select>
                    <input type='submit' name='confirm' value='Confirm' class="btn btn-primary" ><br/>
                    <label id="total_price" name='total_price' class=" control-label">Total Price: 0</label>
                </form>
            </div>
            <div class="col-md-9 panel panel-default">
                <div class="row panel-body">

                    <div class="panel panel-heading panel panel-warning">

                        <h1> Last order</h1>
                    </div>

                    <?php
                    $conj  = db::getInstance();
		$conj->setTable('customers');
		$idcustomer= $conj->select_customerid($_SESSION['name']);
		while($qrow = mysqli_fetch_assoc($idcustomer)){
		$idc = $qrow['customer_id'];

		}
                    $obj_order = db::getInstance();
                    $obj_order->setTable('orders');
                  if (isset($idc))
                   {
		$arr['order_customer_id'] = $idc;
                  $last_order = $obj_order->select_last_row($arr);

                   if ($last_order) {
                       $order_id = $last_order['order_id'];
                        
                        $obj_order_product = db::getInstance();
                        $obj_order_product->setTable('order_products');
                       $order_products = $obj_order_product->select(array('order_id' => $order_id));
                        $i = 1;
                        while ($current_product = $order_products->fetch_assoc()) {
                            ?>
                            <div class="col-md-3">
                                <?php
                                ?>
                                <div class="row">
                                    <?php
                                    echo "quantity: " . $current_product['quantity'];
                                    ?>
                                </div>
                                <div class="row">
                                    <?php
                                    echo " order amount: " . $last_order['order_amount'];
                                    ?>
                                </div>
                                <?php
                                $obj_product_info = db::getInstance();
                                $obj_product_info->setTable('products');
                                $product_info_array = $obj_product_info->select(array('product_id' => $current_product['product']));
                                $product_info = $product_info_array->fetch_assoc();
                                ?>
                                <div class="row">
                                    <?php
                                    echo " Name: " . $current_product['product'];
                                    ?>
                                </div>
                                <div class="row">
          <img src="<?php echo "../img/product/" . $product_info['product_image']; ?>" class="img-responsive img-circle"  width="80px" height="80px">
                                </div>
                            </div>

                            <?php
                            $i = $i + 1;
                        }
                   } else {
                       echo "NO Orders!!";
                 }
 }
                    ?>
                </div>
                <div class="row">
                    <div class="row panel-body">

                        <div class="panel panel-heading panel panel-warning">

                            <h1>Menu</h1>
                        </div>
                        <div class="row">

                        <?php
                        
                        $obj_product = db::getInstance();
                        $obj_product->setTable('products');
                        $products = $obj_product->select_all();
                        
                        if ($products->num_rows > 0)  {
                            $j = 1;
                            while ($row = $products->fetch_assoc()) {
                                ?>
                                <div class="col-md-3">
                   <img src="<?php echo "../img/product/" . $row['product_image']; ?>" width="100px" height="100px" class="img-responsive img-circle"
                     onclick="add_product('<?php echo $row['product_name']; ?>',<?php echo $row['product_id']; ?>,<?php echo $row['product_price']; ?>)">
                                    <div class="row col-lg-offset-2 badge "> <?php echo $row['product_price']; ?> .LE</div>
                                </div>
                                <?php
                                $j = $j + 1;
                            }
                        } else {
                            echo "NO Products!!";
                        }
                        ?>
                    </div>
                        </div>
                </div>
            </div>

        </div>
<?php
$notes=$_POST['notes'];
	$total_price=$_POST['total_price'];
   if(isset($_POST['confirm']))
{
		
        
	
        $obj_order = db::getInstance();
        $obj_order->setTable('orders');
$arr['order_date']= date("Y-m-d");
$arr['order_status']="processing";
$arr['order_amount']=$total_price;
$arr['order_notes']=$notes;
$arr['order_customer_id']=$id['customer_id'];
$af_row = $obj_order->insert($arr);
echo $af_row;
}
?>
        <script>
            var products_id = [];
            
            function add_product(product_name, product_id, product_price) {
               
                if (products_id.indexOf(product_id) === -1) {
                    products_id.push(product_id);
                    var elem_order = document.getElementById("create_order_products");
                    var elem_product = document.createElement("div");
                    elem_product.setAttribute("id", product_id);
                    elem_product.setAttribute("class", "product");
                    var elem_product_name = document.createElement("label");
                    elem_product_name.setAttribute("class", " control-label");
                    elem_product_name.innerHTML = "  Name: " + product_name;
                    var elem_product_amount = document.createElement("input");
                    elem_product_amount.setAttribute("class", "form-control");
                    elem_product_amount.setAttribute("type", "number");
                    elem_product_amount.setAttribute("name", "amount");
                    elem_product_amount.setAttribute("value", "1");
                    elem_product_amount.setAttribute("min", "1");
		    elem_product_amount.readOnly=true;
                    elem_product_amount.setAttribute("onclick", "add_amount(" + product_id + "," +  product_price + ")");
                    var elem_product_price = document.createElement("label");
                    elem_product_price.setAttribute("class", " control-label");
                    elem_product_price.innerHTML = "  Price: " +  product_price;
                    var cancel_btn = document.createElement("button");
                    cancel_btn.innerHTML = "x";
                    cancel_btn.setAttribute("class", "btn btn-danger pull-right ");
                    cancel_btn.setAttribute("onclick", "cancel(" + product_id + ")");
                    elem_product.appendChild(elem_product_name);
                    elem_product.appendChild(cancel_btn);
                    elem_product.appendChild(elem_product_amount);
                    elem_product.appendChild(elem_product_price);
                    elem_order.appendChild(elem_product);
                } else {
                    var elem_exists_product = document.getElementById(product_id);
                    var value = elem_exists_product.childNodes[2].value;
                    value = parseInt(value) + 1;
                    elem_exists_product.childNodes[2].setAttribute("value", value);
                    var new_price =  product_price * value;
                    elem_exists_product.childNodes[3].innerHTML = "  Price: " + new_price;
                }
                
                var total_price = 0;
                var products = document.getElementsByClassName("product");
                for (var i = 0; i < products.length; i++) {
                    total_price += parseInt(products[i].childNodes[3].innerHTML.split(" ")[3]);
                }
                var elem_order_price = document.getElementById("total_price");
                elem_order_price.innerHTML = "Total Price: " + total_price;
              }
           
            function add_amount( product_id, product_price) {
                var elem_exists_product = document.getElementById(product_id);
                var value = elem_exists_product.childNodes[2].value;
                value = parseInt(value);
                if (value < 1) {
                    value = 1;
                    elem_exists_product.childNodes[2].setAttribute("value", value);
                }
                var new_price = price * value;
                elem_exists_product.childNodes[3].innerHTML = "  Price: " + new_price;
                var total_price = 0;
                var products = document.getElementsByClassName("product");
                for (var i = 0; i < products.length; i++) {
                    total_price += parseInt(products[i].childNodes[3].innerHTML.split(" ")[3]);
                }
                var elem_order_price = document.getElementById("total_price");
                elem_order_price.innerHTML = "Total Price: " + total_price;
            }
           
            function cancel( product_id, product_price) {
                var elem_exists_product = document.getElementById(product_id);
                elem_exists_product.remove();
                var index = products_id.indexOf( product_id)
                if (index > -1) {
                    products_id.splice(index, 1);
                }
                var total_price = 0;
                var products = document.getElementsByClassName("product");
                for (var i = 0; i < products.length; i++) {
                    total_price += parseInt(products[i].childNodes[3].innerHTML.split(" ")[3]);
                }
                var elem_order_price = document.getElementById("total_price");
                elem_order_price.innerHTML = "Total Price: " + total_price;
            }
        </script>



    </body>
</html>
