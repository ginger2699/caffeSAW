<?php
session_start();
try{
/*same error for all empty fields*/
if(!isset($_POST['firstname'])||!strlen($_POST['firstname'])||
    !isset($_POST['lastname'])||!strlen($_POST['lastname'])||
    !isset($_POST['email'])||!strlen($_POST['email'])){

    throw new Exception('emptyFields');
}

if(!isset($_POST['submit'])||!strlen($_POST['submit'])){
    throw new Exception('invalidSubmit');
}
/*telephone number is not required so we're going to fill with an empty string to avoid errors*/
if(!isset($_POST['phonenumber'])){
    $_POST['phonenumber']='';
}
require 'connect_db.php';

// Create a prepared statement
$stmt = $connection -> stmt_init();
if(!$stmt){
    throw new Exception();
}

if(!($stmt -> prepare("UPDATE usersInfo SET name = ?, surname = ?, email = ?, phonenumber = ? WHERE id = ?"))){
    throw new Exception('prepare');
}

// Bind parameters
if(!($stmt -> bind_param("sssss", $_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phonenumber'],$_SESSION['userId']))){
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

header("Location: ../show_profile.php?success=yes");
exit();

}
catch (Exception $e){
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../update_profile.php?error=emptyFields");
        exit();
    }
    if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../update_profile.php?error=invalidSubmit");
        exit();
    }
    if ($e->getMessage()==='prepare') {
        header("Location: ../update_profile.php?error=prepare");
        exit();
    }
    if ($e->getMessage()==='invalidCredentials') {
        header("Location: ../update_profile.php?error=invalidCredentials");
        exit();
    }
    else {
        header("Location: ../update_profile.php?error=unexpectedError");
        exit();
    }
}
?>