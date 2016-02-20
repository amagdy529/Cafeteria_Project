<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="UTF-8">
	<title>Adduser</title>
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
             <li><a class=" nav navbar-nav navbar-right" href="#">Admin
                <img alt="Brand" src="logo.png">
              </a></li>
                </ul>
             </div>


<div class="row" style="margin-top:15px;">
        	<div class="col-sm-12">
            	<div class="panel panel-info">
                  <div class="panel-heading">
                    <h1 class="panel-title">AddUser</h1>
                  </div>
                  <div class="well">
                    	<form action="users.php" enctype="multipart/form-data" method="post" onsubmit="return validate()">
                      <div class="form-group">
                        <label for="fname"> Name</label>
                        <input type="text" class="form-control"   name="fname" placeholder="Enter his  name" required>
                      </div>
                      
                       <div class="form-group">
                        <label for="fname"> Email</label>
                        <input type="email" class="form-control"    name="email" placeholder="Enter his Email" required>
                      </div>

                       <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"   required  id="password" placeholder="Enter his Password"  >
                      </div>
                      
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control"    id="cpassword" required
			placeholder="Enter his Confirmed Password"  >
                      </div>
                      
                     <div class="form-group ">
                        <label for="Room no"> Room No</label>
			
                      <select class="form-control" name="roomNo">
                           <?php
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("rooms") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
				echo "<option value=".$qrow['room_no'].">".$qrow['room_no']."</option>";
				}
			?>
                      </select>
                      </div>
                     
                      <div class="form-group ">

                        <label for="Ext"> Ext</label>
                        <input type="text" class="form-control"  required name="ext" placeholder="Enter his Ext">
                      </div>

			<div class="form-group ">

                        <label for="Ext"> admin</label>
                        <input type="text" class="form-control"  required name="admin" placeholder="Is he admin? y : n">
                      </div>

		     <div class="form-group">
                        <label for="file">Profie Picture</label>
                        <input type="file" class="form-control" required  name="myfile" >
                      </div>

                      <button type="submit" name="save_btn" class="btn btn-info pull-center">Save</button>
                      <button type="reset" name="save_btn" class="btn btn-info pull-center">Reset</button>

		</form>
	
		</div>
<script>
var pass = document.getElementById('password');
var cpass = document.getElementById('cpassword');
if(pass == cpass){
return true;
}else{
return false;
}
</script>
	</body>
</html>


<?php include_once 'database/DataBase_Class.php';
$name = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$room = $_POST['roomNo'];
$ext = $_POST['ext'];
$imgname = $_FILES['myfile']['name'];
$upfile='/var/www/html/Cafeteria_Projects/img/'.$_FILES['myfile']['name'];
$imgtemp = $_FILES['myfile']['tmp_name'];
$admin=$_POST['admin'];

if(isset($name)){
if ($_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
   die("Upload failed with error code " . $_FILES['myfile']['error']);
}

$info = getimagesize($imgtemp);
if ($info === FALSE) {
   die("Unable to determine image type of uploaded file");
}

if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
   die("Not a gif/jpeg/png");
}else{
echo "entered";
move_uploaded_file($imgtemp, $upfile);
$conobj = db::getInstance();
$conobj->setTable("customers") ;
$arr['customer_name']=$name;
$arr['Email']=$email;
$arr['Password']=$password;
$arr['room_no']=$room;
$arr['EXT']=$ext;
$arr['customer_image']=$upfile;
$arr['admin']=$admin;

$conobj->insert($arr);
}
}
?>

