<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purrfect Coffee - Review</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
       <?php
       $page = 'login';
       require 'header1.php';
       ?>

        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">LEAVE A REVIEW</span>
                            </h2>
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error']=='emptyFields'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            Please fill in all fields?
                                        </div>';
                                }
                                if($_GET['error']=='unexpectedError'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            An unexpected error occured, please try again.
                                        </div>';
                                }
                            }?>
                            <?php
                                if(isset($_GET['id'])){
                                    echo'
                                        <!--<div class="d-flex justify-content-between"></div>-->
                                            <div class="product-details-container"> 
                                                <span>Select the number of stars and leave a comment(optional)!</span>
                                            </div>
                                            <div class="product-actions-container">
                                                <form action="../utils/addReview.php" method="post">
                                                    <div class="product-actions-container"> 
                                                        <input name="productid" type="number" value="'.$_GET['id'].'" style="display: none;">
                                                        <div class="text-area-product">
                                                            <textarea name="description" type="text"></textarea>
                                                        </div>
                                                        <div class="rate">
                                                            <input required type="radio" id="star5" name="rate" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rate" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rate" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rate" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rate" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                        <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Review">
                                                        <i class="fas fa-lg fa-pen-square"></i>
                                                    </div>
                                                </form>
                                            </div>
                                            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                                        </div>
                                    ';
                                }
                                else {
                                    echo'<div class="alert alert-danger" role="alert">
                                    The product you searched does not exist, please go back to the store and select another product.
                                    </div>';
                                }
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
                        </section>
        <?php
       require 'footer.php';
       ?>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
