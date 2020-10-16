<html>
<body>
<?php

$a=array(
	array(1,0,1),
	array(4,5,6),
	array(1,2,3),

);
$b=array(
	array(1,1,1),
	array(2,3,1),
	array(1,5,1),
);

$rows=count($a);
$cols=count($a[0]);

$sum=array_fill(0,$cols,array_fill(0,$rows,0));
for($i=0;$i<$rows;$i++){
	for($j=0;$j<$cols;$j++){
		$sum[$i][$j]=$a[$i][$j]+$b[$i][$j];
	}

}

print("Addition of two matrices are:<br><br>");
for($i=0;$i<$rows;$i++){
	for($j=0;$j<$cols;$j++){
		print($sum[$i][$j]." ");
	}
	print("<br>");
}

?>
</body>
</html>
	