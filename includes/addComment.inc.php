<?php

session_start();

if (isset($_POST["submit"])){ 

$blogId = $_POST["id"];
$userId = $_SESSION['userid'];
$userUid = $_SESSION["useruid"];
$comment = $_POST["comment"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';  // error catching functions

addComent($DB,$userId,$comment,$userUid,$blogId);
}