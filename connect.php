<?php

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "egymnator";

$con = mysqli_connect($host, $db_user, $db_password, $db_name);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
