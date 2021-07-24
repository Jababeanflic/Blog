<?php

if (isset($_POST["blogId"])){
$comId = $_POST["comId"];
$blogId = $_POST["blogId"];

//echo $comId;
//echo $blogId;

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

deleteComment($DB,$comId,$blogId);

}
