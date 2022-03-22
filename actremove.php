<?php 
include "connect.php";
$deleteID = $_POST['deleteID'];
//set banned to 1
$sql = "UPDATE GTusers
SET banned = true
WHERE userID = $deleteID";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/JavaScript">
alert("User banned")
</script>';
        echo "<a href=\"adminhomepage.php\"> Send me Back </a>";
    
} else {
    echo "Error: " . $sql;
}
$conn->close();




?>