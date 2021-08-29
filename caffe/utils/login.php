<?php
try{
    if(!isset($_POST['email'])||!strlen($_POST['email'])||
    !isset($_POST['pass'])||!strlen($_POST['pass'])){
    throw new Exception('emptyFields');
    }
    if(!isset($_POST['submit'])||!strlen($_POST['submit'])){
        throw new Exception('invalidSubmit');
    }
    require 'connect_db.php';
    
    // Create a prepared statement
    if(!($stmt = $connection -> stmt_init())){
        throw new Exception();
    }

    
    if(!($stmt -> prepare("SELECT id, password FROM usersInfo WHERE email = ?"))){
        throw new Exception();
    }
    
      // Bind parameters
    if(!($stmt -> bind_param("s",$_POST['email']))){
        throw new Exception();
    }
    
      // Execute query
    if(!($stmt -> execute())){
        throw new Exception();
    }

    if(!($results = $stmt -> get_result())){
        throw new Exception();
    }

    $numOfRows = $results -> num_rows;
    
    if($numOfRows === 0) {
        throw new Exception('invalidCredentials');
    }

    if(!($row = $results -> fetch_assoc())){
        throw new Exception();
    }

    if(!password_verify($_POST['pass'],$row['password'])) {
        throw new Exception('invalidCredentials');
    }

    session_start();
    $_SESSION['userId']=$row['id'];
    
    $_SESSION['cart']=array();

    // Close statement
    if(!($stmt -> close())){
        throw new Exception();
    }

    if(!($connection -> close())){
        throw new Exception();
    };
    
    header("Location: ../show_profile.php?success=loggedIn");
    exit();
    

}
catch(Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../login.php?error=emptyFields");
        exit();
    }
    if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../login.php?error=invalidSubmit");
        exit();
    }
    if ($e->getMessage()==='invalidCredentials') {
        header("Location: ../login.php?error=invalidCredentials");
        exit();
    }
    else {
        header("Location: ../login.php?error=unexpectedError");
        exit();
    }
}
?>