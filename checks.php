<!DOCTYPE html>
<?php
session_start(); 
if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {header('Location: login.php');}
?>
<html>
	<head>
		<meta charset="UTF-8">
	<title>checks</title>
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
             		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
			data-target="#bs-example-navbar-	collapse-1" aria-expanded="false">
               		 <span class="sr-only">Toggle navigation</span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
            		  </button> 
           	 </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
               	<li ><a href="adminhome.php">Home |<span class="sr-only">(current)</span></a></li>
				<li><a href="allproducts.php">Products</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="Order_admin.php">Manual order</a></li>
				<li><a href="checks.php">Checks</a></li>
             <li><a class=" nav navbar-nav navbar-right" href="#">Admin
                <img alt="Brand" src="logo.png">
              </a></li>
                </ul>
                  </div>

		<div class="row" style="margin-top:15px;">
        	<div class="col-sm-12">
            	<div class="panel panel-info">
                  <div class="panel-heading">
                    <h1 class="panel-title">checks</h1>
                  </div>
		<br/>

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
			
			<div class="form-group ">
                        <label for="Room no"> user </label>
			
		              <select class="form-control" id="username">
				<option value=""></option>
		                   <?php
					include_once 'database/DataBase_Class.php';
					$conobj = db::getInstance();
					$conobj->setTable("customers") ;
					$res = $conobj->select_all();
					while($qrow = mysqli_fetch_assoc($res)){
					echo "<option value=".$qrow['customer_name'].">".$qrow['customer_name']."</option>";
					}
				?>
		              </select>
                      </div>
		<table class="table table-striped" id="tablebody">
		<tr><td>Name</td><td>total amount</td></tr>
  		</table> 

</div>


</div>
<script>

	window.onload = function(){
		//search vlaues
		var dt1 = document.getElementById("datepicker1").value;
		var dt2 = document.getElementById("datepicker2").value;
		//check user
		var us = document.getElementById("username").value;
		//header of table
		//$('#tablebody').html("<tr><th>Name</th><th>total amount</th></tr>");
console.log("entered");
		if(us == ""){
console.log("1");
			//check dates
			if(dt1 == "" && dt2 == ""){
				console.log("2");
				var url = "name_amount.php";
				var xhr = new XMLHttpRequest();
				function nameamount(){
								xhr.open('get',url,true);
								xhr.send();	
							}
				$(function(){
				console.log("in");
				xhr.onreadystatechange = function(){
				if(xhr.readyState =='4' && xhr.status=='200'){
				var response = JSON.parse(xhr.responseText);
				console.log(response);
				for(var key in response){
				$('#tablebody').append('<tr id=tr'+key+'><td><button onclick=collap('+key+') id=btn'+key+' >extend</button>'+response[key].name+'</td><td>'+response[key].total+'</td></tr>');
				}
				}
				}
				nameamount();
				});
			}
		//}else{
		
		}
	}
//extend button
function collap(customerid){
	console.log("entered");
	document.getElementById("btn"+customerid+"").innerHTML="back";
	document.getElementById("btn"+customerid+"").setAttribute("onclick","back("+customerid+")");
		$(function(){
			//each order
			function fetcheachorder(){
				$.ajax({
					url: "customer_order.php",
					method:"get",
					data:{
						"id":customerid,
						"dt1":"",
						"dt2":""
						},
					success:function(response){
	console.log(response);
	$("#tr"+customerid+"").after('<table class="table table-striped" id="tb'+customerid+'"><tr><th>order date</th><th>amount</th></tr></table>');
	for(var key in response){
	$("#tb"+customerid+"").append('<tr id=tr'+key+'><td><button onclick=expand('+key+') id=btn'+key+' >expand</button>'+response[key].date+'</td><td>'+response[key].amount+'</td></tr>');
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
			fetcheachorder();
		});
}
//back button
function back(customerid){

document.getElementById("btn"+customerid+"").innerHTML="extend";
document.getElementById("btn"+customerid+"").setAttribute("onclick","collap("+customerid+")");
$("#tr"+customerid+"").next().remove();
}

//expand button
function expand(orderid){
document.getElementById("btn"+orderid+"").innerHTML="return";
document.getElementById("btn"+orderid+"").setAttribute("onclick","ret("+orderid+")");
$(function(){
		//ajax to retrieve the products of order
		function fetchproducts(){
			$.ajax({
				url:"order_server_products.php",
				method:'get',
				data:{
					"key":orderid
				},
				success:function(response){
					console.log(response);	
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
	$("#tr"+orderid+"").after('<div  style="margin-top:25px" id="dv'+orderid+'"></div>');	
									for(var kk in response){
	$("#dv"+orderid+"").append('<div><img class="img-rounded" src="'+response.img+'" width="100" height="100"><span class="badge">'+kk+' LE</span><h3>'+product_name+'</h3><p>'+quant+'</p></div>');
							
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

//return button
function ret(orderid){
document.getElementById("btn"+orderid+"").innerHTML="expand";
document.getElementById("btn"+orderid+"").setAttribute("onclick","expand("+orderid+")");
$("#tr"+orderid+"").next().remove();
}

//search accord to date
function searchdate(){
console.log("inbtn");
		var dt1 = document.getElementById("datepicker1").value;
		var dt2 = document.getElementById("datepicker2").value;
		//check user
		var us = document.getElementById("username").value;
if(us == ""){
console.log("inus");
	if(dt1 == "" && dt2 == ""){
console.log("indt");

$(function(){

		function orderofusers(){
			$.ajax({
				url:"user_amount_date.php",
				method:'get',
				data:{
					"dt1":"",
					"dt2":"",
					"user":""
				},
				success:function(response){
				$('#tablebody').html("<tr><td>Name</td><td>total amount</td></tr>");
				for(var key in response){
console.log(response);
		$('#tablebody').append('<tr id=tr'+key+'><td><button onclick=collap('+key+') id=btn'+key+' >extend</button>'+response[key].name+'</td><td>'+response[key].total+'</td></tr>');
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
		orderofusers();
	});


	}else if(dt1 != "" || dt2 != ""){
console.log("infn");
	$(function(){

		function orderofusers(){
			$.ajax({
				url:"user_amount_date.php",
				method:'get',
				data:{
					"dt1":dt1,
					"dt2":dt2,
					"user":us
				},
				success:function(response){
$('#tablebody').html("<tr><td>Name</td><td>total amount</td></tr>");
				for(var key in response){
		$('#tablebody').append('<tr id=tr'+key+'><td><button onclick=collapdt('+key+') id=btn'+key+' >extend</button>'+response[key].name+'</td><td>'+response[key].total+'</td></tr>');
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
		orderofusers();
	});
	}
}else{
	if(dt1 == "" && dt2 == ""){
		$(function(){
		function spicusers(){
			$.ajax({
				url:"user_amount_date.php",
				method:'get',
				data:{
					"dt1":"",
					"dt2":"",
					"user":us
				},
				success:function(response){

$('#tablebody').html("<tr><td>Name</td><td>total amount</td></tr>");
				for(var key in response){
		$('#tablebody').append('<tr id=tr'+key+'><td><button onclick=collap('+key+') id=btn'+key+' >extend</button>'+response[key].nm+'</td><td>'+response[key].total+'</td></tr>');
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
		spicusers();
	});
	}else if(dt1 != "" && dt2 != ""){
		$(function(){
		function spicuserdt(){
			$.ajax({
				url:"user_amount_date.php",
				method:'get',
				data:{
					"dt1":dt1,
					"dt2":dt2,
					"user":us
				},
				success:function(response){
//console.log(response);
$('#tablebody').html("<tr><td>Name</td><td>total amount</td></tr>");
				for(var key in response){
		$('#tablebody').append('<tr id=tr'+key+'><td><button onclick=collap('+key+') id=btn'+key+' >extend</button>'+response[key].nm+'</td><td>'+response[key].total+'</td></tr>');
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
		spicuserdt();
	});
	}
}
}

//extend button
function collapdt(customerid){
	var dt1 = document.getElementById("datepicker1").value;
	var dt2 = document.getElementById("datepicker2").value;
	console.log("entered");
	document.getElementById("btn"+customerid+"").innerHTML="back";
	document.getElementById("btn"+customerid+"").setAttribute("onclick","backdt("+customerid+")");
		$(function(){
			//each order
			function fetcheachorder(){
				$.ajax({
					url: "customer_order.php",
					method:"get",
					data:{
						"id":customerid,
						"dt1":dt1,
						"dt2":dt2
						},
					success:function(response){
	console.log(response);
	$("#tr"+customerid+"").after('<table class="table table-striped" id="tb'+customerid+'"><tr><th>order date</th><th>amount</th></tr></table>');
	for(var key in response){
	$("#tb"+customerid+"").append('<tr id=tr'+key+'><td><button onclick=expand('+key+') id=btn'+key+' >expand</button>'+response[key].date+'</td><td>'+response[key].amount+'</td></tr>');
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
			fetcheachorder();
		});
}
//back button
function backdt(customerid){

document.getElementById("btn"+customerid+"").innerHTML="extend";
document.getElementById("btn"+customerid+"").setAttribute("onclick","collapdt("+customerid+")");
$("#tr"+customerid+"").next().remove();
}
</script>
	</body>

</html>
