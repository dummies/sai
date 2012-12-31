<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
    echo "dbpushe";
	$host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";
    try 
	{
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e)
	{
        die(var_dump($e));
    }
	$list=array('E','E','E','E','E','E','T','T','T','A','A','A','O','O','O','I','I','I','N','N','N','S','S','S','S','R','R','R','H','H','L','L','D','D','D','D','C','C','U','U','M','M','F','P','G','W','Y','B','V','K','X','J','Q','Z');
$vow=array('A','E','I','O','U');
$con=array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
/*$sql1 = "CREATE TABLE games(id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),seq VARCHAR(16))";
$conn->query($sql1);*/
ignore_user_abort(true);//if caller closes the connection (if initiating with cURL from another PHP, this allows you to end the calling PHP script without ending this one)
set_time_limit(0);
//no of games to generate
$limit = 480;
$hLock=fopen(__FILE__.".lock", "w+");
if(!flock($hLock, LOCK_EX | LOCK_NB))
    die("Already running. Exiting...");
while(true) 
{
$sql3 = "TRUNCATE TABLE games";
$conn->query($sql3);
   try 
	{
		$j =0;
		while($j < $limit) {
		$puzzle ="";
		if(mt_rand()%2==0)
		{
			for($i=0; $i <4;$i++)
		{
			$puzzle .= $list[mt_rand()%54];
			$puzzle .= $vow[mt_rand()%5];
			$puzzle .= $con[mt_rand()%21];
			$puzzle .= $vow[mt_rand()%5];
		}
		}
		else
		{
			for($i=0; $i <4;$i++)
		{
			$puzzle .= $vow[mt_rand()%5];
			$puzzle .= $con[mt_rand()%21];
			$puzzle .= $vow[mt_rand()%5];
			$puzzle .= $list[mt_rand()%54];
		}
		}
		
		$sql_insert = "INSERT INTO games(seq) 
                   VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $puzzle);
        $stmt->execute();
		$j++;
		}
        
    }
    catch(Exception $e)
    {
        die(var_dump($e));
    }
	sleep(4971540);
}
flock($hLock, LOCK_UN);
fclose($hLock);
unlink(__FILE__.".lock");
?>
</body>
</html>