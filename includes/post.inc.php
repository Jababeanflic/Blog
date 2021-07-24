<?php
session_start(); // every page with header will start a session
?>

<?php

if (isset($_POST["submit"])){             // check user has arrived corectly at this page
    
    $blogTitle = $_POST["blogTitle"];
    $catagory = $_POST["catagory"];
    $content = $_POST["content"];
    $userId = $_SESSION['userid'];
    $userUid = $_SESSION['useruid'];
    $blogDescription = $_POST['blogDescription'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    addPost($DB,$blogTitle,$catagory,$content,$userId,$userUid,$blogDescription); // add post function

}
