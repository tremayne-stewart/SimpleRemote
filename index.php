<!DOCTYPE>
<html>
<head>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="viewport" content="user-scalable=no, width=device-width" />
<script type="text/javascript" src="http://localhost/web/jquery.js"></script>
<style type="text/css">
*{margin:0;padding:0;}
.row
{
	background:yellow;
	height:33%;
	border:1px solid black;
}
.box
{
	border:1px solid green;
	width:33%;
	height:100%;
	background:green;
}
.left{float:left; background:red;}
.right{float:right; background:blue;}
.center{margin-left:33.33%;}

#sendText
{
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	background-color: rgba(0, 0, 0, 0.9);
	background: rgba(0, 0, 0, 0.9);
	color: rgba(0, 0, 0, 0.9);
	text-align:center;
	display:none;
}
#sendText h1,#sendText p {color:white;}

#passCode
{
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	background-color: rgba(0, 0, 0, 0.9);
	background: rgba(0, 0, 0, 0.9);
	color: rgba(0, 0, 0, 0.9);
	text-align:center;
	
}
#passCode h1,#passCode p {color:white;}

</style>
<script type="text/javascript">
var passCode;
function submitPasscode()
{
	var input=$("#passCode_input").attr("value");
	$.post("engine.php",{passcode:"",command:"passcode",content:input}, function(data){
		if(data=="accepted") // passcode accepted
		{
			passCode=input;
			$("#passCode").fadeOut(100);
		}
		else
		{
			$("#passCode_status").css({display:"none"}).html(data).fadeIn(100);
		}
		
	});
}
function sendText(control)
{
	if(control)
	{
		var input=$("#sendText_input").attr("value");
		//var input=document.getElementById("sendText_input").value
		alert(input);
	}
	else
		$("#sendText").fadeOut(100);
}
function showSendKey()
{
	$("#sendText").fadeIn(100);
}
function key(key,down)
{
	alert(key+":"+down);
}
$(document).ready(function()
{	
	
});
</script>
</head>
<body>
<?
	$pos = array("left","right","center");
	$num= array(1,3,2);
	for($r=0;$r<3;$r++)
	{
		echo "<div class=\"row\">\n";
		for($c=0;$c<3;$c++)
		{
			if(($r*3+$num[$c])==9)
				echo "\n\t<div class=\"box ".$pos[$c]."\"  onclick=\"showSendKey()\">".($r*3+$num[$c])."</div>";
			else
				echo "\n\t<div class=\"box ".$pos[$c]."\"  onclick=\"key(".($r*3+$num[$c]).",true)\">".($r*3+$num[$c])."</div>";
		}
		
		echo "\n</div>\n";
	}
?>
	<div id="sendText">
		<h1>Enter Text</h1>
		<p id="sendText_status"></p>
		<input id="sendText_input" type="text" ><br>
		
		<button id="sendText_submit"" onclick="sendText(true)">Send Text</button><br>
		<button id="sendText_submit" onclick="sendText(false)">Cancel</button>
	</div>
	<div id="passCode">
		<h1>Enter PassCode</h1>
		<p id="passCode_status"></p>
		<input id="passCode_input" type="text" ><br>
		<button onclick="submitPasscode()">Send Text</button><br>
	</div>
</body>
</html>
