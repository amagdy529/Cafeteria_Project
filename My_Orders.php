<!DOCTYPE html>
<?php
session_start(); 
if(!isset($_SESSION['name']) || empty($_SESSION['name'])) {header('Location: login.php');}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>My_Orders</title>
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

                <div class="nav navbar-nav navbar-right" >
                <img class="  img-circle" width="90" height="90" 
                src="img/user.png"  alt="profile pic" 
                style="text-align:left; " 
                class="img-circle">
          
                <div class="nav navbar-nav navbar-right"><a href="#" >
                <h4 style="margin:10px; margin-top:40px" id="uname"><?php echo $_SESSION['name']; ?></h4> </a></div>
                </div>

			     </div> <!-- end div navbar  -->

<!-- - - -  end navbar - - - - - - -->



		<div class="row" style="margin-top:25px;">

				<div class="panel panel-info">
				<div class="panel-heading" >My orders</div>
				  <div class="panel-body">
 <div class= "row" style="text-align:right ; margin-right:8px;" >
  <div class="form-group col-sm-4" >
            <div class='input-group date'  data-provide="datepicker" >
                from <input type='date' placeholder="yyyy-mm-dd" id="datepicker1" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
 <div class="form-group col-sm-4" >
            <div class='input-group date'  data-provide="datepicker" >
               to <input type='date'  placeholder="yyyy-mm-dd"  id='datepicker2' />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
<button onclick="searchdate()" class="btn btn-default">search</button>
</div>



				  <!--    <div class= "row" style="text-align:right ; margin-right:8px;" > -->
				
<table class="table table-striped" id="tablebody">

  
</table>                                            
<div id="extend">
</div>
<div id="totalprice">
</div>
         	  <!--  </div>-->		 <!-- row 1 (row with search ) --> 					
				
				    	
				  </div> <!-- end body -->


				 
				</div>
<nav>
  <ul class="pagination">
	<?php 
	include_once 'database/DataBase_Class.php';
$arr['customer_name']=$_SESSION['name'];
$con = db::getInstance();
$con->setTable("customers") ;
$ret=$con->select($arr);
while($id = mysqli_fetch_assoc($ret)){

$conobj = db::getInstance();
$conobj->setTable("orders") ;
$res = $conobj->count("order_customer_id",$id['customer_id']);
while($row = mysqli_fetch_array($res)){
$rec_count = $row[0];
$limit = ceil($rec_count/4);
if($rec_count > 0){
for($i=1;$i<=$rec_count;$i++){
echo "<li class=active><a href='My_Orders.php?page=".$i."' >".$i." <span class=sr-only>(current)</span></a></li>";
}
}
}

}

	?>
  </ul>
</nav>
  			
	</div>
<script>

$(function(){
	/*$(function () {
                $('#datepicker1').datetimepicker();
            });
	$(function () {
                $('#datepicker2').datetimepicker();
            });	*/
	//search vlaues
	var dt1 = document.getElementById("datepicker1").value;
	var dt2 = document.getElementById("datepicker2").value;
	//check if they are null
	if(dt1=="" && dt2==""){
		$(function(){
			function sendForecastReq(){
			var uu = $('#uname').text();
				$.ajax({
					url:"order_serv_all.php",
					method:'get',
					data:{
						"name":uu,
						"page": <?php if(!empty($_GET['page'])){
							 echo $_GET['page'];
							}else{
							echo "''";
							} ?>
						
					},
					success:function(parser){
						var bd = document.getElementById('tablebody');
//header of table
$('#tablebody').html("<tr><th>Order Date</th><th>Status</th><th>Amount</th><th>Action</th></tr>");
var price =0; 
$('#totalprice').text("");
//rows of table if they are in processing or not
						for(var key in parser){
console.log(parser);
if(parser[key].status == "processing"){
$('#tablebody').append('<tr id=tr'+key+'><td>'+parser[key].date+'<button onclick=extend('+key+') id=btn'+key+'  >extend</button></td><td>'+parser[key].status+'</td><td>'+parser[key].amount+'</td><td><?php echo "<form action=My_Orders.php method=post ><input type=submit value=delete /><input type=hidden name=del value='+key+' /></form>";?></td></tr>');
}
else{
$('#tablebody').append('<tr id=tr'+key+'><td>'+parser[key].date+'<button onclick=extend('+key+') id=btn'+key+' >extend</button></td><td>'+parser[key].status+'</td><td>'+parser[key].amount+'</td><td></td></tr>');
}
//append price of each order
price += parseInt(parser[key].amount);
		
						}
	$('#totalprice').text("Total    EGP "+price);
			
				
					},
					error:function(error){
					console.log(error);
					},
					complete:function(e){
						console.log("Complete ");
					},
					dataType:'json',
					async:true
					});
			}
			sendForecastReq();
		});
		//ajax function to retrieve data
		/*var url = "order_serv_all.php";
		var xhr = new XMLHttpRequest();
		function sendForecastReq(){
				xhr.open('get',url,true);
				xhr.send();	
			}
		$(function(){
		xhr.onreadystatechange = function(){
				if(xhr.readyState =='4' && xhr.status=='200'){
			
						var parser = JSON.parse(xhr.responseText);
						var bd = document.getElementById('tablebody');
//header of table
$('#tablebody').html("<tr><th>Order Date</th><th>Status</th><th>Amount</th><th>Action</th></tr>");
var price =0; 
$('#totalprice').text("");
//rows of table if they are in processing or not
						for(var key in parser){
if(parser[key].status == "processing"){
$('#tablebody').append('<tr id=tr'+key+'><td>'+parser[key].date+'<button onclick=extend('+key+') id=btn'+key+'  >extend</button></td><td>'+parser[key].status+'</td><td>'+parser[key].amount+'</td><td><?php echo "<form action=My_Orders.php method=post ><input type=submit value=delete /><input type=hidden name=del value='+key+' /></form>";?></td></tr>');
}
else{
$('#tablebody').append('<tr id=tr'+key+'><td>'+parser[key].date+'<button onclick=extend('+key+') id=btn'+key+' >extend</button></td><td>'+parser[key].status+'</td><td>'+parser[key].amount+'</td><td></td></tr>');
}
//append price of each order
price += parseInt(parser[key].amount);
		
						}
	$('#totalprice').text("Total    EGP "+price);
			
				}
			}
		});
		sendForecastReq();*/ 
	}
		
});
//search between two dates
function searchdate(){
	//values of input
	var dtt1 = document.getElementById("datepicker1").value;
	var dtt2 = document.getElementById("datepicker2").value;
	var uu = $('#uname').text();
	//ajax to retrieve data
		if(dtt1 != "" && dtt2 != ""){
			$(function(){
		function fetchorders(){
			$.ajax({
				url:"order_server_where.php",
				method:'get',
				data:{
					"dt1":dtt1,
					"dt2":dtt2,
					"name":uu
				},
				success:function(response){
					console.log(response);	
					//var bd = document.getElementById('tablebody');
//table header
$('#tablebody').html("<tr><th>Order Date</th><th>Status</th><th>Amount</th><th>Action</th></tr>");
var price =0; 
$('#totalprice').text("");
//table rows if they are in processing or not
						for(var key in response){
if(response[key].status == "processing"){
$('#tablebody').append('<tr id=tr'+key+'><td>'+response[key].date+'<button  onclick=extend('+key+') id=btn'+key+' >extend</button></td><td>'+response[key].status+'</td><td>'+response[key].amount+'</td><td><?php echo "<form action=My_Orders.php method=post ><input type=submit value=delete /><input type=hidden name=del value='+key+' /></form>";?></td></tr>');
}
else{
$('#tablebody').append('<tr id=tr'+key+'><td>'+response[key].date+'<button onclick=extend('+key+') id=btn'+key+' >extend</button></td><td>'+response[key].status+'</td><td>'+response[key].amount+'</td><td></td></tr>');
}
//append price of each order
price += parseInt(response[key].amount);							
						}
$('#totalprice').text("Total    EGP "+price);
				},
				error:function(error){
					console.log(error);
				},
				complete:function(e){
					console.log("Complete ");
				},
				dataType:'json',
				async:true

			});
		}
		fetchorders();
	});
		}
	}

//back button
function back(key){

document.getElementById("btn"+key+"").innerHTML="extend";
document.getElementById("btn"+key+"").setAttribute("onclick","extend("+key+")");
$("#tr"+key+"").next().remove();
}
//extend button
function extend(key){

document.getElementById("btn"+key+"").innerHTML="back";
document.getElementById("btn"+key+"").setAttribute("onclick","back("+key+")");
	$(function(){
		//ajax to retrieve the products of order
		function fetchproducts(){
			$.ajax({
				url:"order_server_products.php",
				method:'get',
				data:{
					"key":key
				},
				success:function(response){
					//console.log(response);	
						for(var kk in response){
				var product_name = response[kk].product;
				var quant = response[kk].quantity;
				$(function(){
					//ajax to retrieve the images of each product
					function showproducts(){
						$.ajax({
							url:"showproducts.php",
							method:'get',
							data:{
								"name":product_name
							},
							success:function(response){
	$("#tr"+key+"").after('<div class="row" style="margin-top:25px" id="dv'+key+'"></div>');	
									for(var kk in response){
	$("#dv"+key+"").append('<div><img class="img-rounded" src="'+response.img+'" width="100" height="100"><span class="badge">'+kk+' LE</span><h3>'+product_name+'</h3><p>'+quant+'</p></div>');
							
									}
							},
							error:function(error){
								console.log(error);
							},
							complete:function(e){
								console.log("Complete ");
							},
							dataType:'json',
							async:true

						});
					}
					showproducts();
				});	
						}
				},
				error:function(error){
					console.log(error);
				},
				complete:function(e){
					console.log("Complete ");
				},
				dataType:'json',
				async:true

			});
		}
		fetchproducts();
	});
}
</script>
</body>
</html>
<?php
//delete button for each row
$del= $_POST['del'];
if(isset($del)){
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("order_products") ;
				$dd['order_id']=$del;
				$res = $conobj->delete($dd);
				$conobj->setTable("orders") ;
				$res = $conobj->delete($dd);

}
?>
