<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Form</title>
</head>

<body>
<?php
include("connection.php");
if($_POST){
	
	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname']; 
	$email = $_POST['email'];
	$password = $_POST['password']; 
	$cpassword = $_POST['cpassword'];
	
	$SQL = "SELECT email FROM employee WHERE email='".$email."'";
	$result = mysql_query($SQL);
	if($result){
		while($temp = mysql_fetch_assoc($result)){
			$emailIn = $temp["email"];
		}
	}

	if ($firstname!=""){
		$val_fname = $firstname;
	}else{ 
		$err_fname='Please enter valid First Name.'; 
	}
	
	if ($lastname!=""){
		$val_lname = $lastname;
	}else{ 
		$err_lname='Please enter valid Last Name.'; 
	}
 
	if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
		if($emailIn==$email){
			$err_email = 'This email address is already in use.'; 
		}else{
			$val_email = $email; 
		}
	}else{ 
		$err_email = 'Please enter valid Email.'; 
	}
 
	if (preg_match("/^[a-z0-9_-]{6,20}$/i", $password)){
		$val_password = $password;
	}else{ 
		$err_password = 'Please enter valid Password (minimum 6 characters)'; 
	}
	
	if($password==$cpassword){
		
	}else{
		$err_cpassword = 'Please did not match.'; 
	}
	
	if($err_fname=="" && $err_lname=="" && $err_email=="" && $err_password=="" && $err_cpassword==""){
	mysql_query("INSERT INTO employee SET firstname='".$firstname."', lastname='".$lastname."', email='".$email."', password='".base64_encode($password)."'");
	$_SESSION["reg"]="Thank you. you are successfully registered.";
	header("Location:index.php");
}
	
}

?>

<h1>Register Form</h1>
<form method="post" action="#">
First Name: <input type="text" name="firstname" value="<?=$val_fname?>" />&nbsp;<?php echo $err_fname; ?><br />
Last Name: <input type="text" name="lastname" value="<?=$val_lname?>" />&nbsp;<?php echo $err_lname; ?><br />
Email: <input type="text" name="email" value="<?=$val_email?>" />&nbsp;<?php echo $err_email; ?><br />
Password: <input type="text" name="password" value="" />&nbsp;<?php echo $err_password; ?><br />
Confirm Password: <input type="text" name="cpassword" value="" />&nbsp;<?php echo $err_cpassword; ?><br />
<input type="submit" name="Register" value="Submit" /><br />

</form>
</body>
</html>