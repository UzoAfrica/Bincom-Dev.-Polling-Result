<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define ("DATABASE_NAME","bincom_test");


// Create conne
$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

else{
"Connected successfully";

}
$url = "http://localhost/bincom";


