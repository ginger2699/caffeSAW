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
        <link href="css/styles.css" rel="stylesheet" />
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
                    <img src="https://i.imgur.com/xxJl1D7.jpg" alt="profileImage" class="rounded-circle" width="150">
                    <!--<div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                    </div>-->
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
                        }
                        require 'utils/connect_db.php';
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
                            header("Location: ../login.php");
                            exit();}
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                <a class="btn btn-info " target="__blank" href="update_profile.php">Update your profile!</a>
                                </div>
                                <div class="col-sm-6">
                                <a class="btn btn-info " target="__blank" href=#>Change your password!</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class=“row”>
                    <div class=“col-sm-8”> </div>
                    <div class=“col-sm-4”> Change Your Password </div>
                    <div class=“col-sm-4”><a class="btn btn-primary btn-xl" href="update_profile.php">Update your profile!</a></div>
                </div>
                </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3 profileCard">
                <div class="card-body">
                <h4>Your reviews!</h4>
                <div class="scrollbar" id="style-2">
                    <div class="force-overflow">
                        <?php
                        $limit = 10;
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
                        require 'utils/connect_db.php';
                        $sql = "SELECT productsreview.stars, productsreview.review, productsreview.date, product.name FROM productsreview 
                        JOIN product ON productsreview.product=product.id WHERE user =".$_SESSION['userId']." LIMIT ".$limit;
                        $result = $connection->query($sql); 
                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()){
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
                        $connection->close();

                        } 
                        else {
                            $connection->close();
                            header("Location: ../login.php");
                            exit();
                        }

                        ?>
                                <div class="review mt-4">
                                    <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
                                        <div class="ml-2">
                                            <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">Hui jhong</span><span class="dot"></span><span class="date">12 Aug 2020</span></div>
                                            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                    </div>
                                </div>
                                <div class="review mt-4">
                                    <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
                                        <div class="ml-2">
                                            <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">Hui jhong</span><span class="dot"></span><span class="date">12 Aug 2020</span></div>
                                            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id = "review button" type="submit" value = "1" class="btn btn-primary btn-l">Vedi altre recensioni</button>  
                </div>
              </div>
                <div class="row style='border: 1px solid black'">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <p class="mytitle" align="center"><strong>Information</strong></p>
                        <!--<p><br></p>-->
                        <img class="resize" src="assets/img/menu/lobster-bisque.jpg" alt="Insert your profile pic">
                    </div>

                    <div class="col-sm-6 hidden-xs col-lg-6">
                        <div class="scrollbar" id="style-2">
                            <div class="force-overflow">
                                <?php
                                $limit = 10;
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
                                require 'utils/connect_db.php';
                                $sql = "SELECT productsreview.stars, productsreview.review, productsreview.date, product.name FROM productsreview 
                                JOIN product ON productsreview.product=product.id WHERE user =".$_SESSION['userId']." LIMIT ".$limit;
                                $result = $connection->query($sql); 
                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_assoc()){
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
                                $connection->close();

                                } 
                                else {
                                    $connection->close();
                                    header("Location: ../login.php");
                                    exit();
                                }

                                ?>
                                <div class="review mt-4">
                                    <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
                                        <div class="ml-2">
                                            <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">Hui jhong</span><span class="dot"></span><span class="date">12 Aug 2020</span></div>
                                            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                    </div>
                                </div>
                                <div class="review mt-4">
                                    <div class="d-flex flex-row comment-user"><img class="rounded" src="https://i.imgur.com/xxJl1D7.jpg" width="40">
                                        <div class="ml-2">
                                            <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold">Hui jhong</span><span class="dot"></span><span class="date">12 Aug 2020</span></div>
                                            <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id = "review button" type="submit" value = "1" class="btn btn-primary btn-l">Vedi altre recensioni</button>
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
        <script src="js/scripts.js"></script>
    </body>
</html>
