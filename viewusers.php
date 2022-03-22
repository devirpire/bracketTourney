<?php 
include "connect.php";
include "usernav.php";
?>
<!-- The CSS Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
<h2 class="w3-wide">LIST OF USERS</h2>
<p class="w3-justify">

<?php 

$sql = "SELECT * FROM GTusers ORDER BY level DESC";

$result = mysqli_query($conn, $sql);
$table = "";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $table = $table . "<table border = 1>";
    $table = $table . "<td>". "<b>Username</b>" . "</td><td>" . "<b>Email</b>" . "</td><td>" . "<b>Level</b>" . "</td><td>" . "<b>Banned?</b>" . "</td>";
    //create table
    while($row = mysqli_fetch_assoc($result)) {
        $table = $table . "<tr>";
        $table = $table . "<td>" . $row["un"]. "</td><td>" . $row["email"] . "</td><td>" . $row["level"] ."</td><td>" . $row["banned"]. "</td>";
        $table = $table . "</tr>";
    }
} else {
    echo "0 results";
}
$table = $table . "</table>";
//echo table
echo $table;


?>
</div>