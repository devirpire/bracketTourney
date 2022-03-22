<?php 
//include nabar and connection code
include "adminnav.php";
include "connect.php";
?>

<!-- The CSS Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
<h2 class="w3-wide">REMOVE A USER</h2>
<p class="w3-justify">

<?php 

$un = $_POST['username'];
$email = $_POST['email'];
//select from user table
$sql = "SELECT * FROM GTusers WHERE banned = 0";
$result = mysqli_query($conn, $sql);




if (mysqli_num_rows($result) > 0) {
    // output data of each row
  
     echo "<form action='actremove.php' method='post'>";
    
    echo"  <select name='deleteID' id='deleteID'>";
    while($row = mysqli_fetch_assoc($result)) {
        
        echo "<option value='" . $row['userID'] . "'>"  . $row["un"].' : '.  $row["email"] . "</option>";
        
   
        
    }
    echo "</select>";
    echo "<input type='submit'>";
    
    
    
} else {
    echo "0 results";
}

?>

</div>