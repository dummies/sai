<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
try
{
/*$command ="schtasks /create /tn "dbpushgame" \\js\dbpushgame.php /sc minute /st 12:40 /ed 31/12/2100";*/
$command = "schtasks /create /sc minute /mo 1 /tn \"dbgamepush\" /tr C:\sites\Addiction-Words\js\dbgamepush.php";
$output = shell_exec($command);
echo "output is ".$output;
}
catch(Exception $e) 
{
	die($e);
}
echo "success!";
?>

</body>
</html>