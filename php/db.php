<?php

$db = mysqli_connect('localhost', 'root', '', 'events');
//$db = mysqli_connect('mysql.hostinger.ru', 'u753063545_admin', '1256330', 'u753063545_event');
//$db = mysqli_connect('localhost:3306', 'spe-connect', 'spe-connect-now2017', 'events');

if (mysqli_connect_error()) { 
    exit("Database Error");
}

?>
