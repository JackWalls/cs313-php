<?php
	session_start();
	
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Client Form</title>
	</head>
	<body>
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
			First name	<input name="firstname" type="text">
			Last name 	<input name="lastname" type="text">
			Telephone# 	<input name="telephone" type="text">
			Email 		<input name="email" type="text">
			Street 		<input name="street" type="text">
			City		<input name ="city" type="text">
			State 		<input name ="state" type="text">
			Postal Code <input name ="postal" type="text">
						<br>
			<table>
				<tr>
					<th>Scheduler</th>
				</tr>
			<?php
				$id = $_POST['contractor'];
				
			?>
			</table>
			<input type="submit">
		</form>
	</body>
</html>
					
				
			
		