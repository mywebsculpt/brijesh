<?php
error_reporting(0);
	$string = trim("Some Random string");
	// string length
	$len = strlen($string);
	//echo $len;
	// make string array
	$stringExp = str_split($string);
	//echo '<pre>'; print_r($stringExp);
	// Loop through and print backwards
	for ($i = $len - 1; $i >= 0; $i--) {
		echo $stringExp[$i];
	}
	
	echo '<br /><br />';
?>

<?php
$str = "SPIDERMAN";
$len = strlen($str);
for($i=$len-1; $i>=0; $i--)
{
echo $str[$i];
}


echo '<br /><br />';
	
function rev($str) {
    return $str?rev(substr($str,1)).$str[0]:'';
}

echo $str = rev('Dhoom');



echo '<br /><br />';
$str = "M y N a m e i s F r e d";
$i = 0;
$temp = "";
$out = "";
while( $d = $str[$i] ) {
    if( $d == " "){
        $out = " ".$temp.$out;
        $temp = "";
    }else{
        $temp.=$d;
    }
    $i++;
}
echo $temp.$out;



echo '<br /><br />';


$a = 50;
$b = 100;
list($a, $b) = array($b, $a);
print 'I am $a = '.$a;
echo '<br />';
print 'I am $b = '.$b;


?>
