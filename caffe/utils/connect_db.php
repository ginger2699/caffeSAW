<?php
    $DB_SERVERNAME = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "caffesaw";
    try{
        $connection = mysqli_connect($DB_SERVERNAME,$DB_USERNAME,$DB_PASSWORD,$DB_NAME); 
    }
    catch(mysqli_sql_exception $error){
        
    }
?>