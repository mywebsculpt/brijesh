<?php
session_start();
error_reporting(0);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Profile</title>
</head>

<body>
<?php
if(!isset($_SESSION["UID"]) && $_SESSION["UID"]==""){
	header("Location:index.php");
}
include("connection.php");

if(isset($_SESSION["edit"]) && $_SESSION["edit"]!=""){
	echo $_SESSION["edit"]."<br />";
}
unset($_SESSION["edit"]);

if(isset($_SESSION["login"]) && $_SESSION["login"]!=""){
	echo $_SESSION["login"]."<br />";
}
unset($_SESSION["login"]);


$SQL="SELECT * FROM employee WHERE id='".$_SESSION["UID"]."'";
$result = mysql_query($SQL);
				
?>
<a href="logout.php">Logout</a>

<h1>View Profile</h1>
<table border="1">
<tr>
<td>ID</td>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>Designation</td>
<td>City</td>
<td>Salary</td>
<td>action</td>
</tr>

<tr>
<?php
if($result){
	while($temp = mysql_fetch_assoc($result)){
?>
<td><?=$temp["id"]?></td>
<td><?=$temp["firstname"]?></td>
<td><?=$temp["lastname"]?></td>
<td><?=$temp["email"]?></td>
<td><?=$temp["designation"]?></td>
<td><?=$temp["city"]?></td>
<td><?=$temp["salary"]?></td>
<td><a href="edit_profile.php?id=<?=$temp["id"]?>">Edit</a></td>
<?php
	}
}
?>
</tr>
</table>
</body>
</html>