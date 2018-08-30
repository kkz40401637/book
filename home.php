<?php
session_start();
error_reporting(1);
include("connection.php");
if(isset($_POST['log']))
{ if($_POST['id']=="" || $_POST['pwd']=="")
{ $err="fill your id and password first"; }
else 
{$d=mysql_query("select * from user where name='{$_POST['id']}' ");
$row=mysql_fetch_object($d);
$fid=$row->name;
$fpass=$row->pass; 
if($fid==$_POST['id'] && $fpass==$_POST['pwd'])
{$_SESSION['sid']=$_POST['id'];
header('location:index.php'); }
else { $er=" your password is not"; }}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>About As</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.min.css"> 
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>



	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
</head>
<body>
<div class="banner">
		
	</div>
    <div class="header">
		<div class="container">
			<div class="header-menu">
				
			<div class="clearfix"></div>
			</div>	
		</div> 
	</div>
		<!---header--->		
		<div class="content">
			<div class="restaurant">
				<div class="container">
					<h2 class="tittle">Book Admin Login</h2>
								<section class="container login-form">
		<form method="post" action="" role="login">
			<div class="form-group">
   				<div class="input-group">
      				<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
					<input type="text" id="id" name="id" placeholder="Username" required class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
   				<div class="input-group">
      				<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
					<input type="password" id="pwd" name="pwd" placeholder="Password" required class="form-control input-lg" />
				</div>
			</div>
			<button type="submit" name="log"  id="log" class="btn btn-lg btn-block btn-success">SIGN IN</button>
			
		</form>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
				</div>
			</div>
		</div>		
		
		

</body>
</html>