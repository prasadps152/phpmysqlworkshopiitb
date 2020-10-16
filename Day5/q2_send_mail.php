<html>
<head>
	<title>Feedback form</title>
</head>
<body>
	<form action="q2_send_mail.php" method="POST">
		To:<input type="text" name="to"><br><br>
		Subject:<input type="text" name="sub"><br><br>
		Feedback:<input type="text" name="feed"><br><br>
		<input type="submit" name="submit" value="send">
			</form>
		</body>
		</html>
		<?php

		if(isset($_POST['to']) && isset($_POST['sub']) && isset($_POST['feed'])){
			$to=$_POST['to'];
			$subject=$_POST['sub'];
			$feedback=$_POST['feed'];
			// $headers = "From: patilprasad152000@gmail.com" . "\r\n" ."CC: pp364965@gmail.com";
    	ini_set("SMTP","ssl:smtp.gmail.com" );
    	ini_set("smtp_port","465");
    	// $succ=;
    	if(mail('patilprasad152000@gmail.com',$subject,$feedback)){
      echo"<br>Mail Sent successfully to $to <br>";
      $sub="Thankyou for giving us your valuable feedback we will respond back to you for confirmation";
      mail($to,'Thanks For your valuable feedback',$subject);
    }
    else{
      echo"<br>Mail not Sent to $to <br>";
    }

}

?>

		