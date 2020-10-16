<?php

$servername="localhost";
$username="root";
$password="";
$dbname="result";

//create connection

$conn=new mysqli($servername,$username,$password,$dbname);

//check connection

if(!conn){
	die("Connection failed:" .mysqli_connect_error());
}

echo "Connected succesfully";

?>