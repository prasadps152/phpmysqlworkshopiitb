<?php
  session_start();
  // Declarations
  $rollno = $_SESSION['rollno'];

  // Logged in check
  if($rollno)
  {
    if(@$_POST['submit'])
    {
      // Declarations
      @$oldpw = md5($_POST['oldpw']);
      @$newpw = $_POST['newpw'];
      @$renewpw = $_POST['renewpw'];

      $conn = mysqli_connect("localhost","root","","studentinfo");
      $queryget = mysqli_query($conn, "SELECT password FROM student WHERE rollno='$rollno'");
      $row = mysqli_fetch_assoc($queryget);

      $oldpwdb = $row['password'];

      if($oldpw ==$oldpwdb)
      {
        if($newpw == $renewpw)
        {
          $newpw = md5($newpw);
          $querychange = mysqli_query($conn, "UPDATE student SET password='$newpw' WHERE rollno='$rollno'");
          session_destroy();
          die("Password changed successfully<br> <a href='loginpage.html'>Return to the login</a> ");
        }
        else
          die("New Passwords do not match");
      }
      else
        die("Old password does not match");
    }
  }
  else
    die("You must be logged in to change your password");
?>


<html>
  <head>
    <title>Change Password</title>
  </head>
  <body style="background-color: #00FFFF;  font-family: Open, times;color: white;">
    <div style="text-align: center;
              background-color: #7FFF00;
              padding: 10px;
              border-radius: 10px;
              color: black;
              zoom: 2.2;
              -moz-transform: scale(2.0);
              width: 75%;
              height: 75%;
              margin: 0;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);">
                <h2>Change Password</h2>
      <form action='changepw.php' method='POST'>
        <table style='margin: auto;'>
          <tr>
            <td>Old password: </td>
            <td><input type='password' name='oldpw' style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td>New password: </td>
            <td><input type='password' name='newpw' style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td>Confirm password: </td>
            <td><input type='password' name='renewpw' style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td colspan='2'><input type='submit' name='submit' value='Change password' style="border-radius: 10px; margin: 10px;"></td>
          </tr>
        </table>
      </form>
      <form action='index.html' method ='POST'>
        <input type='submit' name='index' value='Go to Home Page' style="border-radius: 10px; margin: 10px;"><br><br>
      </form>
    </div>
  </body>
</html>
