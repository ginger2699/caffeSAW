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

                require 'utils/connect_db.php';
                
                $queryProduct = 'SELECT p.id, p.name, description, price, c.name AS category, picture FROM product AS p JOIN productsCategory AS c ON p.category = c.id WHERE p.id = '.$_GET['id'];
                $resultProduct = $connection->query($queryProduct);
                
                if ($resultProduct !== false && $resultProduct->num_rows > 0) { 
                    while($product = $resultProduct->fetch_assoc()){


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
                                            <div> 
                                                <input type="number" value="1"  min="1" max="100">
                                                <a href="" class="me-4 text-reset">
                                                    <i class="fas fa-cart-plus"></i>
                                                </a>
                                            </div>
                                            <div> 
                                                <a href="#">Leave a Review!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';

                        //TODO : AGGIUNGERE IMMAGINE UTENTE
                        $queryReviews = 'SELECT p.id, review, stars, date, u.name FROM productsReview as p JOIN usersInfo AS u ON user = u.id WHERE product = '.$product["id"];
                        $resultReviews = $connection->query($queryReviews);

                        if ($resultReviews !== false && $resultReviews->num_rows > 0) { 

                            echo '
                            <div class="product-reviews-box bg-faded rounded"> 

                                <div class="overflow-auto product-reviews-container">
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

                $connection->close();

            } else {
                header("Location: index.php");
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
  </body>
</html>
