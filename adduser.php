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
                    <h1 class="panel-title">AddUser</h1>
                  </div>
                  <div class="panel-body">
                    	<form method="" action="adduser.php" enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="fname"> Name</label>
                        <input type="text" class="form-control"   name="fname" placeholder="Enter Your  name" required>
                      </div>
                      
                       <div class="form-group">
                        <label for="fname"> Email</label>
                        <input type="email" class="form-control"    name="email" placeholder="Enter Your Email" required>
                      </div>

                       <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"   required  name="password" placeholder="Enter Your Password"  >
                      </div>
                      
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control"    name="cpassword" required
			placeholder="Enter Your Confirm Password"  >
                      </div>
                      
                     <div class="form-group">
                        <label for="fname"> Room No</label>
			<select name="sel">
						
			</select>
                      </div>
                     
                      <div class="form-group">
                        <label for="fname"> Ext</label>
                        <input type="text" class="form-control"  required name="ext" placeholder="Enter Your Ext">
                      </div>

		     <div class="form-group">
                        <label for="file">Profie Picture</label>
                        <input type="file" class="form-control" required  name="myfile" >
                      </div>

                      <button type="submit" name="save_btn" class="btn btn-info pull-center">Save</button>
                      <button type="reset" name="save_btn" class="btn btn-info pull-center">Reset</button>

		</form>
	
		</div>
	</body>
</html>

