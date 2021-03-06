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
		<link rel="stylesheet" type="text/css" href="mainStyle.css"/>
		<title>Confirmation</title>
	</head>
	<body>
		<h1>Confirmation</h1>
		<div class="tabs">
			<a id="tab" href="chooseContractor.php">Make an Appointment</a>
			<a id="tab" href="login.php">Contractor Login</a>
			<a id="tab" href="addContractor.php">Contractor Sign-up</a>
		</div>
		<hr/>
		<div class="body">
		<?php
			try {
				$query = 'INSERT INTO appoint (contractor_id, firstname, lastname, telephone, email, street, city, state, postal, time, message) 
				VALUES(:id, :firstname, :lastname, :telephone, :email, :street, :city, :state, :postal, :time, :message)';
					
				$statement = $_SESSION['db']->prepare($query);
				
				$statement->bindValue(':id', $_POST['id']);
				$statement->bindValue(':firstname', $_POST['firstname']);
				$statement->bindValue(':lastname', $_POST['lastname']);
				$statement->bindValue(':telephone', $_POST['telephone']);
				$statement->bindvalue(':email', $_POST['email']);
				$statement->bindvalue(':street', $_POST['street']);
				$statement->bindvalue(':city', $_POST['city']);
				$statement->bindvalue(':state', $_POST['state']);
				$statement->bindvalue(':postal', $_POST['postal']);
				$statement->bindvalue(':time', $_POST['time']);
				$statement->bindvalue(':message', $_POST['message']);
				
				$statement->execute();
						
				echo "<p>Appointment registered</p>";
				
				$statement = $_SESSION['db']->prepare('INSERT INTO occupy.time (contractor_id,  time) VALUES(:conid, :contime)');
				
				$statement->bindValue(':conid', $_POST['id']);
				$statement->bindvalue(':contime', $_POST['time']);
				
				$statement->execute();
				
				echo "<br><br>"
			}
			catch (Exception $ex) {
				echo "<p>Appointment did not register".$ex."</p>";
				echo "<button onclick='window.location.href = 'clientForm.php';'>Go back</button>";
				die();
			}
		?>
		</div>
	</body>
</html>
		
		
		
		
		