<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
<?php
if(!isset($_SESSION["UID"]) && $_SESSION["UID"]==""){
	header("Location:index.php");
}
include("connection.php");

$SQL="SELECT * FROM employee WHERE id='".$_GET["id"]."'";
$result = mysql_query($SQL);

if($result){
	while($temp = mysql_fetch_assoc($result)){
		$ID=$temp["id"];
		$firstname=$temp["firstname"];
		$lastname=$temp["lastname"];
		$email=$temp["email"];
		$designation=$temp["designation"];
		$city=$temp["city"];
		$salary=$temp["salary"];
	}
}
?>

<a href="logout.php">Logout</a>

<h1>Edit Profile</h1>
<form method="post" action="action.php">
<input type="hidden" name="a" value="editform" />
<input type="hidden" name="editID" value="<?php echo $ID; ?>" />
First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>" /><br />
Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>" /><br />
Email: <input type="text" name="email" value="<?php echo $email; ?>" /><br />
designation: <input type="text" name="designation" value="<?php echo $designation; ?>" /><br />
City: <input type="text" name="city" value="<?php echo $city; ?>" /><br />
Salary: <input type="text" name="salary" value="<?php echo $salary; ?>" /><br />
<input type="submit" name="Edit" value="Edit" /><br />
<input type="button" name="List" value="Back" onclick="window.location='view_profile.php'" /><br />
</form>
</body>
</html>