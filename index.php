<?php
error_reporting(1);
session_start();
if($_SESSION['sid']=="")
{
header('location:home.php');
}
else{
?>
<head>
<?php

	require_once 'connection.php';
	
	if(isset($_GET['delete_id']))
	{
		
		$stmt_select = $DB_con->prepare('SELECT userPic FROM tbl_users WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		
		$stmt_delete = $DB_con->prepare('DELETE FROM tbl_users WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: home.php");
	}

?>
<title>info show</title>
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



	
</head>
<body>
<div class="banner">
		
	</div>
    <div class="header">
		<div class="container">
			<div class="header-menu">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <div class="navbar-brand logo" align="center">
							<h1><a href=""><span>Admin</span>Panal</a></h1>
							</div>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						   <ul class="nav navbar-nav">
							<li><a href="https://fourthregionalslw.com" data-hover="Home">Home </a></li>
						
							
							
							
							
							
							 <li><a data-hover="logout" href="logout.php">Logout</a></li>
							 
						  </ul>
						</div>
						
					</div>
				</nav>
			<div class="clearfix"></div>
			</div>	
		</div> 
	</div>
			
		<div class="content">
			<div class="restaurant">
				<div class="container">
					<h2 class="tittle">Upload Data Information</h2>
						<div class="row">
<?php
error_reporting(1);
/*--------------------------------------------------------------------------------------------
Developed by Page Myanmar
Powered by Zend Technologies
This program makes use of the Zend Scripting Language Engine!                 
---------------------------------------------------------------------------------------------*/
include('connection.php'); //include of db config file
include ('paginate.php'); //include of paginat page
extract($_POST); 
if($save)
{
//check user already exists or not
$q=mysql_query("select email from users where email='$e'");
$r=mysql_num_rows($q);
if($r)
{
echo "<font color='red'>$e already exists</font>";
}
else
{

//for image
$img=$_FILES['img']['name'];
//hobbies
$hobbies=implode(",",$hobb);
//dob
$dob=$yy."-".$mm."-".$dd;

//save data
$query="insert into users values('','$n','$ser','$e','$edi','$con','$pun','$img','$add','$key','$mob','$cat','$min','$max','$isbn','$pric','$pdf',now())";
mysql_query($query);

//save user's image
mkdir("image/$e");
move_uploaded_file($_FILES['img']['tmp_name'],"image/$e/".$_FILES['img']['name']);

echo "<font color='blue'>Congrates !</font>";
}
}
?>

<link rel="stylesheet" type="text/css" href="style.css"/>
	<body>
	<div class="form-group">
		<form method="post" enctype="multipart/form-data" align="center" class="row ">
			<table border="1" align="center" class="col-sm-12" class="form-group">
			<tr >
				<Td class="col-xs-5">Booktitle</td>
				<td><input type="text" name="n" required class="form-control " /></td>
			</tr>
			<tr>
				<Td>Series</td>
				<td><input type="text" name="ser" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>Email</td>
				<td><input type="email" name="e" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>EditionNo</td>
				<td><input type="text" name="edi" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>Contributor</td>
				<td><input type="text" name="con" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>Publisher</td>
				<td><input type="text" name="pun" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>Description</td>
				<td><textarea name="add" required class="form-control "></textarea></td>
			</tr>
			<tr>
				<Td>Keyword </td>
				<td><textarea name="key" required class="form-control "></textarea></td>
			</tr>
			<tr>
				<Td>Phone number </td>
				<td><input type="text" pattern="[0-9]*" maxlength="10" name="mob" required class="form-control "/></td>
			</tr>
			<tr>
				<Td>Categories</td>
				<td><textarea name="cat" required class="form-control "></textarea></td>
			</tr>
			
			<tr>
				<Td>MiniAge</td>
				<td><textarea name="min" required class="form-control "></textarea></td>
			</tr>

			<tr>
				<Td>MaxAge</td>
				<td><textarea name="max" required class="form-control "></textarea></td>
			</tr>
			<tr>
				<Td>ISBN</td>
				<td><textarea name="isbn" required class="form-control "></textarea></td>
			</tr>
			<tr>
				<Td>Asin</td>
				<td><textarea name="asin" required class="form-control "></textarea></td>
			</tr>

			<tr>
				<Td>Price</td>
				<td><textarea name="pric" required class="form-control "></textarea></td>
			</tr>
			
			<tr>
				<Td>Coverphoto</td>
				<td><input type="file" name="img" required class="form-control "></td>
			</tr>

			<tr>
				<Td>PDF</td>
				<td><input type="file" name="pdf" required class="form-control "></td>
			</tr>


			<tr>
				<td colspan="2">
				<input type="submit" name="save" value="Insert Data"/>
				</td>
			</tr>
			</table>
		</form>
		</div>
	</body>
<!-- ############################################## -->
<!-- display data starts -->
<table border="1">
<tr style="background:#CCCCCC" height="30px"><th>Name</th><th>Email</th><th>Address</th><th>Mobile</th>
<th>Image</th>
<th>&nbsp;</th><th>&nbsp;</th>
</tr>


<?php
$per_page = 8;  // number of results to show per page
$result = mysql_query("SELECT * FROM users");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page']))
 {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
 
	//$query=mysql_query("select * from users");
	for ($i = $start; $i < $end; $i++)  
	{
		if ($i == $total_results)
		 {
		 break;
		 }
	?>
	<tr>
		<td><?php echo mysql_result($result, $i, 'name');?></td>
		<td><?php echo mysql_result($result, $i, 'email');?></td>
		<td><?php echo mysql_result($result, $i, 'address');?></td>
		<td><?php echo mysql_result($result, $i, 'mobile');?></td>
		<td><img src="image/<?php echo mysql_result($result, $i, 'email')."/".mysql_result($result, $i, 'image');?>" width="40px" /></td>
		<td><a href="edit.php?email=<?php echo mysql_result($result, $i, 'email');?>">Edit</a></td>
		<td><a href="delete.php?email=<?php echo mysql_result($result, $i, 'email');?>&image=<?php echo mysql_result($result, $i, 'image');?>">Delete</a></td>
	</tr>  
	
	<?php }  ?>
<tr>
	<td colspan="7">
	 <?php 
	 $reload = "index.php" . "?tpages=" . $tpages;
                    echo '<div  class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
	?>
	</td>
</tr>
</table>

<!-- display data end -->