<!DOCTYPE html>
<?php
session_start(); 
if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {header('Location: login.php');}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="UTF-8">
	<title>Add product</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
<!--	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.2.js"></script>
	<script type="js/code.js"></script>
-->	

<!-- ana 7atet <script><link> 3shan el library bta3tna mnf3tsh m3 el modal mesh 3arf leeh -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
                    <h1 class="panel-title">Add Product</h1>
                  </div>
                  <div class="panel-body">
                    	<form method="post" action="allproducts.php" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label for="pname"> Product</label>
                        <input type="text" class="form-control"  required  id="pname" name="pname" placeholder="Enter Product Name">
                      </div>
                      
                       <div class="form-group">
			 <label for="pprice"> Price</label>
			 <div class="input-group">
			      <input type="text" class="form-control" name="pprice" required>
			      <span class="input-group-btn">
				<button class="btn btn-default" type="button"><span class="caret"></span></button>
				<button class="btn btn-default dropup" type="button">
				<span class="caret"></span></button>
			      </span>
			  </div>
			<label > EGP</label>
                      </div>

                       <div class="form-group">
                    	    <label for="pcategory">Category</label>
                    	    <select class="form-control"    id="pcategory"  name="pcategory"   >
			 <?php
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("categories") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
				echo "<option value=".$qrow['cat_type'] . ">".$qrow['cat_type']."</option>";
				}
			?>
							</select>
						<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#my-modal">
            				Add Category &raquo;
            			</button>
          					


						<!--  	<a href="#">add category</a>  -->
                       
                      </div>
                      
                      <div class="form-group">
                        <label for="pic">Profile Picture</label>
                        <input type="file" class="form-control"   id="pic"  name="pic"   required>
                      </div>

                      <button type="submit" name="save_btn" class="btn btn-primary pull-center">Save</button>
                      <button type="reset" name="save_btn"  class="btn btn-primary pull-center">Reset</button>

			</form>
			</div>  <!-- end panel body -->


    <!-- Modal -->
    <div  id="my-modal" class="modal" data-keyboard = "true" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" ><span >&times;</span></button>
            <h4 class="modal-title">Adding Category</h4>


          </div>
          <div class="modal-body">
            <p>What Category do you want to add ?</p>
            <input type="text" class="form-control " value="category name" >
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Add</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>        
      </div>
    </div>

	  <div class="panel-footer ">footer</div>
	  </div>


		</div>
	</body>
	</html>


<?php include_once 'database/DataBase_Class.php';
$name=$_POST['pname'];
$price=$_POST['pprice'];
$cat=$_POST['pcategory'];
$imgname=$_FILES['pic']['name'];
$imgtemp = $_FILES['pic']['tmp_name'];
$upfile='/var/www/html/Cafeteria_Projects/img/'.$_FILES['pic']['name'];

if(isset($name)){
if ($_FILES['pic']['error'] !== UPLOAD_ERR_OK) {
   die("Upload failed with error code " . $_FILES['pic']['error']);
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
$conobj->setTable("products") ;
$arr['product_name']=$name;
$arr['product_price']=$price;
$arr['product_image']=$upfile;
$arr['product_category']=$cat;
$arr['product_status']="available";
//print_r($arr);
$af_row = $conobj->insert($arr);
echo $af_row;
}
}

?>
