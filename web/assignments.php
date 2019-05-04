<DOCTYPE! html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mainStyle.css"/>
		<script>
			function jump() {
			var assign = document.getElementById("assignments");
			var value = assign.options[assign.selectedIndex].value;
			var header = document.getElementById(value);
			header.scrollIntoView(); 
			}
		</script>
		<title>Assignments</title>
	</head>
	<body>
		<h1>Assignments</h1>
		<div class="tabs">
			<a id="tab1" href="homepage.php">Homepage</a>
			<a id="tab2" href="assignments.php">Assignments</a>
		</div>
		<hr/>
		<div class="stick">
		<span>
			<select name="Assignments" id="assignments">
				<option value="assign1">Week1</option>
				<option value="assign2">Week2</option>
				<option value="assign3">Week3</option>
			</select>
		</span>
			<button name="Jump" onclick="jump()"/>Jump to</button>
		</div>
		<div class="body">
		<h2 class="headers" id="assign1">Week 1:</h2>
		<a class="homework" href="hello.html">Hello World</a>
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<h3 class="headers" id="assign2">Week 2:</h3>
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<h4 class="headers" id="assign3">Week 3:</h4>
		</div>
		<div id="php">
		<span>Current Date: </span>
		<?php
		echo date("D M d, Y G:i a");
		?>
		</div>
		<br/>
	<body>
</html>