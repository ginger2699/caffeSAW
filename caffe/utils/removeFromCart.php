<?php
try {
    session_start();

    if(!isset($_SESSION['userId'])) {
        throw new Exception('mustLogin');
    }

    $productid = $_REQUEST["productid"];

    if(!isset($productid)||!is_numeric($productid)) {
        throw new Exception('invalidCall');
    }

    $found = false;
    $index = 0;
    foreach($_SESSION['cart'] as $cart) {
        if ($cart['id'] === $productid) {
            $found = true;
            break;
        }
        $index++;
    }

    if($found) {
        array_splice($_SESSION['cart'],$index,1);
    } else {
        throw  new Exception('notFound');
    }
 
    $return = array(
        'status' => 200,
        'message' => "OK"
    );
    
    http_response_code(200);
    
  
} catch(Exception $e) {
    if ($e->getMessage()==='invalidCall') {      
        $return = array(
            'status' => 403,
            'message' => "Forbidden"
        );
        http_response_code(403);
    }
    else if ($e->getMessage()==='mustLogin') { 
        $return = array(
            'status' => 401,
            'message' => "Unauthorized"
        );
        http_response_code(401);
    }
    else if($e->getMessage()==='notFound') {
        $return = array(
            'status' => 404,
            'message' => "Not found"
        );
        http_response_code(404);
    }
    else {
        $return = array(
            'status' => 500,
            'message' => "An unexpected error occured, please try again."
        );
        http_response_code(500);
    }
}
?>