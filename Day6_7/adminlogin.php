<?php
  session_start();

  // Declarations
  $rollno = trim($_POST['rollno']);
  $password = trim($_POST['password']);


  if($rollno=="admin" && $password=="admin")
  {
    $_SESSION['rollno'] = $rollno;
    $_SESSION['password'] = $password;
    header('Location: admin.php');
    
  }
   else{
      echo "Incorrect password! <br> <a href='adminlogin.html'>Try again</a>";
   }

?>