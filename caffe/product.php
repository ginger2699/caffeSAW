<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Purrfect Coffee</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script
      src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"
      crossorigin="anonymous"
    ></script>
    <!-- Google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--link href="assets/aos/aos.css" rel="stylesheet"-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <?php
       $page = 'store';
       require 'header1.php';
       ?>

    <section class="page-section">
      <!-- ======= Store Section ======= -->

        <?php
            if(isset($_GET['id']) && is_numeric($_GET['id'])){

                if(isset($_GET['success'])) {
                    echo'<div class="alert alert-success" role="alert">
                        The product it\'s been added to your cart!
                    </div>';
                }
    
                if(isset($_GET['error'])) {
                    switch($_GET['error']) {
                        case 'emptyFields':
                            echo'<div class="alert alert-danger" role="alert">
                                    Please select the amount of the desired product.
                                </div>';
                            break;
                        case 'insertFailed':
                            echo'<div class="alert alert-danger" role="alert">
                                    The desired product is already in your cart.
                                </div>';
                            break;
                        case 'invalidSubmit':
                        default:
                            echo'<div class="alert alert-danger" role="alert">
                                    An unexpected error occured, please try again.
                                </div>';
                            break;
                    }
                }

                require 'utils/connect_db.php';
    
                // Create a prepared statement
                if(!($stmt = $connection -> stmt_init())){
                    throw new Exception();
                }

                
                if(!($stmt -> prepare("SELECT p.id, p.name, description, price, c.name AS category, picture FROM product AS p JOIN productsCategory AS c ON p.category = c.id WHERE p.id = ?"))){
                    throw new Exception();
                }
                
                // Bind parameters
                if(!($stmt -> bind_param("s",$_GET['id']))){
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
                    throw new Exception();
                }
                
                if ($results->num_rows > 0) { 
                    while($product = $results->fetch_assoc()){

                        echo '
                        <div class="product-wrapper">
                            <div class="product-image-box"> 
                                <img src="'.$product["picture"].'" class="product-img" alt=""/>
                            </div>
                            <div class="product-info-box"> 
                                <div class="product-details-box bg-faded rounded p-5"> 

                                    <div class="product-details-container">
                                        <div class="product-name-container"> 
                                            <span>'.$product["name"].'</span><span>$'.$product["price"].'</span>
                                        </div>
                                        <div> 
                                            <p>'.$product["description"].'</p>
                                        </div>
                                        <div class="product-actions-container">
                                            <form action="utils/addToCart.php" method="post">
                                                <div class="product-actions-container"> 
                                                    <input name="productid" type="number" value="'.$product["id"].'" style="display: none;">
                                                    <input name="quantity" type="number" value="1"  min="1" max="100">
                                                    <input name="submit" type="submit" class="btn btn-primary btn-block" value="Add to cart">
                                                    <i class="fas fa-lg fa-cart-plus"></i>
                                                </div>
                                            </form>
                                            <div> 
                                                <a href="leaveReview.php?id='.$product["id"].'">Leave a Review!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';

                        //TODO : AGGIUNGERE IMMAGINE UTENTE
                        $limit=5;
                        $queryReviews = 'SELECT p.id, review, stars, date, u.name FROM productsReview as p JOIN usersInfo AS u ON user = u.id WHERE product = '.$product["id"].' LIMIT '.$limit;
                        $resultReviews = $connection->query($queryReviews);

                        if ($resultReviews !== false && $resultReviews->num_rows > 0) { 

                            echo '
                            <div class="scrollbar product-reviews-box rounded prod" id="style-2">
                                <div class="force-overflow">
                            <!--<div class="product-reviews-box bg-faded rounded"> 

                                <div class="overflow-auto product-reviews-container">-->
                            ';

                            while($review = $resultReviews->fetch_assoc()){ 

                                //TODO : AGGIUNGERE IMMAGINE UTENTE

                                echo '
                                    <div class="review mt-4">
                                        <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
                                            <div class="ml-2">
                                                <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">'.$review["name"].'</span><span class="dot"></span><span class="date">'.date_format(new DateTime($review['date']), 'd M Y').'</span></div>
                                                <div class="rating">';

                                                for ($i = 1; $i <= $review["stars"]; $i++) {
                                                    echo '<i class="fa fa-star"></i>';
                                                }
                                echo '
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">'.$review["review"].'</p>
                                        </div>
                                    </div>
                                ';
                            }
                            
                            echo '
                                    <div id="newReviews">
                                        <input id="productIdbButtonProd" type="number" value="'.$product["id"].'" style="display: none;">
                                        <button id ="reviewButtonProd" type="submit" value = "1" class="btn btn-primary btn-l">Vedi altre recensioni</button>
                                        <br><br>  
                                    </div>
                                </div>

                            </div>
                            ';
                        }
                        
                        echo '
                            </div>

                        </div>
                        ';
                    }
                }

                
                // Close statement
                if(!($stmt -> close())){
                    throw new Exception();
                }

                if(!($connection -> close())){
                    throw new Exception();
                };

            } else {
                //TODO : verificare, c'è bisognodi header?
                //header("Location: index.php");
                echo'<div class="alert alert-danger" role="alert">
                    An unexpected error occured, please try again.
                </div>';
                exit();
            }
            
        ?>
        
    </section>

    <!-- End Store Section -->
    <?php require 'footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/aos/aos.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/reviews.js"></script>
  </body>
</html>
