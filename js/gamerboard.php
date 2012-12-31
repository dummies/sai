<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Gamer Stats</title>
<script>
var seconds_left = <?php $min = date('i'); $sec = date('s'); $res = ( $min *60 + $sec ) %180; $left = 180 -$res; echo $left;?>;
var interval = setInterval(function() {
    document.getElementById('timer_div').innerHTML = --seconds_left;
    if (seconds_left <= 0)
    {
        document.getElementById('timer_div').innerHTML = "Game started";
        clearInterval(interval);
		window.location ="http://www.wordtrix.in/game.html" ;
    }
}, 1000);
</script>
<link href="/styles/coolMenu.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/styles/check_cs6.css" rel="stylesheet" type="text/css">
<link href="/styles/play.css" rel="stylesheet" type="text/css">
<script src="js/fb.js"> </script>
<script src="//connect.facebook.net/en_US/all.js"></script>
</head>

<body>
<div>
 <div style="background-color:#E7EBF2;height:auto;">
	<div class="container_16" style="background-color:#004080; height:90px; opacity:0.8" >
    <a href="http://www.wordtrix.in/">
        <img style="background-color:transparent;float:left" src="/images/logo-final.png">
    </a>
		<div align="right" style="margin-left: 800px">  
		<ul id="coolMenu" style="margin-top:40px;">
			<li id="user-info"><a href="#" onClick="loginUser();">login</a></li>
			<li>
				<a href="#">Settings</a>
				<ul class="noJS">
					<li><a href="#">profile</a></li>
					<li><a href="#">others</a></li>
					<li id="logout"><a href="#" onClick="logoutUser();">logout</a></li>
				</ul>
			</li>
		</ul>
		</div>
        <div style="float:right;">
        <img id="user_photo" height="50px" width="50px;" style="padding:30px;margin-right:90px;">
        <label id="user_name" style="position:relative;left:-115px;top:-40px;color:#FFF"> Hi ,Player </label>
        </div>
	</div>
<label style="font-size:24px;color:#408000;"  > next game : </label>
<label id="timer_div" style="font:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:36px; color:#408000;position:relative ; left: +100px;"></label>
<p><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:30px;color:#008055;"  > Gamer Statistics </label> </br></br></p>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > gamer score : </label></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > total words : </label></p>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size:26px;color:#408000;"  > bonus : </label></p>
</div>
<iframe src="http://www.wordtrix.in/js/rank.php" name="gamer board" frameborder="0" height="800" width="650" style="position: absolute; top: 0px; left: 700px;"></iframe>
<iframe src="http://www.wordtrix.in/js/unfound.php" name="unfound words" frameborder="0" height="400" width="400" style="position: absolute; top: 0px; left: 100px;top: 350px;">
</iframe>

</div>

</body>
</html>