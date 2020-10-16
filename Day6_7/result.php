<?php
  session_start();

  // Declarations
  $rollno = $_SESSION['rollno'];

  $conn = mysqli_connect("localhost", "root", "", "studentinfo") or die("Could't connect");

  $sql = "SELECT name, rollno, php, mysql, html FROM student WHERE rollno='$rollno'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0)
  {
    $row = mysqli_fetch_assoc($result);
    $name =  $row["name"];
    $php =  $row["php"];
    $mysql =  $row["mysql"];
    $html =  $row["html"];
    $total = $php + $mysql + $html;
    $percentage = round($total/3,2);
  }
  else
    echo "Result not available yet!";

  mysqli_close($conn);

  if(@$_POST['submit'])
  {
    @$to = $_POST['mailid'];
    $admin= "@gmail.com"; //****insert admin email id****
    if($to)
  	{
  			ini_set("SMTP","smtp.gmail.com");
  			ini_set("smtp_port","587");
  			//setup variables
  			$subject = "Course result";
  			$headers="From: $admin";
  			$body ="Hello $name.\nFollowing is your Course result.\n\n Name: $name\n Roll No.: $rollno\n Marks:\n
          PHP : $php/100 \n
          MYSQL : $mysql/100 \n
          HTML : $html/100 \n
      TOTAL : $total/300 \n
      AGG. PERCENTAGE : $percentage";

  			mail($to, $subject, $body, $headers);
        echo "Mail sent successfully.";
    }
    else
  	 echo "You must enter a Email id.";
  }

  if(@$_POST['logout'])
  {
    header('Location: logout.php');
  }
?>

<html>
  <head>
    <title>Marksheet of Result</title>
    <style>
      table, th, td {
        border: 1px solid black;
      }
      .logout{
        width: 10em;  height: 3em;
        font-family: arial;
        font-size: 18px;
}
.mail{
        width: 10em;  height: 3em;
        font-family: arial;
        font-size: 12px;
}
    </style>
  </head>
  <body style="background-color: #00FFFF;  font-family: Open, sans-serif;color: black;text-align: center;">
    <br>
    <div style="text-align: center;
                background-color: #7FFF00;
                padding: 10px;
                border-radius: 10px;
                color: white;
                width: 70%;
                height: 75%;
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);">
      <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;"><u>Student Marksheet</u></h2>
      <p style="text-align: center;">Name : <b><?php echo $name; ?></b><br>Roll No. : <b><?php echo $rollno; ?></b><br><br></p>
      <table style="width:60%; text-align: center; margin: auto;">
        <tr>
          <th>SUBJECT</th>
          <th>MARKS OBTAINED</th>
          <th>MAXIMUM MARKS</th>
        </tr>
        <tr>
          <td><b>PHP</b></td>
          <td><?php echo $php; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>MYSQL</b></td>
          <td><?php echo $mysql; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>HTML</b></td>
          <td><?php echo $html; ?></td>
          <td>100</td>
        </tr>
        <tr>
          <td><b>TOTAL</b></td>
          <td><b><?php echo $total; ?></b></td>
          <td><b>300</b></td>
        </tr>
        <tr>
          <td colspan="3"><b>Agg. Percentage : <?php echo $percentage." %"; ?></b></td>
        </tr>
      </table>
      <h3 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">
      <?php
        if($percentage >=60)
          echo "CONGRATULATIONS ".strtoupper($name);
      ?>
      </h3>
      <br>
      <form action='result.php' method='POST'>
        Enter your E-mail id: <input type='text' name='mailid' style="border-radius: 5px;"><br><br>
        <input type='submit' name='submit' class="mail" value='Mail Result' style="border-radius: 10px;"><br><br>
      </form>
      <a href='changepassword.php'>Change password</a>
      <form action='index.html' method ='POST'>
        <input type='submit' name='logout' class="logout" value='Log Out' style="border-radius: 10px; margin: 10px;"><br><br>
      </form>
    </div>
  </body>
</html>