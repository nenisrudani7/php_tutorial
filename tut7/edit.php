<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection file
include 'conn.php';

// Fetch user data
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "User data not found.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];

    // Handle profile picture upload
    if (!empty($_FILES["profile_pic"]["name"])) {
        $targetDir = "profile_pictures/";
        $targetFile = $targetDir . basename($_FILES["profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile)) {
                // Update user information in the database including the new profile picture filename
                $updateQuery = "UPDATE users SET name='$name', profile_pic='$targetFile' WHERE username='$username'";
                if ($conn->query($updateQuery) === TRUE) {
                    // Redirect to profile page after successful update
                    header("location: index.php");
                    exit;
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update user information in the database excluding the profile picture
        $updateQuery = "UPDATE users SET name='$name' WHERE username='$username'";
        if ($conn->query($updateQuery) === TRUE) {
            // Redirect to profile page after successful update
            header("location: index.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-sm-6">
                <h1 class="text-center">Edit Profile</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="profile_pic">Profile Picture</label><br>
                        <img src="<?php echo 'profile_pictures/' . $userData['profile_pic']; ?>" style="height: 50px; width: 50px;" alt="">
                        <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
