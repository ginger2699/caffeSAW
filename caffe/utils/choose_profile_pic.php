<?php
try{
    session_start();
    if(!(isset($_POST['profile_pic'])) || (!isset($_SESSION['userId'])) || (!isset($_POST['submit']))){
        throw new Exception('emptyFields');
    }

    include "connect_db.php";
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    if(!($stmt -> prepare("UPDATE usersInfo SET path = ? WHERE id = ?"))){
        throw new Exception("error1");
    }
    
    // Bind parameters
    if(!($stmt -> bind_param("is",$_POST['profile_pic'],$_SESSION['userId']))){
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

    header("Location: ../show_profile.php?success=profile");
    exit();
}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../choose_profile_pic.php?error=emptyFields");
        exit();
    }
    else{
        header("Location: ../choose_profile_pic.php?error=unexpectedError");
        exit();
    }
}
?>