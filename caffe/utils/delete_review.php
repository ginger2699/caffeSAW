<?php
try{
    session_start();
    if(!isset($_GET['id'])||!isset($_SESSION['userId'])){
        throw new Exception('emptyFields');
    }
    include "connect_db.php";
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    if(!($stmt -> prepare("DELETE FROM productsreview WHERE id=? AND user=?"))){
        throw new Exception("error1");
    }
    
    // Bind parameters
    if(!($stmt -> bind_param("ss",$_GET['id'],$_SESSION['userId']))){
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

    header("Location: ../html/show_profile.php?success=yes");
    exit();
}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../html/show_profile.php?error=emptyFields");
        exit();

    }
    else{

        header("Location: ../html/show_profile.php?error=".$e->getMessage());
        exit();
    }
}
?>