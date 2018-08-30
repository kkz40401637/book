<?php 
error_reporting(1);
include('connection.php');
$sql=mysql_query("select * from users where email='{$_GET['email']}'");
$row=mysql_fetch_array($sql);
extract($_POST); 
if($upd)
{
mysql_query("update users set name='$n',password='$p',address='$add',mobile='$mob' where email='{$_GET['email']}'");
header('location:index.php');
}
?>
<html>

	<body>
		<form method="post" enctype="multipart/form-data">
			<table>
			
			<tr>
				<Td>Edit you text</td>
				<td>
				<textarea name="add">
				<?php echo $row['address'];?>
				</textarea></td>
			</tr>
			
			
			<tr>
				<Td colspan="2" align="center">
				<input type="submit" value="Update My records" name="upd"/>
				</Td>
			</tr>
			</table>
			</form>
			</body>
			</html>