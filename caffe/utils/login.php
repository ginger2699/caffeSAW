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
    $stmt = $connection -> stmt_init();
    /*if(!$stmt){
        header("Location: ../registration.php?error=unexpectedError");
        exit();
    }*/
    
    $stmt -> prepare("SELECT id, password FROM usersInfo WHERE email = ?");
    
      // Bind parameters
    $stmt -> bind_param("s",$_POST['email']);
    
      // Execute query
    $stmt -> execute();
    if(!$stmt){
        echo'error';
        die();
    }

    $results = $stmt -> get_result();

    $numOfRows = $results -> num_rows;
    
    if($numOfRows === 0) {
        throw new Exception('invalidCredentials');
    }

    $row = $results -> fetch_assoc();

    if(!password_verify($_POST['pass'],$row['password'])) {
        throw new Exception('invalidCredentials');
    }

    session_start();
    $_SESSION['userId']=$row['id'];

    var_dump($row['id']);
    echo $row['id'];


    // Close statement
    $stmt -> close();
    
    $connection -> close();
    
    header("Location: ../login.php?success=loggedIn");
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