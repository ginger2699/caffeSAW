<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purrfect Coffee - Login</title>
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
                                <span class="section-heading-lower">LOGIN</span>
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
                            }
                            if(isset($_GET['success'])){
                                if($_GET['success']=='yes'){
                                    echo'<div class="alert alert-success" role="alert">
                                            Registration complete, please log in.
                                        </div>';
                                }
                                if($_GET['success']=='loggedIn'){
                                if(isset($_SESSION['userId'])){ 
                                    $id = $_SESSION['userId'];

                                        echo'<div class="alert alert-success" role="alert">
                                            You\'re logged in set!'.strval($id).'
                                        </div>';
                                }else{
                                        echo'<div class="alert alert-success" role="alert">
                                            You\'re logged in!
                                        </div>';
                                    }
                                    
                                }
                            }?> 
                            <form action="utils/login.php" method="post">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="email" class="form-control" placeholder="Email address" type="email">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="pass" class="form-control" placeholder="Insert password" type="password">
                            </div> <!-- form-group// -->                                    
                            <div class="form-group">
                                <input name= "submit" type="submit" class="btn btn-primary btn-block" value="Log In"> <!--da collegare poi alla pagina dell'utente -->
                            </div> <!-- form-group// -->      
                            <p class="text-center">New to the website? <a href="registration.php">Sign In</a> </p>                                                                 
                        </form>
                            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
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
        <script src="js/scripts.js"></script>
    </body>
</html>
