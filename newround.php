<?php
// include the file for connecting to the database
include "connect.php";

// empty the GTmatches table, since we're creating a new round
mysqli_query($conn, "DELETE FROM `GTmatches`");

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
// same as count($allParticipants)
$rowcount = mysqli_num_rows($result);

// iterate across all users
for ($x = 0; $x < $rowcount; $x++) {
    // since users are grouped into pairs, we can get the matchID by dividing the user's position in the list by 2 (rounded down)
    $matchID = intdiv($x, 2);
    if ($rowcount % 2 == 1 && $x == $rowcount-1) {
        // the odd one out automatically wins
        $sql1 = "INSERT INTO `GTmatches` (`matchID`, `user1`, `win`) VALUES ($matchID, $allParticipants[$x], 'win')";
    } else {
        // others are set to 'lose' by default
        $sql1 = "INSERT INTO `GTmatches` (`matchID`, `user1`) VALUES ($matchID, $allParticipants[$x])";
    }
    mysqli_query($conn, $sql1);
}

// redirect to viewtournament.php
header("Location: viewtournament.php");