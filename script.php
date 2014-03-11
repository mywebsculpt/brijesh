<?php

$conn = mysql_connect('localhost','root','');
mysql_select_db('cakedatabase', $conn);

$SQL = "SELECT * FROM pages WHERE type IN(0,1)";
$result = mysql_query($SQL);

$setUrl = '';
if($result) {
	while($temp = mysql_fetch_array($result)){
		$setUrl = 'http://d1491836.v196.websculpt.net/amethyst-business-services/'.$temp['seotitle'].'/'.$temp['id'];
		$query = mysql_query("UPDATE pages SET seourltext = '".$setUrl."' WHERE id = ".$temp['id']);
		if($query){
			echo 'Success.';
		}else{
			echo 'Not Success.';
		}
	}
}

?>
