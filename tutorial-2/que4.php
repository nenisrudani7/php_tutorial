<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulus Calculation</title>
</head>

<body>

    <form action="que4.php" method="post">
        Enter num1: <input type="text" name="num1" required>
        <br>
        Enter num2: <input type="text" name="num2" required>
        <br>
        <input type="submit" value="Submit" name="btn">
    </form>

    <!-- <?php
    if (isset($_POST['btn'])) {
        function customModulus($dividend, $divisor)
        {
            if ($divisor == 0) {
                return "Division by zero is undefined.";
            }

            while ($dividend >= $divisor) {
                $dividend -= $divisor;
            }

            return $dividend;
        }

        // Validate and sanitize user inputs
        $number1 = isset($_POST['num1']) ? (int)$_POST['num1'] : 0;
        $number2 = isset($_POST['num2']) ? (int)$_POST['num2'] : 0;

        $result = customModulus($number1, $number2);

        echo "Modulus of $number1 and $number2 without using inbuilt operator: $result";
    }
    ?> -->

</body>

</html>

<?php
if (isset($_POST['btn'])){
    $a = $_POST['num1'];
    $b = $_POST['num2'];

    $ans = (int)($a/$b);

    $rem = $a - ($b * $ans);

    echo "Modulas of {$a} and {$b} is {$rem}";
}
?>