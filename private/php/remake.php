<?php
# Use this script once to upload data initially to the database, or to restore it
# Variables and functions
include("./vars.php");

# Connection script
include("./connect.php");

# File data from the json file
$filedata = file_get_contents("../dataset.json");

# Insert data into all the tables
$q = "INSERT INTO `Months`(`Jan`, `Feb`, `Mar`, `Apr`, `May`, `June`, `July`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`) 
VALUES ('$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata','$filedata')";

if ($connection->query($q) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $q . "<br>" . $connection->error;
}
?>