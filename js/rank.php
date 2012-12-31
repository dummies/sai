<html>
<head>

<?php /*?><style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style><?php */?>

</head>
<body>
<?php  set_time_limit(0); ?>
 <img style="background-color:transparent;float:left" src="/images/board.PNG" width="100" height="100">
<br><br><br><label style="font-size:30px;color:#7BA6B4;"  > Gamer Board </label> </br></br></br>
<br/>
<?php
   
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
	sleep(5);
    $sql_select = "SELECT * FROM scores order by Score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
	//var_dump($registrants);
	//echo "<br/> I am fetching <br/> ";
    if(count($registrants) > 0)
	{
		//echo count($registrants);
        echo "<table>";
        echo "<tr><th style='color:#0000A0'>Rank</th>";
        echo "<td><th style='color:#0000A0'>Gamer</th></td>";
        echo "<th><td><td><th style='color:#0000A0'>Score</th></td></td></th></tr>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			//var_dump($registrant);
			if($prev!=$registrant['Score'])	
			{
			$i=$i+1;
			$prev=$registrant['Score'];
			}
            echo "<tr><td style='color:#0000A0'>".$i."</td>";
			echo "<td><td style='color:#0000A0'>".$registrant['Name']."</td></td>";
            echo "<td><td><td><td style='color:#0000A0'>".$registrant['Score']."</td></td></td></td></tr>";
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3> <font color='#0000A0'>Oops! Looks like it's sleeping time, nobody is playing :) </font></h3>";
    }
	
	//echo "<br/>I am closing<br/>";

	
?>
</body>
</html>