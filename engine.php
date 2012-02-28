<?php


$arg[]=$_POST['passcode'];
$arg[]=$_POST['command'];
$arg[]=$_POST['content'];

echo $arg[0]+":"+$arg[1];
if($arg[0]=="")//trying to check passcode
{
	
	//connect and submit passcode
	$fp = fsockopen( "localhost", 8002, $errno, $errdesc);
	if($fp)
	{
		
		fwrite($fp,"check "+$arg[2]);
	
	 	while (!feof($fp)) {
	        $ret=$ret.fgets($fp, 128);
    	}
		if($ret==0)
			echo "Incorrect PassCode";
		else echo "accepted";
	}else{echo "Server Not Running";}
}
else if(strlen($arg[0])>0)
{
	
}

/*
$fp = fsockopen( "localhost", 8008, $errno, $errdesc);
fwrite($fp,$arg[0]+" "+$arg[1]+" "+$arg[2]);
 while (!feof($fp)) {
        echo fgets($fp, 128);
    }
fclose($fp);*/
?>
