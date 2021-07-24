<?php

if (isset($_POST["submit"])){             // check user has arrived corectly at this page
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput"); // error message empty input
        exit(); //stop script
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidUid"); // error message invalide user name
        exit(); //stop script
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail"); // error message invalide email
        exit(); //stop script
    }
    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordDontMatch"); // error message passwords dont match
        exit(); //stop script
    }
    if(uidExists($DB,$username,$email) !== false){
        header("location: ../signup.php?error=usernameTaken"); // error message username taken
        exit(); //stop script
    }

    createUser($DB,$name,$email,$username,$pwd); // create user function

}
else{
    header("location: ../signup.php");
    exit(); // stop script
}