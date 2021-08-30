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
    <link href="../css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <?php
       $page = 'store';
       require 'header1.php';
       ?>

    <section class="page-section">
      <!-- ======= Store Section ======= -->

        <section id="store" class="store section-bg">

            <?php
                if(isset($_GET['success'])) {
                    echo'<div class="alert alert-success" role="alert">
                        Thank you for your purchase!
                    </div>';
                }
                if(isset($_GET['error'])) {
                    echo'<div class="alert alert-danger" role="alert">
                        An unexpected error occured, please try again.
                    </div>';
                }
            ?>


            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Store</h2>
                    <p>Check Our Cute Merch</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="store-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <?php
                                require '../utils/connect_db.php';
                                $sql = "SELECT name FROM productsCategory";
                                $result = $connection->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                    echo'
                                    <li data-filter=".filter-'.$row["name"].'">'.$row["name"].'</li>
                                    ';
                                    }
                            
                    
                                } 
                                else {
                                    header("Location: index.php");
                                    exit();
                                }       
                            ?>
                        </ul>
                    </div>
            </div>

            <div
                class="row store-container"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <?php
                    $sql = "SELECT p.id, p.name, category, description, price, c.name AS category, picture FROM product as p JOIN productsCategory AS c ON p.category = c.id";
                    if(isset($_GET['searchbar'])){
                        echo '<h5 class="pb-3 mb-4 font-italic" style="color:white;">
                        Results for \''.htmlspecialchars($_GET['searchbar'])."' are <a href=\"store.php\"><i class=\"fas fa-times-circle\"></i></a> :</h5>"; 
                        $search = $connection -> real_escape_string($_GET['searchbar']);
                        $sql = "SELECT p.id, p.name, category, description, price, c.name AS category, picture FROM product as p JOIN productsCategory AS c ON p.category = c.id WHERE p.name LIKE '%$search%' OR p.description LIKE '%$search%'";
                    }
                    $result = $connection->query($sql);
                    if(!$result){
                        $connection->close();
                        echo '<h5 class="pb-3 mb-4 font-italic" style="color:white;">There are no results for this query.</h5>';
                    }else{
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                        echo '
                        <div class="col-lg-4 store-item filter-'.$row["category"].'">
                            <div class="store-card">
                                <div class="store-img-container">
                                    <img
                                        src="'.$row["picture"].'"
                                        class="store-img"
                                        alt=""
                                    />
                                </div>
                                <div class="store-content">
                                    <a href="product.php?id='.$row["id"].'">'.$row["name"].'</a><span>$'.number_format($row["price"], 2, '.', '').'</span>
                                </div>
                            </div>
                        </div>';
                        }
                
                    $connection->close();

                    } 
                    else {
                        $connection->close();
                        echo '<h5 class="pb-3 mb-4 font-italic" style="color:white;">There are no results for this query.</h5>';
                    }
                }
                ?>
            </div>
        
        </section>

    </section>

    <!-- End Store Section -->
    <?php require 'footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/aos/aos.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
  </body>
</html>
