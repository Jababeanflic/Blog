<?php
session_start(); // every page with header will start a session
?>

<?php

if (isset($_POST["submit"])){             // check user has arrived corectly at this page
    
    $blogTitle = $_POST["blogTitle"];
    $catagory = $_POST["catagory"];
    $content = $_POST["content"];
    $blogDescription = $_POST['blogDescription'];
    $blogId = $_POST["blogId"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    editPost($DB,$blogTitle,$catagory,$content,$blogDescription,$blogId); // add post function


    //echo $blogTitle;
    //echo $catagory;
    //echo $blogDescription;
    //echo $content;
    //echo $blogId;
}