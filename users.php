<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="UTF-8">
	<title>Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
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
             			<li ><a href="adminhome.php">Home |<span class="sr-only">(current)</span></a></li>
				<li><a href="allproducts.php">Products</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="Order_admin.php">Manual order</a></li>
				<li><a href="checks.php">Checks</a></li>
             <li><a class=" nav navbar-nav navbar-right" href="adminhome.php">Admin
                <img alt="Brand" src="logo.png">
              </a></li>
                </ul>
                  </div>

<div class="row" style="margin-top:15px;">
        	<div class="col-sm-12">
            	<div class="panel panel-info">
                  <div class="panel-heading">
                    <h1 class="panel-title">AllUser</h1>
                  </div>
<br/>

  <div class="row text-center">
        	<a href="adduser.php" class="btn btn-info">Add New User</a>
            <br><br>
        </div>
        <table class="table text-center table-hover table-bordered">
			<thead>
                <tr>
                    <th> Name </th> <th> Room </th> <th> Image </th><th> Ext </th><th> Action</th>
                </tr>
		 <?php
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("customers") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
				echo "<tr><th>".$qrow['customer_name']."</th><th>".$qrow['room_no']."</th><th>";
				echo  "<img src='".$qrow['customer_image']."'/></th><th>".$qrow['EXT']."</th><th> <a>edit</a> <a>delete</a></th></tr>";
				}
			?>
            </thead>
            <tbody>
                
                           

            </tbody>
		</table>
           
         


      







</form>
</div>
</body>
</html>















