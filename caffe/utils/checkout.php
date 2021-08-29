<?php
try {
    session_start();

    if(!isset($_POST['submit'])||!strlen($_POST['submit'])||!isset($_SESSION['userId'])){
        throw new Exception('invalidSubmit');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    require 'connect_db.php';

    $connection -> begin_transaction();

        /*
            1) get cart
            2) add purchase 
            3) add purchase details -> one row per get cart result
            4) empty cart
        */

    try {

        // Create a prepared statement
        $stmtGet = $connection -> stmt_init();
        if(!$stmtGet){
            throw new Exception();
        }

        $stmtGet -> prepare("SELECT productid, quantity, price FROM cart JOIN product ON productid = product.id WHERE userid = ?");

        // Bind parameters
        $stmtGet -> bind_param("i",$_SESSION['userId']);

        // Execute query
        $stmtGet -> execute();
        if(!$stmtGet){
            echo'error';
            die();
        }

        // Review results
        $numOfRows = $results -> num_rows;
    
        if($numOfRows === 0) {
            throw new Exception('EmptyCart');
        }
    
        $subtotal = 0;
        $queryDetails = 'INSERT INTO purchasedetail (product, purchase, quantity) VALUES ';

        while($row = $results -> fetch_assoc()){
            subtotal += $row['quantity'] * $row['price']
        }

        // Close statement, commit transaction
        $stmtGet -> close();

        $mysqli->commit();

        $connection -> close();

        header("Location: ../product.php?id=".$_POST['productid']."&success=".($affectedRows));

        exit();

    } catch(Exception $e) {
        $mysqli->rollback();

        throw $exception;
    }
} catch(Exception $e) {
    else if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=invalidSubmit");
        exit();
    }
    else {
        header("Location: ../product.php?id=".$_POST['productid']."&error=unexpectedError");
        exit();
    }
}
?>