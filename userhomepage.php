<?php 
//echo "Welcome to the tournament registration, user. Please navigate with the links below.";
//echo "<br>";
include "usernav.php";
include "connect.php";
?>
<!-- The CSS Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
<h2 class="w3-wide">USER HOMEPAGE</h2>
<p class="w3-justify">

<?php 
$sql = "SELECT un FROM GTusers";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
       /* $displayuser = $_POST['un'];
        echo "Logged in as $displayuser";*/
    }
} else {
    echo "<br>No records found";
}



?>
</div>

