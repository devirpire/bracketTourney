<?php 
include "connect.php";

// drop the any existing content in the GTusersT table to create a new one
$sql = "DROP TABLE GTusersT";
mysqli_query($conn, $sql);

// create GTusersT with the same fields as the GTusers table
$sql1 = "CREATE TABLE GTusersT LIKE GTusers";
mysqli_query($conn, $sql1);
// insert all records from the GTusers table into GTusersT
$sql2 = "INSERT INTO GTusersT SELECT * FROM GTusers;";
mysqli_query($conn, $sql2);
// delete any existing data from GTmatches
$sql3 = "DELETE FROM `GTmatches` ";
mysqli_query($conn, $sql3);

// get all users which aren't banned from the tournament in random order...
$result = mysqli_query($conn, "SELECT `userID` FROM `GTusersT` WHERE `banned` = 0 ORDER BY RAND()", MYSQLI_USE_RESULT);
if (!result) {
    die("An error during the query occurred.");
}
// ...into the $allParticipants array
$allParticipants = [];
while ($row = mysqli_fetch_row($result)) {
    $allParticipants[] = $row[0];
}


var_dump($allParticipants);

echo $allParticipants[0];
$rowcount = mysqli_num_rows($result);
// iterate across all users
for ( $x=0; $x<$rowcount; $x++){
    // since users are grouped into pairs, we can get the matchID by dividing the user's position in the list by 2 (rounded down)
    $y = intdiv($x ,2);
    
    if($rowcount % 2 == 1 && $x == $rowcount-1){
        // the odd one out automatically wins
        $sql1 = "INSERT INTO `GTmatches` (`matchID`, `user1`, `win`) VALUES ($y, $allParticipants[$x], 'win')";
    }else{
        // others are set to 'lose' by default
    $sql1 = "INSERT INTO `GTmatches` (`matchID`, `user1`) VALUES ($y, $allParticipants[$x])";
    
    }
    mysqli_query($conn, $sql1);
    
    
}

header('Location:viewtournament.php');

?>