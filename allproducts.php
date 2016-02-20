<html>
	<head>
		<title>all products</title>
		 <script src="js/bootstrap.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
                    <h1 class="panel-title">All Products</h1>
                  </div>
		<br/>

  	<div class="row text-center">
        	<a href="addproduct.php" class="btn btn-info">Add Product</a>
            <br><br>
        	</div>
       	 <table class="table text-center table-hover table-bordered">
			<thead>
               <tr>
					<th> products </th><th> price </th><th> image </th><th> action </th>
		</tr>
		 <?php
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("products") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
				echo "<tr><th>".$qrow['product_name']."</th><th>".$qrow['product_price']."</th><th>";
				echo  "<img src='".$qrow['product_image']."'/></th><th>".$qrow['product_status']." <button  id=ed onclick='editfn(".$qrow['product_name'],$qrow['product_price'],$qrow['product_status'].")' >edit</button><form action=allproducts.php method=post ><button name=del type=submit value=".$qrow['product_name'].">delete</button></th></form></tr>";
				}
			?>
            </thead>
            <tbody>
                
                           

            </tbody>
		</table>
	</form>
	</div>
<script>
function editfn(name,price,status){

}
</script>
	</body>
</html>
