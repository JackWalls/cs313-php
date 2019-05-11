<?php
	
	$items = array (
        'A123' => array (
                'name' => 'Item1',
                'desc' => 'Item 1 description...',
                'price' => 1000 
        ),
        'B456' => array (
                'name' => 'Item40',
                'desc' => 'Item40 description...',
                'price' => 2500 
        ),
        'Z999' => array (
                'name' => 'Item999',
                'desc' => 'Item999 description...',
                'price' => 9999 
        ) 
);
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Store Page</title>
	</head>
	<body>
		
		<?php
			foreach($items as $ino => $item) {
			
				echo "<p>$item['name']</p>";
				
			}
    ?>
		</form>
	</body>
</html>