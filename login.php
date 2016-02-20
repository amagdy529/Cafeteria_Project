<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
  </head>
  <body>

<div class="container">
<h1 align="center">Cafeteria</h1>

<br/>
<form class="form-horizontal" action="login.php" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="inputEmail3" placeholder="Email" required>
    </div>
  </div>
<br/>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="inputPassword3" placeholder="Password">
    </div>
  </div>
<br/>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button align="center" type="submit" class="btn btn-default">Login</button>
    </div>
  </div>
<br/>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div >
        <label>
          <form action="login.php" method="post"><a ><input type="submit" name="fgpass" value="forget password"/></a></form>
        </label>
      </div>
    </div>
  </div>
</form>

</div>
</body>
</html>
<?php include 'database/DataBase_Class.php';
$conobj = db::getInstance();
$conobj->setTable("customers") ;

//get page variables
$email = $_POST['inputEmail3'];
$pass = $_POST['inputPassword3'];
$fgpass = $_POST['fgpass'];

//log in user
if(!empty($pass )){
$arr['Email'] = $email;
$arr['Password'] = $pass;
$res = $conobj->select($arr);
while($qrow = mysqli_fetch_assoc($res)){
session_start();
if($qrow['admin']=="y"){
$_SESSION['admin']=$qrow['customer_name'];
header('Location: adminhome.php');
}else{
$_SESSION['name']=$qrow['customer_name'];
header('Location: Order_user.php');
}
}

//forget password and send an email
if(!empty($fgpass )){
$sub = "mail form cafeteria to reset password";
$arr['Email'] = $email;
mail($email,$sub,'123');
}
} 
?>

