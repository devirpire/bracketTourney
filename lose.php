<?php 

include "connect.php";


if(isset($_GET['id'])) {
    
    
    echo $_GET['id'];
    echo "mi";
    echo $_GET['mi'];
   
}else{

echo "no user selected";
}

    
//remove the user from the tournament where their id = to the user clicked
$sql3 = "DELETE FROM GTusersT WHERE userID =" .  $_GET['id'];
mysqli_query($conn, $sql3);

//set win to the user that remains
$sql3 = "UPDATE `GTmatches` SET `win`='win' WHERE matchID = " . $_GET['mi'];
mysqli_query($conn, $sql3);


$sql3 = "UPDATE `GTmatches` SET `win`='lose' WHERE user1 = " . $_GET['id'];
mysqli_query($conn, $sql3);



echo $sql3;
//redirect back to viewtournament.php
header('Location:viewtournament.php');
?>
