<?php 
session_start();
try{

    if(!isset($_POST['offset'])){
        throw new Exception('1');
    }
    if(!isset($_SESSION['userId']) && !isset($_POST['prodId'])){
        throw new Exception('1b');
    }
    $limit = 5;
    require 'connect_db.php';
    

    // Create a prepared statement
    $stmt = $connection -> stmt_init();
    if(!$stmt){
        throw new Exception('2');
    }
    $limit = (int)$limit;
    $offsetR=(int)$_POST['offset'];
    $offsetR=$offsetR*$limit;
    $sql = "SELECT productsreview.id, productsreview.stars, productsreview.review, productsreview.date, product.name FROM productsreview 
    JOIN product ON productsreview.product=product.id WHERE user =? LIMIT ?,?";

    if(isset($_POST['prodId'])){
        $sql  = 'SELECT p.id, review, stars, date, u.name FROM productsReview as p JOIN usersinfo AS u ON user = u.id WHERE product = ? LIMIT ?,?';
    }

    if(!($stmt -> prepare($sql))){
        throw new Exception('3');
    }

    // Bind parameters
    if(isset($_POST['prodId'])){
        if(!($stmt -> bind_param("sss",$_POST['prodId'],$offsetR,$limit))){
            throw new Exception('4');
        }
    }
    else if(isset($_SESSION['userId'])){
        if(!($stmt -> bind_param("sss",$_SESSION['userId'],$offsetR,$limit))){
            throw new Exception('5');
        }
    }


    // Execute query
    if(!($stmt -> execute())){
        throw new Exception('6');
    }

    if(!($results = $stmt -> get_result())){
        throw new Exception('7');
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
        </div>';
        if (isset($_SESSION['userId'])&&!isset($_POST['prodId'])){
            echo'<a class="trashcanicon" href="../utils/delete_review.php?id='.$row["id"].'"><i class="fas fa-trash"></i></a>
            ';

        }
        echo'</div>
        ';
    }
    // Close statement
    if(!($stmt -> close())){
        throw new Exception('8');
    }

    if(!($connection -> close())){
        throw new Exception('9');
    }

    // Bind parameters
    if(isset($_POST['prodId'])){
        echo'<div id="newReviews">
        <input id="productIdbButtonProd" type="number" value="'.htmlspecialchars($_POST['prodId']).'" style="display: none;">
        <button id = "reviewButtonProd" type="submit" value = "'.((int)$_POST['offset']+1).'" class="btn btn-primary btn-l">Show more reviews</button> 
        <br><br>  
        </div>';
    }
    else if(isset($_SESSION['userId'])){
        echo'<div id="newReviews">
        <button id = "reviewButton" type="submit" value = "'.((int)$_POST['offset']+1).'" class="btn btn-primary btn-l">Show more reviews</button> 
        <br><br>   
        </div>';
    }




}
catch (Exception $e){
    if ($e->getMessage()==='NoMoreReviews') {
        echo'All reviews already displayed.<br><br>';
        exit();

    }
    else{
        exit();
    }
   /* else {
        echo'Unexpected error, please try again.';
        exit();
    }*/
}
