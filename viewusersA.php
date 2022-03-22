<?php
include "connect.php";
include "adminnav.php";
?>
<!-- The CSS Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
<h2 class="w3-wide">LIST OF USERS</h2>
<p class="w3-justify">
<?php 
//sort by descending order of level. 

$sort = "email";

$filter = "";
//different links to arrange the users by descending, ascending and banned
echo "<a href='viewusersA.php?s=level DESC'>Descending by level</a>";
echo str_repeat('&nbsp;', 3);
echo "<a href='viewusersA.php?s=level ASC'>Ascending by level </a>";
echo str_repeat('&nbsp;', 3);
echo "<a href='viewusersA.php?f=WHERE banned = 1'>Banned </a>";



if(isset($_GET['f'])) {
    $filter = $_GET['f'];
} 
if(isset($_GET['s'])) {
    $sort = $_GET['s'];
} 





//order by the filter to have the table ordered by whatever is clicked
$sql = "SELECT * FROM GTusers $filter ORDER BY " . $sort;

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

