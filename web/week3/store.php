<?php
	session_start();

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	
	if (isset ( $_POST ["buy"] )) {
		if (!in_array($_POST ["buy"], $_SESSION['cart'])) {
			$_SESSION ['cart'][] = $_POST["buy"];
		}
	}
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Store Page</title>
	</head>
	<body>
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
		<?php
		$items = array (
        'item1' => array (
                'name' => 'French Macarons',
                'desc' => 'Sweet meringue based cookies, comes in a dozen',
                'price' => 14.99 
        ),
        'item2' => array (
                'name' => 'Assorted Brownies',
                'desc' => 'Assortment of brownies of different flavors, comes in a dozen',
                'price' => 15.99
        ),
        'item3' => array (
                'name' => 'Biscotti',
                'desc' => 'Italian almond biscuits, comes in a pack of 15',
                'price' => 9.99 
        )
	);
        foreach($items as $ino => $item) {
			
            echo "$item['name']";
			

			if(in_array($ino, $_SESSION['cart'])) {
				echo "Item already selected";
            } 
			else {
                echo "<button type='submit' name='buy' value='$ino'>Buy</button> ";
            }
        }
		var_dump($items);
		echo "hello";
    ?>
		</form>
	</body>
</html>