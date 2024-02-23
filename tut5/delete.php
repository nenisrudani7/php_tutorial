<?php
include_once("conn.php");
$em = $_REQUEST['em'];
echo $em;
// $q = "delete from registration where email='$em'";
$q = " delete from product_master where p_id='$em' ";
if (mysqli_query($conn, $q)) {
?>
    <script>
        window.location.href = "display.php";
    </script>
<?php
} else {
    echo "error in deleting data";
}
?>