<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="q3.php" method="post">
        Enter the number: <input type="number" name="num"><br><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>

<?php
    if(isset($_POST['submit'])){
        $n = $_POST['num'];
        $sum = 0;
        while($n>0){
            $rem = $n%10;
            $sum = $sum + $rem;
            $n = $n/10;
        }
        echo "The sum of number is " . $sum;
    }
?>