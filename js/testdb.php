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
	$sql_select = "SELECT * FROM games order by id";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0)
	{
        echo "<h2>People who are registered:</h2>";
        echo "<table>";
        echo "<tr><th>ID</th>";
        echo "<th>Sequence</th>";
		$i=0;
        foreach($registrants as $registrant) 
		{
            echo "<tr><td>".$registrant['id']."</td>";
            echo "<td>".$registrant['seq']."</td>";
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3>No one is currently registered.</h3>";
    }

?>
</body>
</html>