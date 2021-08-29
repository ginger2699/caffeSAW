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
       $page = 'menu';
       require 'header1.php';
    ?>
    <!--NOT in use
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ml-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Blended to Perfection</span>
                                <span class="section-heading-lower">Coffees & Teas</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-01.jpg" alt="..." />
                    <div class="product-item-description d-flex mr-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">We take pride in our work, and it shows. Every time you order a beverage from us, we guarantee that it will be an experience worth having. Whether it's our world famous Venezuelan Cappuccino, a refreshing iced herbal tea, or something as simple as a cup of speciality sourced black coffee, you will be coming back for more.</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex mr-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Delicious Treats, Good Eats</span>
                                <span class="section-heading-lower">Bakery & Kitchen</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-02.jpg" alt="..." />
                    <div class="product-item-description d-flex ml-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.</p></div>
                    </div>
                </div>
            </div>
        </section>
        -->
    <section class="page-section">
    <!-- ======= Menu Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                <?php
                  require 'utils/connect_db.php';
                  $sql = "SELECT filterName FROM menufilter";
                  $result = $connection->query($sql);
                  
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                      echo'
                      <li data-filter=".filter-'.$row["filterName"].'">'.$row["filterName"].'</li>
                      ';
                    }
              
    
                  } 
                  else {
                      header("Location: ../index.php");
                      exit();
                  }
    
                ?>
              </ul>
            </div>
          </div>

          <div
            class="row menu-container"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <?php
              $sql = "SELECT dish, ingredients, price, filter, picture FROM menuItems";
              $result = $connection->query($sql);
              
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  echo'
                  <div class="col-lg-6 menu-item filter-'.$row["filter"].'">
                    <img
                      src="'.$row["picture"].'"
                      class="menu-img"
                      alt=""
                    />
                    <div class="menu-content"><a>'.$row["dish"].'</a> <span>$'.$row["price"].'</span></div>
                    <div class="menu-ingredients">'.$row["ingredients"].'</div>
                  </div>
                  ';
                }
          
              $connection->close();

              } 
              else {
                  $connection->close();
                  header("Location: ../index.php");
                  exit();
              }

            ?>
            <!--<div class="col-lg-6 menu-item filter-specialty">
              <img
                src="assets/img/menu/bread-barrel.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Bread Barrel</a><span>$6.95</span>
              </div>
              <div class="menu-ingredients">
                Lorem, deren, trataro, filede, nerada
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-starters">
              <img src="assets/img/menu/cake.jpg" class="menu-img" alt="" />
              <div class="menu-content">
                <a href="#">Crab Cake</a><span>$7.95</span>
              </div>
              <div class="menu-ingredients">
                A delicate crab cake served on a toasted roll with lettuce and
                tartar sauce
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="" />
              <div class="menu-content">
                <a href="#">Caesar Selections</a><span>$8.95</span>
              </div>
              <div class="menu-ingredients">
                Lorem, deren, trataro, filede, nerada
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-specialty">
              <img
                src="assets/img/menu/tuscan-grilled.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Tuscan Grilled</a><span>$9.95</span>
              </div>
              <div class="menu-ingredients">
                Grilled chicken with provolone, artichoke hearts, and roasted
                red pesto
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-starters">
              <img
                src="assets/img/menu/mozzarella.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Mozzarella Stick</a><span>$4.95</span>
              </div>
              <div class="menu-ingredients">
                Lorem, deren, trataro, filede, nerada
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img
                src="assets/img/menu/greek-salad.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Greek Salad</a><span>$9.95</span>
              </div>
              <div class="menu-ingredients">
                Fresh spinach, crisp romaine, tomatoes, and Greek olives
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img
                src="assets/img/menu/spinach-salad.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Spinach Salad</a><span>$9.95</span>
              </div>
              <div class="menu-ingredients">
                Fresh spinach with mushrooms, hard boiled egg, and warm bacon
                vinaigrette
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-specialty">
              <img
                src="assets/img/menu/lobster-roll.jpg"
                class="menu-img"
                alt=""
              />
              <div class="menu-content">
                <a href="#">Lobster Roll</a><span>$12.95</span>
              </div>
              <div class="menu-ingredients">
                Plump lobster meat, mayo and crisp lettuce on a toasted bulky
                roll
              </div>
            </div>
          </div>
        </div>
      </section>
      -->
      <!-- End Menu Section -->
    </section>
            </section>

    <?php
       require 'footer.php';
       ?>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/aos/aos.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
