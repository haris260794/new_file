<?php
define ('DB_Server','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','databasebuku');
$con = mysqli_connect(DB_Server,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL : " . mysqli_connect_eror(); 
}
?>