 <?php
 session_start();
//include connection code 
 include "connect.php";
    
//take email and password from input
$email = $_POST['email'];
$pw = $_POST['password'];
echo "<br>";
//check if login matches admin table
$sql = "SELECT id, email, password FROM GTadmins WHERE email = '". $email ."' AND password = '". $pw ."'";
echo $sql;
$result = mysqli_query($conn, $sql);

$row = $result -> fetch_assoc();

$id = $row['id'];
echo $row['id'];

if (mysqli_num_rows($result)==1){
    //if they are an admin redirect to admin homepage
    $_SESSION["admin"]= true;
    $_SESSION["id"] = $id;
    header("Location:adminhomepage.php");
    
    //else check if they are a user
} else {  
    //check for the user's email, password, and if they're banned. hash the password and compare with hashed password in the database
    $sql = "SELECT userID, email, password, banned FROM GTusers WHERE email = '". $email ."' AND password = '". hash('sha256', $pw) ."'";
echo $sql;
$result = mysqli_query($conn, $sql);

$row = $result -> fetch_assoc();
$id = $row['userID'];

echo $row['userID'];

//check if the user hasn't been banned by an admin
if (mysqli_num_rows($result)==1 && $row['banned'] == false){
    
    $_SESSION["user"]= true;
    $_SESSION["id"] = $id;
    header("Location:userhomepage.php");

} else {
    //redirect back to login page
    echo '<script type="text/JavaScript">
alert("Unable to access website. REASON: Banned.");
</script>';
    header("Location:AdminOrUser.php");
}




}
?>