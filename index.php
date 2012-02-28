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
</style>
<script type="text/javascript">
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
			echo "\n\t<div class=\"box ".$pos[$c]."\"  onclick=\"key(".($r*3+$num[$c]).",true)\">".($r*3+$num[$c])."</div>";
		}
		
		echo "\n</div>\n";
	}
?>
</body>
</html>
