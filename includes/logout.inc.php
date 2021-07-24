<?php

session_start();
session_unset();
session_destroy(); // end session

header("location: ../index.php"); // error message empty input
exit(); //stop script

?>

