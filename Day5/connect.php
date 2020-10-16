<?php

$servername="localhost";
$username="root";
$password="";
$dbname="data1";


//create connection

$con=new mysqli($servername,$username,$password,$dbname);

//check connection

if(!con){
	die("Connection failed:-".mysqli_connect_error());
}

echo "Connected successfully";

?>