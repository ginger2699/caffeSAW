<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Purrfect Coffee - Reset Password</title>
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
       $page = 'login';
       require 'header1.php';
       ?>

        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">RESET PASSWORD</span>
                            </h2>
                            <?php
      
                            if(isset($_GET['error'])){
                                if($_GET['error']=='emptyFields'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            Please fill in all fields?
                                        </div>';
                                }
                                if($_GET['error']=='invalidCredentials'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            Email not registered.
                                        </div>';
                                }
                                if($_GET['error']=='invalidPassword'){
                                    echo'<div class="alert alert-danger" role="alert">
                                            The two password do not match.
                                        </div>';
                                }
                                else{
                                    echo'<div class="alert alert-danger" role="alert">
                                        Connection error, please try again later.
                                    </div>';
                                }
                            }
                            if(isset($_GET['key'])&&isset($_GET['token'])){
                                include "utils/connect_db.php";
                                $email = $_GET['key'];
                                $token = $_GET['token'];
                                // Create a prepared statement
                                if(!($stmt = $connection -> stmt_init())){
                                    throw new Exception();
                                }

                                if(!($stmt -> prepare("SELECT * FROM tokenrecoverpassword WHERE token=? and email=?"))){
                                    throw new Exception("error1");
                                }
                                
                                // Bind parameters
                                if(!($stmt -> bind_param("ss",$token,$email))){
                                    throw new Exception("error2");
                                }
                                
                                // Execute query
                                if(!($stmt -> execute())){
                                    throw new Exception("error3");
                                }

                                if(!($results = $stmt -> get_result())){
                                    throw new Exception("error4");
                                }

                                $numOfRows = $results -> num_rows;
                                
                                if($numOfRows === 0) {
                                    throw new Exception('invalidCredentials');
                                }

                                $curDate = date("Y-m-d");

                                if(!($row = $results -> fetch_assoc())){
                                    throw new Exception();
                                }
                                //var_dump($row['expDate']);
                                //var_dump($curDate);
                                if($row['expDate'] < $curDate){
                                    throw new Exception("InvalidDate");
                                }

                            ?>
                            <form action="utils/update_password.php" method="post">
                            <div class="form-group input-group">
                                <input hidden name="email" class="form-control" type="email" value="<?php echo $email;?>">
                                <input hidden type="text" name="token" value="<?php echo $token;?>">
                            </div> <!-- form-group// -->   
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="pass" class="form-control" type="password" placeholder="Insert password">
                            </div> <!-- form-group// -->  
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="confirm" class="form-control" type="password" placeholder="Repeat password">
                            </div> <!-- form-group// -->                                
                            <div class="form-group">
                                <input name= "changepass" type="submit" class="btn btn-primary btn-block" value="Change Password">
                            </div> <!-- form-group// -->                                                                     
                            </form>
                            <?php 
                            }
                            else{
                                echo'<p>This forgot password link has been expired</p>';
                            }
                            ?>
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
