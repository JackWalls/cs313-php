<DOCTYPE! html>
<html>
	<head>
		<title>Store Page</title>
	</head>
	<body>
		
		<?php
		$arr_nav = array( array( "id" => "apple", 
          "url" => "apple.html",
          "name" => "My Apple" 
        ),
        array( "id" => "orange", 
          "url" => "orange/oranges.html",
          "name" => "View All Oranges",
        ),
        array( "id" => "pear", 
          "url" => "pear.html",
          "name" => "A Pear"
        )       
 );
	

$last = count($arr_nav) - 1;

foreach ($arr_nav as $i => $row)
{
    $isFirst = ($i == 0);
    $isLast = ($i == $last);

    echo "$row['name']";
}


    ?>
		</form>
	</body>
</html>