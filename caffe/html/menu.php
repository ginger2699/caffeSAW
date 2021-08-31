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
       $page = 'menu';
       require 'header1.php';
    ?>
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
                  require '../utils/connect_db.php';
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
                      header("Location: ./index.php");
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
                      src="'.htmlspecialchars($row["picture"]).'"
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
                  header("Location: ./index.php");
                  exit();
              }

            ?>
      <!-- End Menu Section -->
    </section>
            </section>

    <?php
       require 'footer.php';
       ?>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/aos/aos.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
  </body>
</html>
