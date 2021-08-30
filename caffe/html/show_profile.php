<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purrfect Coffee - Profile</title>
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
       require 'header1.php';
       ?>
        <section class="page-section cta">
        <div class="container">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card profileCard">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
                      require '../utils/connect_db.php';
                      $sql = "SELECT avatar.path FROM usersInfo JOIN avatar ON usersInfo.path=avatar.id  WHERE usersInfo.id =".$_SESSION['userId'];
                      $result = $connection->query($sql);
                      
                      if ($result->num_rows > 0) {
                        // output data of each row
                      $row = $result->fetch_assoc();
                      echo'<img class="resize" src="'.$row["path"].'" alt="Insert your profile pic">
                      ';
                      }                        
                      else {
                        header("Location: ./index.php");
                        exit();
                      }
                    ?>
                    <a class="trashcanicon" href="choose_profile_pic.php"><i class="fas fa-pencil-alt"></i> Change your profile pic </a>
                  </div>
                </div>
              </div>
                <div class="card mt-3 profileCard">
                    <ul class="list-group list-group-flush">
                    <?php
                        if(isset($_GET['success'])){
                            if($_GET['success']=='yes'){
                                echo'<div class="alert alert-success" role="alert">
                                        Update complete.
                                    </div>';
                            }
                            if($_GET['success']=='loggedIn'){
                              if(isset($_SESSION['userId'])){ 
                                      echo'<div class="alert alert-success" role="alert">
                                          You\'re logged in!
                                      </div>';
                              }
                            }
                            if($_GET['success']=='profile'){
                              if(isset($_SESSION['userId'])){ 
                                      echo'<div class="alert alert-success" role="alert">
                                          Profile pic updated!
                                      </div>';
                              }
                            }
                        }
                        $sql = "SELECT name, surname, email, phonenumber FROM usersInfo WHERE id =".$_SESSION['userId'];
                        $result = $connection->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                        $row = $result->fetch_assoc();
                        echo'
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <div class="row">
                            <div class="col-sm-6">
                              <h6 class="mb-0">First Name : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">'.$row["name"].'</div>
                          </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <div class="row">
                            <div class="col-sm-6">
                              <h6 class="mb-0">Last Name : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">'.$row["surname"].'</div>
                          </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <div class="row">
                            <div class="col-sm-6">
                              <h6 class="mb-0">Email : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">'.$row["email"].'</div>
                          </div>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <div class="row">
                            <div class="col-sm-6">
                              <h6 class="mb-0">Phone number : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">'.$row["phonenumber"].'</div>
                          </div>
                          </li>';
                        $connection->close();
                        } 
                        else {
                            $connection->close();
                            header("Location: ./login.php");
                            exit();
                          }
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                <a class="btn btn-primary btn-l" target="__blank" href="update_profile.php">Update your profile!</a>
                                </div>
                                <div class="col-sm-6">
                                <a class="btn btn-primary btn-l" target="__blank" href="reset_password.php">Change your password!</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3 profileCard">
                <div class="card-body">
                    <h4>Your reviews!</h4>
                            <?php
                            $limit = 5;
                            if(isset($_GET['error'])){
                                if($_GET['error']=='emptyFields'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            Please fill in all fields.
                                        </div>';
                                }
                                if($_GET['error']=='unexpectedError'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            An unexpected error occured, please try again.
                                        </div>';
                                }
                            }  
                            require '../utils/connect_db.php';
                            $sql = "SELECT productsreview.id, productsreview.stars, productsreview.review, productsreview.date, product.picture, product.name FROM productsreview 
                            JOIN product ON productsreview.product=product.id WHERE user =".$_SESSION['userId']." LIMIT ".$limit;
                            $result = $connection->query($sql); 
                            if ($result->num_rows > 0) {
                              echo'                    
                                <div class="scrollbar" id="style-2">
                                  <div class="force-overflow">';
                            // output data of each row
                                while($row = $result->fetch_assoc()){
                                    echo'
                                    <div class="review mt-4">
                                    <div class="d-flex flex-row comment-user"><img class="rounded" src="'.$row['picture'].'" width="40">
                                        <div class="ml-2">
                                            <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">'.$row['name'].'</span><span>'.str_repeat('&nbsp;', 5).'</span><span class="dot"></span><span class="date">'.$row['date'].'</span></div>
                                            <div class="rating">';

                                            for ($i = 1; $i <= $row["stars"]; $i++) {
                                                echo '<i class="fa fa-star"></i>';
                                            }
                                            echo'
                                             </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">'.htmlspecialchars($row['review']).'</p>
                                    </div>
                                      <a class="trashcanicon" href="../utils/delete_review.php?id='.$row["id"].'"><i class="fas fa-trash"></i></a>
                                    </div>
                                    ';
                                }
                            $connection->close();
                            echo'
                                    <div id="newReviews">
                                      <button id = "reviewButton" type="submit" value = "1" class="btn btn-primary btn-l">Show more reviews</button>  
                                      <br><br>  
                                    </div>
                                  </div>
                                </div>';

                            } 
                            else {
                                $connection->close();
                                echo '<h6 class="mb-0">You have not left a review yet.</h6>';
                            }

                            ?>
            </div>
            </div>
        </div>
        </section>
        <?php
            require 'footer.php';
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../js/reviews.js"></script>
    </body>
</html>
