<html>
<form action="q1_md5.php" method="POST">
	Username:<input type="text" name="name"><br><br>
	Password:<input type="Password" name="password"><br><br>
	<input type="submit">
</form>
</html>
<?php
require("connect.php");
$n="";
if(isset($_POST['name'],$_POST['password']))
{
	$na=$_POST['name'];
	$pass=$_POST['password'];
	$enc=md5($pass);
	if($na && $pass)
             {
	$query ="INSERT INTO userc (username,password_enc)VALUES('$na','$enc')";
	$up=mysqli_query($con,$query);
	if($up)
	   {  	echo"<br>"; 
	              echo "Data inserted successfully";
	   }
	else
	  {
	          echo "<br/>";
	          echo "Error:".mysqli_error($con);
	  } 
            }
}

?>
