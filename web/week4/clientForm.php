<?php
	session_start();
	try {
		$dbUrl = getenv('DATABASE_URL');

		$dbOpts = parse_url($dbUrl);

		$dbHost = $dbOpts["host"];
		$dbPort = $dbOpts["port"];
		$dbUser = $dbOpts["user"];
		$dbPassword = $dbOpts["pass"];
		$dbName = ltrim($dbOpts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		
		$_SESSION['db'] = $db;

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex) {
		echo 'Error!: ' . $ex->getMessage();
		die();
	}
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Client Form</title>
	</head>
	<body>
		<form action="insertCheck.php" method='post'>
			First name	<input name="firstname" type="text">
			Last name 	<input name="lastname" type="text">
			Telephone# 	<input name="telephone" type="text">
			Email 		<input name="email" type="text">
			Street 		<input name="street" type="text">
			City		<input name ="city" type="text">
			State 		<input name ="state" type="text">
			Postal Code <input name ="postal" type="text">
			Message  	<input name ="message" type="text">
			<?php
				echo"<input type='hidden' name='id' value='".$_POST['contractor']."'>";
			?>
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
					foreach ($_SESSION['db']->query("SELECT time FROM occupy.time WHERE contractor_id='$id'") as $row) {
						$check = explode(":", $row['time']);
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
					
				
			
		