
    <?php
    //this redirects users not admins or just not logged in back to the login page
    session_start();
    if (!isset($_SESSION['admin']) && !isset($_SESSION['id'])) {
        header("Location: AdminOrUser.php");
        die("<script type='text/javascript'>alert('User not logged in, session uname: ".$_SESSION['uname']."');</script>");
    
    }
   
   
    ?>
   <!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Access</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    
    <a href='adminhomepage.php' class="w3-bar-item w3-button w3-padding-large w3-hide-small">HOME</a>
    <a href='viewusersA.php' class="w3-bar-item w3-button w3-padding-large w3-hide-small">VIEW USERS</a>
    <a href="viewtournament.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">VIEW TOURNAMENT</a>
     <a href="RemoveUser.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">BAN USER</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOG OUT</a>
   
    </div>
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>

</body>
</html>