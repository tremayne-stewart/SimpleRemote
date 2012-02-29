<?php


$arg[]=$_POST['passcode'];
$arg[]=$_POST['command'];
$arg[]=$_POST['content'];


if($arg[0]=="")//trying to check passcode
{
	
	//connect and submit passcode
	$fp = fsockopen( "localhost", 8005, $errno, $errdesc);
	if($fp)
	{
		
		fwrite($fp,"check ".$arg[2]);
	
	 	while (!feof($fp)) {$ret=$ret.fgets($fp, 128);} // get acceptance resonse from server
		if($ret=="0")
			echo "Incorrect PassCode";
		else echo "accepted";
		fclose($fp);
	}else{echo "Server Not Running";}
}
else if(strlen($arg[0])>0)
{
	$fp = fsockopen( "localhost", 8005, $errno, $errdesc);
	if($fp)
	{
		
		fwrite($fp,$arg[0]." ".$arg[1]." ".$arg[3]);
		fclose($fp);
	}else{echo "Server Not Running";}
}

/*
$fp = fsockopen( "localhost", 8008, $errno, $errdesc);
fwrite($fp,$arg[0]+" "+$arg[1]+" "+$arg[2]);
 while (!feof($fp)) {
        echo fgets($fp, 128);
    }
fclose($fp);*/
?>
