<?php
$dir = "myuploads";
$filename = $_REQUEST['fname'];
unlink($dir . "/" . $filename);
?>
<script>
    window.location.href = "q1.php";
</script>