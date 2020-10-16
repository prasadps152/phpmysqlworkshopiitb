<?php
    
    if(isset($_POST['name'])&& isset($_POST['subject1']) && isset($_POST['subject2']) && isset($_POST['subject3']) && isset($_POST['subject4'])&& isset($_POST['subject5']) ){
    $name=$_POST['name'];
    $subject1 = $_POST['subject1'];
    $subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
    $subject5 = $_POST['subject5'];
    echo"<b>Name of Student*:</b> $name<br><br>
    <b>Marks in Each Subject</b><br><br>
    <b>Subject 1*:</b> $subject1/100<br><br>
    <b>Subject 2*:</b> $subject2/100<br><br>
    <b>Subject 3*:</b> $subject3/100<br><br>
    <b>Subject 4*:</b> $subject4/100<br><br>
    <b>Subject 5*:</b> $subject5/100<br><br>
    <b>Total Marks Obtained:</b><br><br>
    <b>Total Marks : </b>".($subject1+$subject2+$subject3+$subject4+$subject5)."/500<br><br>
    <b>Percentage : </b>".(($subject1+$subject2+$subject3+$subject4+$subject5)/5);
    

   }


?>