<?php
    require("connect.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['name']) && isset($_POST['subject1']) &&  isset($_POST['subject2']) && isset($_POST['subject3']) && isset($_POST['subject4']) && isset($_POST['subject5'])){
            $total_obtained = $_POST["subject1"]+$_POST["subject2"]+$_POST["subject3"]+$_POST["subject4"]+$_POST["subject5"];
            $total_marks = 500;
            $percent = ($total_obtained/$total_marks)*100;
            $fet_data = $conn->prepare("SELECT * FROM class1 WHERE name=?");
            $fet_data->bind_param('s',$_POST["name"]);
            $fet_data->execute();
            $form = $fet_data->get_result();
            $value=$form->fetch_assoc();
            if($value['name']==$_POST['name']){
                $result = $conn->prepare("UPDATE class1 set sub1=?,sub2=?,sub3=?,sub4=?,sub5=?,totalobtained=?,percent=? where name=?");
                $result->bind_param('ssssssss',$_POST["subject1"],$_POST["subject2"],$_POST["subject3"],$_POST["subject4"],$_POST["subject5"],$total_obtained,$percent,$_POST["name"]);
                $result->execute();
                $fet_data = $conn->prepare("SELECT * FROM class1 WHERE name=?");
                $fet_data->bind_param('s',$_POST["name"]);
                $fet_data->execute();
                $form = $fet_data->get_result();
                echo "<pre>\n";
                while($value=$form->fetch_assoc()){
                    echo "Database Updated.<br>";
                    echo "Name of Student: ";
                    echo $value['name']."<br>";
                    echo "Marks in Each Subject<br>";
                    echo "Subject 1: ";
                    echo $value['sub1']."<br>";
                    echo "Subject 2: ";
                    echo $value['sub2']."<br>";
                    echo "Subject 3: ";
                    echo $value['sub3']."<br>";
                    echo "Subject 4: ";
                    echo $value['sub4']."<br>";
                    echo "Subject 5: ";
                    echo $value['sub5']."<br>";
                    echo "Total marks Obtained: ";
                    echo $value['totalobtained']."<br>";
                    echo "Total Marks: ";
                    echo $value['totalmarks']."<br>";
                    echo "Percentage: ";
                    echo $value['percent']."%<br>";
                }
                echo "</pre>";
            }
            else{
                $result = $conn->prepare("INSERT into class1(name,sub1,sub2,sub3,sub4,sub5,totalobtained,totalmarks,percent) values(?,?,?,?,?,?,?,?,?)");
                $result->bind_param('sssssssss',$_POST["name"],$_POST["subject1"],$_POST["subject2"],$_POST["subject3"],$_POST["subject4"],$_POST["subject5"],$totalobtained,$totalmarks,$percentage);
                $result->execute();
                sleep(2);
                $fet_data = $conn->prepare("SELECT * FROM class1 WHERE name=?");
                $fet_data->bind_param('s',$_POST["name"]);
                $fet_data->execute();
                $form = $fet_data->get_result();
                echo "<pre>\n";
                while($value=$form->fetch_assoc()){
                    echo "Name of Student: ";
                    echo $value['name']."<br>";
                    echo "Marks in Each Subject<br>";
                    echo "Subject 1: ";
                    echo $value['sub1']."<br>";
                    echo "Subject 2: ";
                    echo $value['sub2']."<br>";
                    echo "Subject 3: ";
                    echo $value['sub3']."<br>";
                    echo "Subject 4: ";
                    echo $value['sub4']."<br>";
                    echo "Subject 5: ";
                    echo $value['sub5']."<br>";
                    echo "Total marks Obtained: ";
                    echo $value['totalobtained']."<br>";
                    echo "Total Marks: ";
                    echo $value['totalmarks']."<br>";
                    echo "Percentage: ";
                    echo $value['percent']."%<br>";
                }
                echo "</pre>";
            }
        }
    } 
?>


<html>
<body>
<form method="post">
Name of the student:<input type="text" name="name"><br><br>
Subject1:*<input type="number" name="subject1" required><br><br>
Subject2:*<input type="number" name="subject2"><br><br>
Subject3:*<input type="number" name="subject3"><br><br>
Subject4:*<input type="number" name="subject4"><br><br>
Subject5:*<input type="number" name="subject5"><br><br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>