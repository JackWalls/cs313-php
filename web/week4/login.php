<?php
	session_start();
?>

<DOCTYPE! html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mainStyle.css"/>
		<title>Login</title>
	</head>
	<body>
		<h1>Enter your Name and ID Number</h1>
		<div class="tabs">
			<a id="tab" href="chooseContractor.php">Make an Appointment</a>
			<a id="tab" href="login.php">Contractor Login</a>
			<a id="tab" href="addContractor.php">Contractor Sign-up</a>
		</div>
		<hr/>
		<div class="body">
		<form action='showAppointments.php' method='post'> 
			Name <input name="name" type="text"><br>
			ID#  <input name="id" 	type="text"><br>
			<input type="submit"><br><br>
		</form>
		</div>
	</body>
</html>
