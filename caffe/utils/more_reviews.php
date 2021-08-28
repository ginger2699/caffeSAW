<?php 
session_start();
try{

    if((!isset($_POST['offset']))||(!isset($_SESSION['userId']))){
        throw new Exception();
    }
    $limit = 5;
    require 'connect_db.php';
    

    // Create a prepared statement
    $stmt = $connection -> stmt_init();
    if(!$stmt){
        throw new Exception();
    }
    $limit = (int)$limit;
    $offsetR=(int)$_POST['offset'];
    $offsetR=$offsetR*$limit;
    $sql = "SELECT productsreview.stars, productsreview.review, productsreview.date, product.name FROM productsreview 
    JOIN product ON productsreview.product=product.id WHERE user =? LIMIT ?,?";

    if(!($stmt -> prepare($sql))){
        throw new Exception();
    }

    // Bind parameters
    if(!($stmt -> bind_param("sss",$_SESSION['userId'],$offsetR,$limit))){
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
        throw new Exception('NoMoreReviews');
    }

    while($row = $results -> fetch_assoc()){
        echo'
        <div class="review mt-4">
        <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
            <div class="ml-2">
                <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">'.$row['name'].'</span><span>'.str_repeat('&nbsp;', 5).'</span><span class="dot"></span><span class="date">'.$row['date'].'</span></div>
                <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            </div>
        </div>
        <div class="mt-2">
            <p class="comment-text">'.htmlspecialchars($row['review']).'</p>
        </div>
        </div>
        ';
    }
    // Close statement
    if(!($stmt -> close())){
        throw new Exception();
    }

    if(!($connection -> close())){
        throw new Exception();
    }
    echo'<div id="newReviews">
    <button id = "reviewButton" type="submit" value = "'.((int)$_POST['offset']+1).'" class="btn btn-primary btn-l">Vedi altre recensioni</button>  
    </div>';

}
catch (Exception $e){
    if ($e->getMessage()==='NoMoreReviews') {
        echo'All reviews already displayed.';
        exit();

    }
    else {
        echo'Unexpected error, please try again.';
        exit();
    }
}
