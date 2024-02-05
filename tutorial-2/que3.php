<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="que3.php" method="post">
        Enter the number <input type="number" name="num">
        <input type="submit" name="btn">
    </form>
</body>

</html>
<?php
if (isset($_POST['btn'])) {
    $num = $_POST['num'];
    
    $sum = 0;

    for ($i = 2; $i < $num; $i++) {
        $flag = true;

        for ($j = 2; $j <= sqrt($i); $j++) {
            if ($i % $j === 0) {
                $flag = false;
                break;
            }
        }

        if ($flag) {
            $sum += $i;
        }
    }

    echo "Sum of prime numbers less than $num: $sum";
}
?>