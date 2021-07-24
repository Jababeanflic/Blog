<?php
session_start(); // every page with header will start a session
?>

<?php

if (isset($_POST["submit"])){             // check user has arrived corectly at this page
    
    $userId = $_SESSION['userid'];
    $username = $_POST["name"];
    $email = $_POST["email"];
    $userUid = $_POST["uid"];
    //$pwd = $_POST["pwd"];
    //$pwdRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    if(invalidUid($userUid) !== false){
        header("location: ../editProfile.php?error=invalidUid"); // error message invalide user name
        exit(); //stop script
    }
    if(!empty($email)){
    if(invalidEmail($email) !== false){
        header("location: ../editProfile.php?error=invalidEmail"); // error message invalide email
        exit(); //stop script
    }
}
if(!empty($username)){
    if(uidExists($DB,$username,$email) !== false){
        header("location: ../editProfile.php?error=usernameTaken"); // error message username taken
        exit(); //stop script
    }
}

    if (empty($username)){
        $username = $_SESSION["username"];  // add variabe if empty
    }
    if (empty($email)){
        $email = $_SESSION["email"];
    }
    if (empty($userUid)){
        $userUid = $_SESSION["useruid"];
    }


    editUser($DB,$username,$email,$userUid,$userId); // edit user function

    //echo "<li><a>USER Name: " .$email. "</a></li>";

}
else{
    header("location: ../editProfile.php");
    exit(); // stop script
}