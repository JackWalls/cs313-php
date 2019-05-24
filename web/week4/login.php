<?php
	session_start();
?>

<DOCTYPE! html>
<html>
	<head>
		<title>Client Form</title>
	</head>
	<body>
		<h1>Enter your Name and ID Number</h1>
		<form action='showAppointments.php' method='post'> 
			Name <input name="name" type="text">
			ID#  <input name="id" 	type="text">
			<input type="submit">
		</form>
	</body>
</html>
