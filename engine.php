<?php


$arg[]=$_POST['passcode'];
$arg[]=$_POST['command'];
$arg[]=$_POST['content'];

$fp = fsockopen( "localhost", 8008, $errno, $errdesc);
fwrite($fp,$arg[0]+" "+$arg[1]+" "+$arg[2]);
 while (!feof($fp)) {
        echo fgets($fp, 128);
    }
fclose($fp);
?>
