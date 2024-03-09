<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-sm-6">
                <h1 class="text-center">Sign Up</h1>
                <form method="post" action="signup.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleConfirmPassword" name="confirm_password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputProfilePhoto" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control-file" id="exampleInputProfilePhoto" name="profile_pic">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include_once("conn.php");

session_start();
// Check if form is submitted
if (isset($_POST['register'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $profile_pic = $_FILES['profile_pic']['name'];
    // Assuming profile photo is handled separately, you can handle file upload accordingly

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit; // Stop execution
    }

    // Insert data into the database
    $sql = "INSERT INTO users (name, username, password, profile_pic) VALUES ('$name', '$email', '$password','$profile_pic')";

    if (mysqli_query($conn, $sql)) {
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
