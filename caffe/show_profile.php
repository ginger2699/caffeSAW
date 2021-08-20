<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Profile</title>
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
                <div class="row style='border: 1px solid black'">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <p class="mytitle" align="center"><strong>Information</strong></p>
                        <!--<p><br></p>-->
                        <img class="resize" src="assets/img/menu/lobster-bisque.jpg" alt="Insert your profile pic">
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
                        <h5 class="section-heading-upper">Name: '.$row["name"].'</a></h5>
                        <h5 class="section-heading-upper">Surname: '.$row["surname"].'</a></h5>
                        <h5 class="section-heading-upper">Email: '.$row["email"].'</a></h5>
                        <h5 class="section-heading-upper">Phone Number: '.$row["phonenumber"].'</a></h5>';
                    
                        $connection->close();

                        } 
                        else {
                            $connection->close();
                            header("Location: ../login.php");
                            exit();
                        }

                        ?>

                    </div>

                    <div class="col-sm-6 hidden-xs col-lg-6">
                        <div id="signup">
                            <a href="http://http://example.com/signup.php"><img class="center-block img-responsive" src="image/catalog/signupbox.png" width="405" height="200"></a>
                        </div>
                    </div>
                </div>
                <div class=“row”>
                    <div class=“col-sm-8”> 
                    </div>
                    <div class=“col-sm-4”> Change Your Password </div>
                    <div class=“col-sm-4”><a class="btn btn-primary btn-xl" href="update_profile.php">Update your profile!</a></div>
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
