<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File Upload</title>
</head>
<body>
    <form action="q2.php" method="post" enctype="multipart/form-data">
        <label for="pdfFile">Choose a PDF file:</label>
        <input type="file" name="pdfFile" id="pdfFile" accept=".pdf">
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was selected
    if(isset($_FILES["pdfFile"])) {
        $targetDirectory = "uploads/"; // Change this to your desired directory
        $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
        $pdfFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is a PDF
        if($pdfFileType == "pdf") {
            // Move the file to the specified directory
            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
                echo "The file ". htmlspecialchars(basename($_FILES["pdfFile"]["name"])). " has been uploaded.";
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "Only PDF files are allowed.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}
?>