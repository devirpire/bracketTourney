<?php
include 
include "connect.php";
session_start();
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] && (!isset($_SESSION['user']) || !$_SESSION['user']);

// if user is admin, view the adminnav.php and all the players from GTmatches... 
if ($isAdmin) {
    include "adminnav.php";
}
echo "<p><b>Tournament</b></p>";
$sql = "SELECT GTmatches.*, GTusers.un FROM GTmatches JOIN GTusers ON GTmatches.user1 = GTusers.userID";
if ($isAdmin) {
    $sql = $sql . " ORDER BY matchID ASC";
} else {
    // ....else assume they're a user and only show the round that involves their matchID
    include "usernav.php";
    $sql = $sql . " WHERE matchID = (SELECT matchID from GTmatches WHERE user1 = {$_SESSION['id']} LIMIT 1)";
}



//COPY FROM HERE
?>



<!-- The CSS Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
<h2 class="w3-wide">GAME TOURNAMENT</h2>
<p class="w3-justify">









<?php






//die($sql);
$result = mysqli_query($conn, $sql);
$table = "";

echo "Remaining participants: " . mysqli_num_rows($result);
if (mysqli_num_rows($result) > 1) {
    // output data of each row
    $table = $table . "<table border = 1>";
    $table = $table . "<td>". "<b>matchID</b>" . "</td><td>" . "<b>User</b>" . "</td>";
    while ($row = mysqli_fetch_assoc($result)) {
        $table = $table . "<tr>";
        //if users have 'win' set to 0, view the table
        if ($row['win'] == "0") {
            $table = $table . "<td>" . $row['matchID']. "</td><td>" . $row['un'] . "<td><a href='lose.php?id=" . $row['user1'] .  "&mi="  . $row['matchID'].   "'> lose </a></td></tr>";
        }else{
            $table = $table . "<td>" . $row['matchID']. "</td><td>" . $row['un'] . "<td> "  . $row['win']  .   " </td></tr>";
            
        }
    }
} else {
    echo "<br>Tournament Winner: ";
    $row = mysqli_fetch_assoc($result);
    echo $row['un'];
}
$table = $table . "</table>";
//echo table
echo $table;

?>



<html>
<form action="newround.php" method="post">
<?php if ($isAdmin) { ?>
<input type="submit">
<?php } ?>

</html>


</div>





