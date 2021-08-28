<?php
try{
    if(!(isset($_POST['email'])) || !(isset($_POST['token'])) || !(isset($_POST['changepass'])) || !(isset($_POST['pass'])) ||strlen($_POST['email']) == 0){
        throw new Exception('emptyFields');
    }
    if ($_POST['pass'] != $_POST['confirm']) {
        throw new Exception('invalidPassword');
    }
    include "connect_db.php";
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    if(!($stmt -> prepare("SELECT id FROM tokenrecoverpassword WHERE email=? AND token=?"))){
        throw new Exception("error1");
    }
    
      // Bind parameters
    if(!($stmt -> bind_param("ss",$_POST['email'],$_POST['token']))){
        throw new Exception("error2");
    }
    
      // Execute query
    if(!($stmt -> execute())){
        throw new Exception("error3");
    }

    if(!($results = $stmt -> get_result())){
        throw new Exception("error4");
    }

    $numOfRows = $results -> num_rows;
    
    if($numOfRows === 0) {
        throw new Exception('invalidCredentials');
    }

    if(!($row = $results -> fetch_assoc())){
        throw new Exception();
    }

    //Se utente presente del DB allora genero token
    if($row)
    {
    
        if(!($stmt -> prepare("UPDATE usersInfo SET password = ? WHERE id = ?"))){
            throw new Exception("error1");
        }
        $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        
          // Bind parameters
        if(!($stmt -> bind_param("ss",$hash,$_SESSION['userId']))){
            throw new Exception("error2");
        }
        
          // Execute query
        if(!($stmt -> execute())){
            throw new Exception("error3");
        }
    }
    else{
        throw new Exception('invalidCredentials');
        if(!($stmt -> close())){
            throw new Exception();
        }
    }
    // Close statement

    if(!($stmt -> close())){
        throw new Exception();
    }

    if(!($connection -> close())){
        throw new Exception();
    };

    header("Location: ../login.php?success=updated");
    exit();
}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../update_password.php?error=emptyFields");
        exit();

    }
    if ($e->getMessage()==='invalidCredentials') {
        header("Location: ../update_password.php?error=invalidCredentials");
        exit();

    }
    else{
        //header("Location: ../reset_password.php?error=unexpectedError");
        header("Location: ../update_password.php?error=".$e->getMessage());
        exit();
    }
}
?>