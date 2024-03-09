<?php
session_start();

if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: login.php");
    exit; // Add exit to prevent further execution
}

include 'conn.php';

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Inventory Management System - By WebPartner</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    </head>

    <body>
        <?php include_once("header.php"); ?>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-sm-4">
                    <h1 class="text-center">Profile</h1>
                    <div class="card">
                        <div class="card-body">
                        <p><strong>Profile Picture:</strong><br> <img src="<?php echo 'profile_pictures/' . $userData['profile_pic']; ?>" style="height: 50px; width: 50px;" alt=""></p>
                            <p><strong>Name:</strong> <?php echo $userData['name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $userData['username']; ?></p>
                            <p><strong>Password:</strong> <?php echo $userData['password']; ?></p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="edit.php?em=<?php echo $userData['username'];?>" class="btn btn-danger btn-block">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    echo "User data not found.";
}
?>