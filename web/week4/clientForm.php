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
				$count = 9;
				$half = false;
				for ($i = 0; $i <= 16; $i++) {
					$open = true;
					foreach ($_SESSION['db']->query('SELECT time FROM occupy.time WHERE contractor_id="$id"') as $row) {
						echo "<tr><td>hey</tr></td>";
						$check = explode(":", $row['time']);
						echo "<tr><td> ".check[0].check[1]."</td></tr>"; 
						if ($check[1] == 30) {
							$halfCheck = true;
						}
						if ($count == $check[0] && $half == $halfCheck) {
							$open = false;
						}
					}
					if ($count > 12) {
						$time = $count - 12;
					}
					//echo "<p>Phase 2</p>";
					else {
						$time = $count;
					}
					if ($open == false) {
						if ($half == true) {
							$half = false;
							echo "<tr><td id = 'closed'>" . $time . ":30</td></tr>";
							$count = $count + 1;
						}
						else {
							$half = true;
							echo "<tr><td id = 'closed'>" . $time . ":00</td></tr>";
						}
					}
					else {
						if ($half == true) {
							$half = false;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time.":30'>" . $time . ":30</td></tr>";
							$count = $count + 1;
						}
						else {
							$half = true;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time.":00'>" . $time . ":00</td></tr>";
						}
					}
				}
			?>
			</table>
			<input type="submit">
		</form>
	</body>
</html>
					
				
			
		