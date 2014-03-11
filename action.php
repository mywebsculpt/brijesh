<?php
include("connection.php");
session_start();
//echo "sss"

switch($_POST["a"]){
	
	case 'login' :
			$email = $_POST['email'];
			$password = $_POST['password'];
			if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
				$email = $email; 
			}else{ 
				$err_email = 'Please enter valid Email.'; 
			}
		 
			if (preg_match("/^[a-z0-9_-]{6,20}$/i", $password)){
				$password = $password;
			}else{ 
				$err_password = 'Please enter valid Password (minimum 6 characters)'; 
			}
			
			if($err_email!="" && $err_password!=""){
				$_SESSION["email"]=$err_email;
				$_SESSION["pwd"]=$err_password;
				header("Location:index.php");
			}else{
				$SQL="SELECT id,email,password FROM employee WHERE email='".$email."'";
				$result = mysql_query($SQL);
				if($result){
					while($temp = mysql_fetch_assoc($result)){
						$idIn = $temp["id"];
						$emailIn = $temp["email"];
						$passwordIn = $temp["password"];
					}
				}
				if($emailIn==$email && $password==base64_decode($passwordIn)){
					$_SESSION["UID"]=$idIn;
					$_SESSION["login"]="Login successfully.";
					header("Location:view_profile.php");
				}
			}
	
		break;
		
	case 'editform' :
	
		mysql_query("UPDATE employee SET firstname='".$_POST["firstname"]."', lastname='".$_POST["lastname"]."', email='".$_POST["email"]."', designation='".$_POST["designation"]."', city='".$_POST["city"]."', salary='".$_POST["salary"]."' WHERE id='".$_POST["editID"]."'");
		$_SESSION["edit"]="Data updated successfully.";
		header("Location:view_profile.php");
		
		break;
	
	default:
		echo "No action found.";
		break;
	
}

?>
