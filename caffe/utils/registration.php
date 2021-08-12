<?php
if(!isset($_POST['firstname'])||!strlen($_POST['firstname'])){
    header("Location: ../registration.php?error=firstNameMissing");
    exit();
}
if(!isset($_POST['lastname'])||!strlen($_POST['lastname'])){
    header("Location: ../registration.php?error=lastNameMissing");
    exit();
}
if(!isset($_POST['email'])||!strlen($_POST['email'])){
    header("Location: ../registration.php?error=emailMissing");
    exit();
}
if(!isset($_POST['pass'])||!strlen($_POST['pass'])){
    header("Location: ../registration.php?error=passMissing");
    exit();
}
if(!isset($_POST['confirm'])||!strlen($_POST['confirm'])){
    header("Location: ../registration.php?error=confirmMissing");
    exit();
}
if(!isset($_POST['submit'])||!strlen($_POST['submit'])){
    header("Location: ../registration.php?error=invalidSubmit");
    exit();
}
/*telephone number is not required*/
if(!isset($_POST['phonenumber'])){
    $_POST['phonenumber']='';
}
?>