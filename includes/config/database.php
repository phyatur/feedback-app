<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'phyatur');
define('DB_PASS', 'phyatur0');
define('DB_NAME', 'feedback_db');


// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


echo 'I am in!';
