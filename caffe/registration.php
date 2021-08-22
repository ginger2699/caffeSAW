<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purrfect Coffee - Registration</title>
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
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Register Now!</span>
                                <span class="section-heading-lower">Met our beatiful cats</span>
                            </h2>
                            <?php      
                            if(isset($_GET['error'])){
                                if($_GET['error']=='emptyFields'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            Please fill in all fields stupid whore
                                        </div>';
                                }
                                if($_GET['error']=='invalidPassword'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            The two passwords do not match
                                        </div>';
                                }
                                if($_GET['error']=='unexpectedError'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            An unexpected error occured, please try again.
                                        </div>';
                                }
                            }?>  
                            <form action="utils/registration.php" method="post">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input required name="firstname" class="form-control" placeholder="First name" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input required name="lastname" class="form-control" placeholder="Last name" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input required name="email" class="form-control" placeholder="Email address" type="email">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <select class="custom-select" style="max-width: 120px;">
                                    <option selected="">+39</option>
                                    <option value="1">+38</option>
                                    <option value="2">+35</option>
                                    <option value="3">+73</option>
                                </select>
                                <input name="phonenumber" class="form-control" placeholder="Phone number" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input required name="pass" class="form-control" placeholder="Create password" type="password">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input required name="confirm" class="form-control" placeholder="Repeat password" type="password">
                            </div> <!-- form-group// -->                                      
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create Account">
                            </div> <!-- form-group// -->      
                            <p class="text-center">Already have an account? <a href="login.php">Log In</a> </p>                                                                 
                        </form>
                            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                        </div>
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
        <script src="js/scripts.js"></script>
    </body>
</html>
