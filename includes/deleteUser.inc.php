<?php
session_start(); // every page with header will start a session


if (isset($_POST["submit"])){             // check user has arrived corectly at this page
    
    $userUid = $_POST["userUid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

    deleteUseradmin($DB,$userUid); // delete user

    //echo $userUid;

}
