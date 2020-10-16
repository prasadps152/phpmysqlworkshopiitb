
<!DOCTYPE html>
<html>
    <body>
        <form  method='GET' >
            <label for="s1">Enter side1:</label><br>
            <input type="text"  name="s1"><br><br>
            <label for="s2">Enter side2:</label><br>
            <input type="text" name="s2"><br><br>
            <label for="s3">Enter side3:</label><br>
            <input type="text" name="s3"><br><br>
            <input type="submit" value="Submit"><br><br>
        </form>
    </body>
</html>
<?php
    
    if(isset($_GET['s1']) && isset($_GET['s2']) && isset($_GET['s3']) ){
    
    $s1 = $_GET['s1'];
    $s2 = $_GET['s2'];
    $s3 = $_GET['s3'];
  
   if ($s1==$s2 && $s2== $s3 ){
    echo "The Triangle is Equilateral triangle";
    } elseif ($s1==$s2 || $s1==$s3 || $s2==$s3){
        echo "The Triangle is Isosceles triangle";
   } else {
        echo "The Triangle is Scalene triangle";
    }

   }


?>