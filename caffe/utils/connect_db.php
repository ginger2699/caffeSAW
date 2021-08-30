<?php
    $DB_SERVERNAME = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "catcafe";
    
    $connection = new mysqli($DB_SERVERNAME,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);

    if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
    } 
?>