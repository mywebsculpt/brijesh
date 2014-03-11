<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<script type="text/javascript" language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$("#emailType").keyup(function (){
		if($("#pwdType").val()!=""){
			$("#submitButton").removeAttr("disabled");
		}else{
			$("#submitButton").attr("disabled", "disabled");
		}
	});
	$("#pwdType").keyup(function(){
		if($("#emailType").val()!=""){
			$("#submitButton").removeAttr("disabled");
		}else{
			$("#submitButton").attr("disabled", "disabled");
		}
	});
});

</script>
</head>

<body>
<?php
if(isset($_SESSION["UID"]) && $_SESSION["UID"]!=""){
	header("Location:view_profile.php");
}

if(isset($_SESSION["reg"]) && $_SESSION["reg"]!=""){
	echo $_SESSION["reg"];
}
unset($_SESSION["reg"]);

if(isset($_SESSION["logout"]) && $_SESSION["logout"]!=""){
	echo $_SESSION["logout"];
}
unset($_SESSION["logout"]);


?>
<h1>Login Form</h1>
<form method="post" action="action.php">
<input type="hidden" name="a" value="login" />
Email: <input type="text" id="emailType" name="email" />&nbsp;<?php echo $err_email; ?><br />
<?php
if(isset($_SESSION["email"]) && $_SESSION["email"]!=""){
	echo $_SESSION["email"]."<br />";
}
unset($_SESSION["email"]);
?>
Password: <input type="text" id="pwdType" name="password" />&nbsp;<?php echo $err_password; ?><br />
<?php
if(isset($_SESSION["pwd"]) && $_SESSION["pwd"]!=""){
	echo $_SESSION["pwd"]."<br /><br />";
}
unset($_SESSION["pwd"]);
?>
<input type="submit" disabled="disabled" id="submitButton" name="Login" value="Login" /><br />
Not Yet Registered...! <a href="register.php">Click Here.</a>
</form>
</body>
</html>