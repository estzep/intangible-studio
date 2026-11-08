<?php

$host = "localhost";
$user = "your_db_user";
$password = "your_db_password";
$database  = "your_db_name";

// Create database connection
$db = new mysqli($host, $user, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>