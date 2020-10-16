<?php
  session_start();

  // Declarations
  $rollno = trim($_POST['rollno']);
  $password = md5($_POST['password']);

  $conn = mysqli_connect("localhost","root","","studentinfo") or die("Could't connect");
  if($rollno=="admin" && $password=="200ceb26807d6bf99fd6f4f0d1ca54d4")
  {
    $_SESSION['rollno'] = $rollno;
    header('Location: admin.php');
  }
  else
  {
    $sql = "SELECT rollno, password FROM student WHERE rollno='$rollno'";
    $query = mysqli_query($conn,$sql);
    $numrows = mysqli_num_rows($query);

    if($numrows != 0)
    {
      $row= mysqli_fetch_assoc($query);
      $rollno = $row['rollno'];
      $password = $row['password'];

      if($rollno == $rollno && $password==$password)
      {
        $_SESSION['rollno'] = $rollno;
        header('Location: result.php');
      }
      else
        echo "Incorrect password <br> <a href='login.html'>Try again</a>";
    }
    else
      die("User does not exist");
  }
  mysqli_close($conn);
?>