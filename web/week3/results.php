<DOCTYPE! html>
<html>
	<head>
		<title>Results</title>
	</head>
	<body>
<?php

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

  // User Details variables (feel free to adjust variable names where appropriate)
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $major = test_input($_POST["major"]);
  $comments = test_input($_POST["comments"]);

  // Displaying User Details
  echo "Your name: " . $name;
  echo <br>
  echo "Your email: " . $email;
  echo <br>
  echo "Your major: " . $major;
  echo <br>
  echo "Your comments: " . $comments;
  echo <br>

  //Continents Variables
  $northAmerica = test_input($_POST["na"]);
  $southAmerica = test_input($_POST["sa"]);
  $europe = test_input($_POST["eu"]);
  $asia = test_input($_POST["as"]);
  $australia = test_input($_POST["au"]);
  $africa = test_input($_POST["af"]);
  $antartica = test_input($_POST["an"]);

  //Displaying Continents Visited

  //if no continents are checked
  if (!isset($northAmerica) && !isset($southAmerica) && !isset($europe) && !isset($asia) && !isset($australia) && !isset($africa) && !isset($antartica)) {
    echo "\n\nUser has not visited any continents :(\n";
  } else {
    echo "\n\nContinents Visited: \n"; //when at least one is checked
  }

  // displating each checked continent
  if (isset($northAmerica)) {
    echo "North America\n";
	echo <br>
  }
  if (isset($southAmerica)) {
    echo "South America\n";
	echo <br>
  }
  if (isset($europe)) {
    echo "Europe\n";
	echo <br>
  }
  if (isset($asia)) {
    echo "Asia\n";
	echo <br>
  }
  if (isset($australia)) {
    echo "Australia\n";
	echo <br>
  }
  if (isset($africa)) {
    echo "Africa\n";
	echo <br>
  }
  if (isset($antartica)) {
    echo "Antarctica\n";
	echo <br>
  }
?>
	</body>
</html>
