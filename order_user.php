<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>order_user</title>
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
					
					<table class="nav navbar-nav navbar-right">
						<tr>
							<td>
								<div class="nav navbar-nav navbar-right" >
								<img class="  img-circle" width="90" height="90" 
								src="img/user.png"  alt="profile pic" style="text-align:left" class="img-circle">
								
							</td>
							<td style="margin:25px">
								<div class="nav navbar-nav navbar-right"><a href="#" style="margin:20px
								 ;text-align:center"><h4> ahmed magdy</h4> </a></div>
								</div>
			
							</td>
						</tr>
					</table>
			     
			     </div> <!-- end div navbar  -->

<!-- - - -  end navbar - - - - - - -->



		<div class="row" style="margin-top:25px;">

				<div class="panel panel-info">
				<div class="panel-heading" >My orders</div>
				  <div class="panel-body">

				  <div class= "row" style="text-align:right ; margin-right:8px;" > 
						<form class="form-inline pull-xs-right " >
 						   <input class="form-control" type="text" placeholder="Search">
						   <button class="btn btn-success-outline" type="submit">Search</button>
						  </form>
				  </div>		 <!-- row 1 (row with search ) --> 					
				
				    	
<div class="row" style="margin-top:15px;">  <!-- start row 2 (row of products) -->
 

  <div class="col-xs-3 col-lg-3"> <!-- left side menu  -->
  	<form>
  		<div class="row" style="margin-top:25px">
  				<div class="col-lg-6">
  					<input type="number" class="form-control" >
  				</div>
  				<div style="float:right">
  					<label style="margin-right:20px">25 EGP </label> <img src="img/remove.png" width="30" height="30" style="margin-right:20px"> 
  					
  				</div>
  		</div>

  		<div class="row" style="margin-top:25px">
  				<div class="col-lg-6">
  					<input type="number" class="form-control" >
  				</div>
  				<div style="float:right">
  					<label style="margin-right:20px">25 EGP </label> <img src="img/remove.png" width="30" height="30" style="margin-right:20px"> 
  					
  				</div>
  		</div>


  		<div class="row" style="margin-top:25px">
  				<h3> Notes </h3>
  				<textarea class="form-control" rows="7">write your notes in here </textarea>
  		</div>

  		<div class="row" style="margin-top:25px">
  				Room <select class="form-control">
 						 <option value="room 1">room 1</option>
 						 <option value="room 2">room 2</option>
 						 <option value="room 3">room 3</option>
 						 <option value="room 4">room 4</option>
					 </select>
  		</div>
		<br>
  		<hr style="border-style: solid; border-width: 1px; display:block">
  		
  		<div id="total-price" style="text-align:right">
  				<h3>55 EGP</h3>
  		</div>
  		
  		<div class="row" style="margin-top:15px ; margin-right:15px; text-align:right" >
  			<input type="submit" class="btn btn-primary">
  		</div>	
</form>

  </div> <!-- end part1 elnos el awel (left side menu) -->



  <div class="col-xs-9 col-lg-9" >
    <h3> <span class="label label-default">Latest Orders</span></h3>
    <div class="row" style="margin-top:25px" >
        
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Cup.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Coffee</h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Tea.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Tea </h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      

    </div><!-- end.row 1 -->

        <div class="row" style="margin-top:30px">
        
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Cup.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Coffee</h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Tea.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Tea </h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Cup.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Coffee</h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Tea.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Tea </h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      

    </div><!-- end.row 2 [] -->


<div class="row" style="margin-top:25px"> <!-- start row 3 -->
        
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Cup.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Coffee</h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Tea.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Tea </h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Cup.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Coffee</h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      
        <div class="col-lg-3">
          <img class="img-rounded" src="img/Tea.png" alt="a cup of fucken coffee" width="100" height="100">
          <h3>Tea </h3>
          <p> would u like to drink a cup of fucken coffee</p>
          <p><a class="btn btn-default" href="#" role="button">buy &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      

    </div><!-- end.row 3 [] -->


  </div> <!-- end part2 -->
  
</div>						

				    
				  </div> <!-- end body -->


				  <div class="panel-footer">footer</div>
				</div>

  			
		</div>
</body>
</html>