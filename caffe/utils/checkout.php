<?php
try {
    session_start();
    
    if(!isset($_POST['submit'])||!strlen($_POST['submit'])||!isset($_SESSION['userId'])){
        throw new Exception('invalidSubmit');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    require 'connect_db.php';

    $connection -> begin_transaction();

    try {

        $subtotal = 0;

        foreach($_SESSION['cart'] as $cart) {
            $subtotal += $cart['priceperunit'] * $cart['quantity'];
        }

        // Create a prepared statement
        $stmtPurchase = $connection -> stmt_init();
        if(!$stmtPurchase){
            throw new Exception();
        }

        $stmtPurchase -> prepare("INSERT INTO purchase (user, subtotal, date) VALUES (?,?,?)");

        // Bind parameters
        $now = date("Y-m-d h:i:s");

        $stmtPurchase -> bind_param("iss",$_SESSION['userId'],$subtotal,$now);

        // Execute query
        $stmtPurchase -> execute();
        if(!$stmtPurchase){
            echo'error';
            die();
        }

        // Review results
        $affectedRows = $connection->affected_rows;
        if($affectedRows <= 0) {
            throw new Exception('insertFailed');
        }

        $newId = $connection->insert_id;

        // Create a prepared statement (purchase details)
        $stmtDetails = $connection -> stmt_init();
        if(!$stmtPurchase){
            throw new Exception();
        }

        $query = "INSERT INTO purchasedetail (product,purchase,quantity) VALUES";

        $i = 0;
        foreach($_SESSION['cart'] as $cart) {
            $i += 1;
            $query = $query.'('.$cart['id'].','.$newId.','.$cart['quantity'].')';

            if(count($_SESSION['cart']) != $i) {
                $query = $query.',';
            }
        }

        $stmtDetails -> prepare($query);

        // Execute query
        $stmtDetails -> execute();
        if(!$stmtDetails){
            echo'error';
            die();
        }

        // Review results
        $affectedRows = $connection->affected_rows;
        if($affectedRows <= 0 || $affectedRows < count($_SESSION['cart'])) {
            throw new Exception('insertFailed');
        }

        // Close statement, commit transaction, empty cart
        $stmtPurchase -> close();
        $stmtDetails -> close();

        $connection -> commit();

        $connection -> close();

        $_SESSION['cart']=array();

        header("Location: ../html/store.php?success=checkout");
        exit();


    } catch(Exception $e) {
        $connection->rollback();
        throw $e;
    }
} catch(Exception $e) {
    if ($e->getMessage()==='invalidSubmit') {
        echo $e;
        header("Location: ../html/store.php?error=invalidSubmit");
    }
    else {
        echo $e;
        header("Location: ../html/store.php?error=invalidSubmit");
    }
}
?>