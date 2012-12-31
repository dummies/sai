<?php
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
 $h =date('H');
 $m =date('i');
 //max time 23:59 
 $tmp = $h*20 + floor($m/3) ;
 //possible indexes , 1 2 3... 
 //max index - 23*20 + (59) /3 = 460 +19 =479 ;
 $tmp = ($tmp-1)*10 +1 ;
 //indexes  , 1 11 21 31..... ..max = 4781

 try
 {
$sqlq = "SELECT * FROM games";
/*$stmt = $conn->prepare($sqlq);
$stmt->bindValue(1, $tmp);*/
//$result =$stmt->execute();
$stmt = $conn->query($sqlq);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) 
{
/*echo "fuck me";
echo $result['id'];
echo $result['seq'];
echo "fucked";*/
 foreach($registrants as $registrant) 
		{
      if($tmp == $registrant['id'])
      echo $registrant['seq'];
		}
}

//sleep time would be 23 hr 59 mins ... => 23*60*60+59*60 = 4971540 seconds
}
 catch(Exception $e) 
 {
	 die($e);
 }
?>