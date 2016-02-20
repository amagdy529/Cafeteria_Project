<!DOCTYPE html>
<?php
include_once 'database/DataBase_Class.php';
?>

<html lang="en">
  <head>

<meta charset="UTF-8">
	<title>Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <li ><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Manual Order</a></li>
                <li><a href="#">Checks</a></li>
             <li><a class=" nav navbar-nav navbar-right" href="#">Admin
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
                   <th>ID</th> <th> Name </th> <th> Room </th> <th> Image </th><th> Ext </th><th> Action</th>
                </tr>
		 <?php
				include_once 'database/DataBase_Class.php';
				$conobj = db::getInstance();
				$conobj->setTable("customers") ;
				$res = $conobj->select_all();
				while($qrow = mysqli_fetch_assoc($res)){
			 
        echo  "<tr><th><label style='display:hidden' >".$qrow['customer_id']."</label></th>";
       	echo "<th>".$qrow['customer_name']."</th><th>".$qrow['room_no']."</th><th>";
				echo  "<img src='".$qrow['customer_image']."' width='100' height='100' class=' img img-circle' /></th><th>".$qrow['EXT']."</th><th> 
        <a class='btn btn-primary' href='users.php?edit_id=".$qrow['customer_id']."'>edit</a> 
        <a class='btn btn-danger' href='users.php?delete_id=".$qrow['customer_id']."'>
        delete</a></th></tr>";
       	} //end while 

        if(isset($_GET['delete_id']))
         {
            deleteFN($_GET['delete_id']);
         } 
      //  $delVar= $qrow['product_id'] ;
        function deleteFN($delVar){
                 $arr["customer_id"]=$delVar;
                  //require "database/DataBase_Class.php";
                  $dbObj = db::getInstance();
                  $dbObj->setTable("customers");

                  $dbObj->delete($arr);
                  header("location:users.php");

        }
			?>
            </thead>
            <tbody>
                
        



            </tbody>
		</table>
           
         
<?php
if(isset($_GET['edit_id']))
{
    $conobj = db::getInstance();
    $conobj->setTable("customers") ;
    $arr1['customer_id']=$_GET['edit_id'];
    $res1 = $conobj->select($arr1);
    $rowUser=mysqli_fetch_array($res1);
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editing Customer </h4>
      </div>
      <?php
        if (isset($_POST['updateBtn'])) {
            //echo "aaaaa";
            $setArr['customer_name']=$_POST['customer_name'];
            $setArr['room_no']=$_POST['room_no'];
            $setArr['EXT']=$_POST['EXT'];

            $imgname = $_FILES['customer_image']['name'];
            $upfile='img/'.$_FILES['customer_image'];
            $imgtemp = $_FILES['customer_image']['tmp_name'];

          /*            

            if ($_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
            die("Upload failed with error code " . $_FILES['product_image']['error']);
            }

            $info = getimagesize($imgtemp);
            if ($info === FALSE) {
                  die("Unable to determine image type of uploaded file");
              }

            if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
                  die("Not a gif/jpeg/png");
            }else{

            */  
          
                move_uploaded_file($imgtemp, $upfile);
                //$setArr['product_image']=$_FILES['product_image'];
                $setArr['customer_image']=$upfile;
                $whereArr['customer_id']=$_GET['edit_id'];

                $obj= db::getInstance();
                $obj->setTable('customers');
                $obj->update($whereArr,$setArr);
                header("location:users.php");
      
         //   } //end else

        }
      ?>
      
      <form method="post" action="users.php?edit_id=<?php echo$_GET['edit_id'] ?>">
      <div class="modal-body">
          <p> name  :</p>
            <input type="text" class="form-control" name="customer_name" value="<?php echo $rowUser['customer_name'] ?>" >
            <p> Room :</p>
            
            <!--<input type="text" class="form-control" name="product_price"
             value="<?php echo $rowUser['room_no'] ?>"> -->
            <select class="form-control" name="room_no">
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
            <p> image :</p>
            <input type="file" class=" form-control" name="product_image" value="product image" >
            <p> EXT :</p>
            <input type="text" class="form-control" name="EXT" value="<?php echo $rowUser['EXT'] ; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="updateBtn" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
}
?>


      







</form>
</div>
</body>
</html>
















