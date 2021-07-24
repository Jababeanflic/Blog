<?php

session_start();
    
    $userId = $_SESSION['userid'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';  // error catching functions

deleteUser($DB,$userId);

//echo $userId;

