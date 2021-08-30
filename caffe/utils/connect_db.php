<?php
    $DB_SERVERNAME = "localhost";
    $DB_USERNAME = "S4718958";
    $DB_PASSWORD = "MATTE-SAW-2021";
    $DB_NAME = "S4718958";
    
    $connection = new mysqli($DB_SERVERNAME,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);

    if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
    } 
?>