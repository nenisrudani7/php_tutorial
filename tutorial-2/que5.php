<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="que5.php" method="post">
    enter number: <input type="number" name="num" id="">
    <br>
    <input type="submit" value="submit" name="btn">
    </form>

</body>
</html>
<?php
    if(isset($_POST['btn'])){
        $num=$_POST['num'];
        $a='';
        for($i=1;$i<=10;$i++){
            $a=$a.$num.'*'.$i."=".($num*$i)."<br>";
        }
        echo $a;
    }
?>
