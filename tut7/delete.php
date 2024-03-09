<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['stulogin']) || $_SESSION['stulogin'] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection file
include 'conn.php';

// Get the username of the logged-in user
$username = $_SESSION['username'];

// SQL query to delete the user account
$sql = "DELETE FROM users WHERE username = '$username'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Account deleted successfully, so destroy the session and redirect to the signup page
    session_destroy();
    header("location: signup.php");
    exit;
} else {
    // If there is an error deleting the account, display an error message
    echo "Error deleting account: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
