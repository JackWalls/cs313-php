<?php
	session_start();
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
	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	
	if (isset ( $_POST ['delete'] )) { 
		if (false !== $key = array_search($_POST['delete'], $_SESSION['cart'])) {
			unset($_SESSION['cart'][$key]);
		}
	}
?>

<DOCTYPE! html>
<html>
	<head>
		<title>Results</title>
	</head>
	<body>
		<?php
			if (isset ( $_SESSION ["cart"] )) {
		?>
		<form action="" method="post">
			<table>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
			<?php
				$total = 0;
				foreach ( $_SESSION['cart'] as $ino ) {
				?>
					<tr>
						<td> Name: <?php echo $items[$ino]['name']; ?></td>
						<td> Price: <?php echo $items[$ino]["price"]; ?></td>
						<td><button type='submit' name='delete' value='<?php echo $ino; ?>'>Remove</button></td>
					</tr>
					<?php
						$total += $items[$ino]['price'];
				}
					?>
			</table>
			Total: $<?php echo $total; ?>
			<input type="submit" value="Checkout">
		</form>
		<?php }
		else {
		?>
		<p> You have not items in cart</p>
		<?php }
		?>
		<form action="store.php>
			<input type="submit" value="Go back to Browse" />
		</form>
	</body>
</html>
		