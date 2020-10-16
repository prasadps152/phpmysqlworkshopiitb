<html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<title>String functions in php</title>
</head>
<body>
	<form action="q2_string_functions.php" method="post">

		Enter a String:*<input type="text" name="string">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>
<?php

if(isset($_POST['string']) ){
	$string=$_POST['string'];
	$count=count_chars($string,3);
	echo "Number of characters in string are:-".strlen($count);

	echo "<br><br>To break string into array:-";
	print_r (explode(" ",$string));

	echo "<br><br>To reverse a string:-".strrev($string);

	echo "<br><br>To convert uppercase aplhabetic characters into lowercase characters:".strtolower($string);

	echo "<br><br>To convert lowercase aplhabetic characters into uppercase characters:".strtoupper($string);

	$string1="i am using php language";


	echo "<br><br>6.Declare a substring and replace the content of substring into original string :".str_replace($string,$string1,$string);

}

?>