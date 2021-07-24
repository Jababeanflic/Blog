<?php
session_start(); // every page with header will start a session


if (isset($_GET["id"])){             // check user has arrived corectly at this page
    
    $blogId = $_GET["id"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    deleteBlogPost($DB,$blogId); // delete user

    //echo $blogId;

}