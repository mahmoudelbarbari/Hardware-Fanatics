<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "hardwarefanatics";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
$is_db_connected = false;
if ($conn->connect_error) {
  $is_db_connected = false;
} else {
  $is_db_connected = true;
}
?>