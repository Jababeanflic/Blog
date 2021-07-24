<?php
session_start(); // Will display this header on every page,  page with header will start a session
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/saber_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>

<body>

<div class="topnav" id="myTopnav">
<a class="logo" herf="index.php"><img src="img/logo.jpeg" width="30" height="30" alt="Blog logo"></a>
<a href="index.php" class="active">Home</a>
<a href="aboutUs.php">About Us</a>
<a href="#contact">Contact</a>
<?php
    if(isset($_SESSION["useruid"])){
        echo "<a href='blog.php'>Blogs</a>";      // only show if loged in if admin Add Post will also be in nav bar
            if($_SESSION["status"]===1){
                echo "<a href='post.php'>Add Post</a>";
            }
                echo "<a href='profile.php'>Profile</a>";
                echo "<a href='includes/logout.inc.php'>Log Out</a></li>";
            }
              else{
                  echo "<a href='signup.php'>Sign up</a>";  // only show if loged out
                  echo "<a href='login.php'>Login</a>";
              }

?>

<a href="javascript:void(0);" class="icon" onclick="navbar()">
  <i class="fa fa-bars"></i>
</a>
</div>

 