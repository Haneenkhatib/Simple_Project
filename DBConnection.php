<?php

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$con = new mysqli($servername, $username, $password,$dbname);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
//echo "Connected successfully";
echo "<br/>";