<?php
try {
    if(!isset($_POST['quantity'])||!isset($_POST['productid'])){
        throw new Exception('emptyFields');
    }

    session_start();

    if(!isset($_POST['submit'])||!strlen($_POST['submit'])||!isset($_SESSION['userId'])){
        throw new Exception('invalidSubmit');
    }

    require 'connect_db.php';

    // Create a prepared statement
    $stmt = $connection -> stmt_init();

    
    if(!$stmt){
        throw new Exception();
    }

    $stmt -> prepare("INSERT INTO cart (userid,productid,quantity) VALUES (?,?,?)");

    // Bind parameters
    $stmt -> bind_param("iii",$_SESSION['userId'],$_POST['productid'],$_POST['quantity']);

    // Execute query
    $stmt -> execute();
    if(!$stmt){
        echo'error';
        die();
    }

    // Review results
    $affectedRows = $connection->affected_rows;
    if($affectedRows <= 0) {
        throw new Exception('insertFailed');
    }


    // Close statement
    $stmt -> close();
    $connection -> close();

    //header("Location: ../product.php?id=".$_POST['productid']."success=addedtocart");
    header("Location: ../product.php?id=".$_POST['productid']."&success=".($affectedRows));

    exit();
} catch(Exception $e) {
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=emptyFields");
        exit();
    }
    else if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=invalidSubmit");
        exit();
    }
    else if ($e->getMessage()==='insertFailed') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=insertFailed");
        exit();
    }
    else {
        header("Location: ../product.php?id=".$_POST['productid']."&error=unexpectedError");
        exit();
    }
}
?>