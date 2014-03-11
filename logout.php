<?php
session_start();
unset($_SESSION["UID"]);
$_SESSION["logout"]="Successfully Logout.";
header("Location:index.php");
?>