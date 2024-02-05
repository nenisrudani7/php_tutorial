<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Text Boxes</title>
</head>

<body>

    <form method="POST" action="">
        Enter the number of text boxes:
        <input type="number" name="num" required>
        <input type="submit" name="create" value="Create Text Boxes">
    </form>

</body>

</html>

<?php
if (isset($_POST['create'])) {
    $number = $_POST['num'];
    $a = "";
?>
    <form action="q1.php" method="post">
        <?php
        for ($i = 1; $i <= $number; $i++) {
            // $a = $a . "<input type='number' name='t[]'><br><br>";
        ?>
            Enter number <?php echo $i; ?>: <input type="text" name="t[]"><br><br>
        <?php
        }
        // echo $a;
        ?>
        <input type="submit" name="sort" value="sort">
    </form>

<?php
}
if (isset($_POST['sort'])) {
    $b = $_POST['t'];
    $count = count($b);
    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($b[$i] < $b[$j]) {
                $temp = $b[$i];
                $b[$i] = $b[$j];
                $b[$j] = $temp;
            }
        }
    }
    foreach ($b as $v) {
        echo $v . '<br>';
    }
}
?>
<?php
?>