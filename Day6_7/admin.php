<html>
  <head>
    <title>admin Page</title>
    <style>
      table{
        text-align: center;
        background-color: #7FFF00;
        padding: 20px;
        border-radius: 10px;
        color: black;
        zoom: 2.0 ;
        -moz-transform: scale(2.5);
      }
      #logout{
        width: 10em;  height: 3em;
        font-family: arial;
        font-size: 20px;
}
    </style>
  </head>
  <body style="background-color: #00FFFF; font-family: Open, sans-serif;color: white;">
    <h1 style="text-align: center; font-family: Open;padding-top: 10px; "><u>ADMIN PAGE </u></h1>
    <div class="table">
      <form action='admin.php' method='POST'>
        <table style="width:50%; text-align: center; margin: auto;">
          <tr>
            <td>Roll No. : </td>
            <td colspan="2"><input type= 'text' name = 'rollno' required style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td>PHP : </td>
            <td colspan="2"><input type= 'text' name = 'php' style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td>MYSQL : </td>
            <td colspan="2"><input type= 'text' name = 'mysql' style="border-radius: 5px;"></td>
          </tr>
          <tr>
            <td>HTML : </td>
            <td colspan="2"><input type= 'text' name = 'html' style="border-radius: 5px;"></td>
          </tr>
          <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
          <tr>
            <td><input type= 'submit' name='add' value = 'ADD' style="border-radius: 10px;"></td>
            <td><input type= 'submit' name='update' value = 'UPDATE' style="border-radius: 10px;"></td>
            <td><input type= 'submit'  name='delete' value = 'DELETE' style="border-radius: 10px;"></td>
          </tr>
        </table>
      </form>
    </div>
    <form action='index.html' method ='POST' style="text-align: right">
      <input type='submit' id="logout" name='logout' value='Log Out' style="border-radius: 10px;">
    </form>
  </body>
</html>

<?php
  session_start();

  // Declarations
  @$rollno = trim($_POST['rollno']);
  @$php = trim($_POST['php']);
  @$mysql = trim($_POST['mysql']);
  @$html = trim($_POST['html']);
  @$add = $_POST['add'];
  @$update = $_POST['update'];
  @$delete = $_POST['delete'];

  $conn = mysqli_connect("localhost", "root", "", "studentinfo") or die("Could't connect");
  $sql = 0;

  if(isset($_POST['add']))
  {
    $sql = "SELECT rollno FROM student WHERE rollno='$rollno'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "Roll No. : $rollno is entered already";
    }
    else
    {
      $sql = "INSERT INTO student (rollno, php, mysql, html)VALUES ('$rollno','$php','$mysql','$html')";
      if (mysqli_query($conn, $sql))
        echo "Record added successfully";
      else
        echo "Error adding record: " . mysqli_error($conn);
    }
  }

  if(isset($_POST['update']))
  {
    $sql = "UPDATE student SET php='$php',mysql='$mysql',html='$html' WHERE rollno='$rollno'";
    if (mysqli_query($conn, $sql))
      echo "Record updated successfully";
    else
      echo "Error updating record: ".mysqli_error($conn);
  }

  if(isset($_POST['delete']))
  {
    if($rollno!="admin")
    {
      $sql = "SELECT rollno FROM student WHERE rollno='$rollno'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 0)
        echo "Roll No. : $rollno is non existent.";
      else
      {
        $sql = "DELETE FROM student WHERE rollno='$rollno'";
        if (mysqli_query($conn, $sql))
          echo "Record deleted successfully";
        else
          echo "Error deleting record: ".mysqli_error($conn);
      }
    }
    else
      echo "Cannot delete admin";
  }

  if(isset($_POST['logout']))
  {
    header('Location: index.html');
  }

  mysqli_close($conn);
?>