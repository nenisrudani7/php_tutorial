<?php
include_once('conn.php');

$query = "SELECT * FROM product_master";

$result = mysqli_query($conn, $query);
echo "<table border='2'>";
while ($r = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $r['p_id'] . "</td>";
    echo "<td>" . $r['p_name'] . "</td>";
    echo "<td>" . $r['p_desc'] . "</td>";
    echo "<td>" . $r['p_price'] . "</td>";
    echo "<td>" . $r['p_qty'] . "</td>";
    echo "<td>" . $r['p_cat'] . "</td>";
    echo "<td>" . $r['date'] . "</td>";
?>
    <td><img src="<?php echo 'profile_pictures/' . $r['p_img']; ?>" height="20%" width="25%" /></td>
    <td> <a href="delete.php?em=<?php echo $r['p_id']; ?>"> <input type="button" value="Delete"> </a></td>
<?php
    echo "</tr>";
}
?>