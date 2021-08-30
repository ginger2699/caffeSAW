<?php
try{
/*same error for all empty fields*/
if(!isset($_POST['firstname'])||!strlen($_POST['firstname'])||
    !isset($_POST['lastname'])||!strlen($_POST['lastname'])||
    !isset($_POST['email'])||!strlen($_POST['email'])||
    !isset($_POST['pass'])||!strlen($_POST['pass'])||
    !isset($_POST['confirm'])||!strlen($_POST['confirm'])){

    throw new Exception('emptyFields');
}

if(!isset($_POST['submit'])||!strlen($_POST['submit'])){
    throw new Exception('invalidSubmit');
}
/*telephone number is not required so we're going to fill with an empty string to avoid errors*/
if(!isset($_POST['phonenumber'])){
    $_POST['phonenumber']='';
}
if ($_POST['pass'] != $_POST['confirm']) {
    throw new Exception('invalidPassword');
  }
require 'connect_db.php';

// Create a prepared statement
$stmt = $connection -> stmt_init();
if(!$stmt){
    throw new Exception();
}

if(!($stmt -> prepare("INSERT INTO usersInfo VALUES (DEFAULT,?,?,?,?,?)"))){
    throw new Exception();
}

//hash password
$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

  // Bind parameters
if(!($stmt -> bind_param("sssss", $_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phonenumber'],$hash))){
    throw new Exception();
}

  // Execute query
if(!($stmt -> execute())){
    throw new Exception();
}

// Close statement
if(!($stmt -> close())){
    throw new Exception();
}

if(!($connection -> close())){
    throw new Exception();
}

header("Location: ../html/login.php?success=yes");
exit();

}
catch (Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../html/registration.php?error=emptyFields");
        exit();
    }
    if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../html/registration.php?error=invalidSubmit");
        exit();
    }
    if ($e->getMessage()==='invalidPassword') {
        header("Location: ../html/registration.php?error=invalidPassword");
        exit();
    }
    else {
        header("Location: ../html/registration.php?error=unexpectedError");
        exit();
    }
}
?>