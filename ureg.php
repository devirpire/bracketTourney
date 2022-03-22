<?php
//include database connection code
include "connect.php";
$un = $_POST['un'];
$email = $_POST['email'];
$level = $_POST['level'];
$pw = $_POST['password'];
//if level is equal or above 15, register the user in the tournament

if ((strlen($un)== 0) OR (strlen($email)==0) OR (strlen($level)==0) OR (strlen($pw)==0)){
    echo '<script type="text/JavaScript">
alert("Please fill in all fields");
</script>';
    echo "<a href=\"UserRegister.php\"> Send me Back </a>";
} else {
    //check if the level is between 15 and 99
    if ($level >= 15 && $level <= 99) {
           //insert username, email, level, and hash the password
        $sql = "INSERT INTO GTusers (un, email, level, password) VALUES ('$un', '$email', '$level', '" . hash('sha256', $pw) . "')";
        
    } else {
        //output error message and redirect to error page
        echo '<script type="text/JavaScript">
alert("Level is out of range");
</script>';
        echo "<a href=\"UserRegister.php\"> Send me Back </a>";
        
    }
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/JavaScript">
alert("User registered successfully");
</script>';
        echo $un. " registered. You may";
        echo "<a href=\"AdminOrUser.php\"> log in </a>";
        echo "now.";
        
        
    } 
    $conn->close();
}
