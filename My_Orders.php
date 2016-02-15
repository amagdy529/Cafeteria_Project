<!DOCTYPE html>
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
			      
				<li ><a href="#">Home |<span class="sr-only">(current)</span></a></li>
				<li><a href="#">My Orders</a></li>
				
			    
				</ul>

                <div class="nav navbar-nav navbar-right" >
                <img class="  img-circle" width="90" height="90" 
                src="img/user.png"  alt="profile pic" 
                style="text-align:left; " 
                class="img-circle">
          
                <div class="nav navbar-nav navbar-right"><a href="#" >
                <h4 style="margin:10px; margin-top:40px"> ahmed magdy</h4> </a></div>
                </div>
      

			     </div> <!-- end div navbar  -->

<!-- - - -  end navbar - - - - - - -->



		<div class="row" style="margin-top:25px;">

				<div class="panel panel-info">
				<div class="panel-heading" >My orders</div>
				  <div class="panel-body">

				  	<div class="row" >
				  		<input class="form-control" type="date" value="from">
				  	</div>


				      <div class= "row" style=" margin-right:8px;" > 
				
<table class="table table-striped">
  <thead>
    <tr>
      <th>Order Date</th>
      <th>Status</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>10/2/2016</td>
      <td>Delovered</td>
      <td>20 EGP</td>
      <td>Cancel</td>
    </tr>
  </tbody>
</table>                                            

         	    </div>		 <!-- row 2  --> 					
				
				    	
				  </div> <!-- end body -->


				  <div class="panel-footer">footer</div>
				</div>

  			
		</div>
</body>
</html>