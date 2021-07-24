<?php
DEFINE ('DB_USER', 'IN18025316');                           // The username
DEFINE ('DB_PASSWORD','IN18025316');                        // The password
DEFINE ('DB_HOST', 'comp-hons.uhi.ac.uk');                  // The mysql server host address 
DEFINE ('DB_NAME', 'IN18025316');                           // The database name
$DB = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (mysqli_connect_errno())
  {
  echo 'Cannot connect to the database: ' . mysqli_connect_error();
  }

?>