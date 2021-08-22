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
       require 'header1.php';
       ?>

    <section class="page-section">
      <!-- ======= Store Section ======= -->

        <section id="store" class="store section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Store</h2>
                    <p>Check Our Cute Merch</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="store-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-tshirts">T-Shirts</li>
                            <li data-filter=".filter-pins">Pins</li>
                            <li data-filter=".filter-mugs">Mugs</li>
                        </ul>
                    </div>
            </div>

            <div
                class="row store-container"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <div class="col-lg-3 store-item filter-tshirts">
                    <div class="store-card">
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/lobster-bisque.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Meowglietta</a><span>$5.95</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 store-item filter-pins">
                    <div class="store-card">
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/cake.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Saphie Pin</a><span>$6.95</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 store-item filter-mugs">
                    <div class="store-card">  
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/bread-barrel.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Cat Paw Mug</a><span>$6.95</span>
                        </div>
                    </div> 
                </div>  
                
                <!-- INIZIO DUPLICATI -->
                
                <div class="col-lg-3 store-item filter-tshirts">
                    <div class="store-card">
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/lobster-bisque.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Meowglietta</a><span>$5.95</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 store-item filter-pins">
                    <div class="store-card">
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/cake.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Saphie Pin</a><span>$6.95</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 store-item filter-mugs">
                    <div class="store-card">  
                        <div class="store-img-container">
                            <img
                                src="assets/img/menu/bread-barrel.jpg"
                                class="store-img"
                                alt=""
                            />
                        </div>
                        <div class="store-content">
                            <a href="#">Cat Paw Mug</a><span>$6.95</span>
                        </div>
                    </div> 
                </div> 
                
                <!-- FINE DUPLICATI -->


            </div>
            
        </section>

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
