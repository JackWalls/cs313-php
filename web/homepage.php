<DOCTYPE! html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mainStyle.css"/>
		<title>Homepage</title>
	</head>
	<body>
		<h1>Jose Paredes</h1>
		<div class="tabs">
			<a id="tab1" href="link">Homepage</a>
			<a id="tab2" href="link">Assignments</a>
		</div>
		<hr/>
		<img class="bodyImage"
		src="Trail.jpg" alt="Trail picture"/>
		<div class="body">
			<p>Welcome to my site, as the title suggests my name is Jose Paredes. This site will
			primarily be used as a hub for my assignments for CS313 class that I am currently taking.
			</p>
			<p>Beyond that I guess an interest that I have that I can share is in hiking.
			I do it every saturday or so. I mainly go to a nearby regional park on the weekdays 
			and head up to a mountain trail on saturdays whenever I can. For the most part I go alone but 
			sometimes I have friends with me. I mostly enjoy it since it gives me an opportunity to zone 
			out everything else and life and reflect on how I'm doing so far.
			</p>
		</div>
		<div>
		<span>Current Date: </span>
		<?php
		echo date("D M d, Y G:i a");
		?>
		</div>
		<br/>
	<body>
</html>