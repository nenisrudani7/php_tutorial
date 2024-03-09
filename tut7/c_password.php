<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection file
include 'conn.php';

// Initialize variables
$showError = false;
$successMessage = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $username = $_SESSION['username'];

    // Check if old password matches the password in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$oldPassword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Check if new password and confirm password match
        if ($newPassword == $confirmPassword) {
            // Update the password in the database
            $updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
            if (mysqli_query($conn, $updateSql)) {
                $successMessage = "Password changed successfully.";
            } else {
                $showError = "Error updating password: " . mysqli_error($conn);
            }
        } else {
            $showError = "New password and confirm password do not match.";
        }
    } else {
        $showError = "Old password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Change Password</h2>
                <?php if ($showError) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $showError; ?>
                    </div>
                <?php endif; ?>
                <?php if ($successMessage) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
