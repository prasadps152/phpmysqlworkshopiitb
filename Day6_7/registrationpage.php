<?php
  // Declarations
  @$name = trim(strip_tags($_POST['name']));
  @$rollno = trim(strip_tags($_POST['rollno']));
  @$password = strip_tags($_POST['password']);
  @$confirmpassword =strip_tags($_POST['confirmpassword']);
  @$submit = $_POST['submit'];

  if($submit)
  {
    if($password == $confirmpassword)
    {
      if(strlen($rollno) >2 || strlen ($name)>25)
        echo "Recheck your Roll No.(It should be maximum of 2 characters) and name(It should be maximum of 25 characters).";
      else
      {
        if(strlen($password) > 15 || strlen ($password)<6)
          echo "Password must be between 6 and 15 characters";
        else
        {
          $password = md5($password);
          $confirmpassword = md5($confirmpassword);

          $conn = mysqli_connect ("localhost","root","","studentinfo");
          $sql = "SELECT rollno,password FROM students WHERE rollno='$rollno'";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0)
          {
            if($row = mysqli_fetch_assoc($result))
            {
              if($row["password"])
                die("User has already registered<br><a href='resultportal.html'>Return to Home page</a>");
              else
              {
                $sql = "UPDATE student SET name='$name',password='$password' WHERE rollno='$rollno'";
                mysqli_query($conn, $sql);
                die("You Registered Successfully!<br> <a href = 'login.html'>Go to login page</a>");
              }
            }
          }
          else
          {
            $sql = "INSERT INTO student (id,name,rollno,password,php,mysql,html) VALUES ('','$name','$rollno','$password','','','')";
            mysqli_query($conn,$sql);
            die("You have been registered!<br><a href = 'login.html'><b>Go to login page</b></a>");
          }
        }
      }
    }
    else
      die("Incorrect password: Your passwords do not match.");
  }
?>

<html>
  <head>
    <title>REGISTRATION</title>
    <style>
      .h2{
        color:white;
      }

    </style>
  </head>
  <body style="background-color: #00FFFF;  font-family: Open, sans-serif;color: black;">
    <div style="text-align: center;
                background-color: #7FFF00;
                padding: 10px;
                border-radius: 10px;
                color: black;
                zoom: 2.1;
                -moz-transform: scale(2.0);
                width: 90%;
                height: 90%;
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);">
        

      <form action='registrationpage.php' method='POST'>
        <h2 class="h2">PUT YOUR REGISTRATION DETAILS CORRECTLY</h2>
       
    
            Your Full Name: <input type='text' name='name' value='<?php echo $name;  ?> ' required style="border-radius: 5px;"><br><br>
        
              
            Your Roll No:  <input type='text' name='rollno' value='<?php echo $rollno;  ?> ' required style="border-radius: 5px;"><br><br>
         
            Password: <input type='password' name='password' required style="border-radius: 5px;"><br><br>
          
            Confirm Password: <input type='password' name='confirmpassword' required style="border-radius: 5px;"><br><br>
            
            <input type='submit' name='submit' class="submit" value='Register' style="border-radius: 10px;margin: 10px;"></td>
       
      </form>
      <form action='index.html' method ='POST'>
        <input type='submit' name='index' class="index" value='Go to Home Page' style="border-radius: 10px; margin: 10px;"><br><br>
      </form>
    </div>
  </body>
</html>
