<?php
try {
    if(!isset($_POST['quantity'])||!isset($_POST['productid'])){
        throw new Exception('emptyFields');
    }

    session_start();

    if(!isset($_SESSION['userId'])) {
        throw new Exception('mustLogin');
    }

    if(!isset($_POST['submit'])||!strlen($_POST['submit'])){
        throw new Exception('invalidSubmit');
    }

    //controlla che non ci sia già

    $alreadyInCart = false;
    
    foreach($_SESSION['cart'] as &$cart) {
        if ($cart['id'] === $_POST['productid']) {
            $cart['quantity'] = $cart['quantity'] + $_POST['quantity'];
            $alreadyInCart = true;
        }
    }

    if(!$alreadyInCart) {
        $product = array(
            'id' => $_POST['productid'],
            'name' => $_POST['name'],
            'picture' => $_POST['picture'],
            'quantity' => $_POST['quantity'],
            'priceperunit' => $_POST['price']
        );

        array_push($_SESSION['cart'],$product);

        header("Location: ../product.php?id=".$_POST['productid']."&success=insert");
        exit();

    } else {

        header("Location: ../product.php?id=".$_POST['productid']."&success=update");
        exit();
    }

} catch(Exception $e) {
    if ($e->getMessage()==='emptyFields') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=emptyFields");
        exit();
    }
    else if ($e->getMessage()==='mustLogin') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=mustLogin");
        exit();
    }
    else if ($e->getMessage()==='invalidSubmit') {
        header("Location: ../product.php?id=".$_POST['productid']."&error=invalidSubmit");
        exit();
    }
    else {
        header("Location: ../product.php?id=".$_POST['productid']."&error=unexpectedError");
        exit();
    }
}
?>