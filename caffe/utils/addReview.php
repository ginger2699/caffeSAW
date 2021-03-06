<?php
try{
    session_start();
    if(!(isset($_POST['description'])) || (!isset($_SESSION['userId'])) || (!isset($_POST['productid']))){
        throw new Exception('emptyFields');
    }

    include "connect_db.php";
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    if(!($stmt -> prepare("INSERT INTO productsreview VALUES (DEFAULT,?,?,?,?,?)"))){
        throw new Exception("error1");
    }
    
    // Bind parameters
    $stars = $_POST['rate'];
    var_dump($stars);
    $currDate = date("Y-m-d");
    if(!($stmt -> bind_param("sssis",$_POST['productid'],$_SESSION['userId'],$_POST['description'], $stars ,$currDate))){
        throw new Exception("error2");
    }
    
      // Execute query
    if(!($stmt -> execute())){
        echo $stmt->error;
        die();
        throw new Exception("error3");
    }

    if(!($stmt -> close())){
        throw new Exception();
    }

    if(!($connection -> close())){
        throw new Exception();
    };

    header("Location: ../html/product.php?id=".$_POST['productid']);
    exit();
}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../html/leaveReview.php?error=emptyFields".'&id='.$_POST['productid']);
        exit();
    }
    else{
        header("Location: ../html/leaveReview.php?error=".'&id='.$_POST['productid']);
        exit();
    }
}
?>