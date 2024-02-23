<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="insert.php" method="post">
        Product Name:- <input type="text" name="pn" id="pn"><br><br>
        Product desc:- <input type="text" name="pd" id="pd"><br><br>
        Product price:- <input type="text" name="pp" id="pp"><br><br>
        Product quantity:- <input type="text" name="qty" id="qty"><br><br>
        product Catogary:-<select name="catogary" id="state1">
            <option value="a" selected>a</option>
            <option value="b">b</option>
            <option value="c">c</option>
        </select><br><br>
        ProductImage:- <input type="file" id="profile_pic1" name="profile_pic"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['reg_btn'])) {
    $p_name= $_POST[''];
    $p_desc= $_POST[''];
    $p_price= $_POST[''];
    $p_qty= $_POST[''];
    $p_cato= $_POST[''];
    $p_name= $_POST[''];
    if (mysqli_query($con, $q)) {
        if (!is_dir('profile_pictures')) {
            mkdir("profile_pictures");
        }
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "profile_pictures/" . $profile_pic);
        echo "Registration successfull";
    } else {
        echo "error in registration";
    }
}

?>