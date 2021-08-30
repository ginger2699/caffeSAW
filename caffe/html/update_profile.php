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
                <div class="row style='border: 1px solid black'">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <p class="mytitle" align="center"><strong>Information</strong></p>
                        <!--<p><br></p>-->
                        <?php
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
                        $sql = "SELECT name, surname, email, phonenumber FROM usersInfo WHERE id =".$_SESSION['userId'];
                        $result = $connection->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                        $row = $result->fetch_assoc();
                        echo'
                        <form action="../utils/update_profile.php" method="post">
                        <h5 class="section-heading-upper"> <input required name="firstname" class="form-control" value="'.$row["name"].'" type="text"> </a></h5>
                        <h5 class="section-heading-upper"> <input required name="lastname" class="form-control" value="'.$row["surname"].'" type="text"> </a></h5>
                        <h5 class="section-heading-upper"> <input required name="email" class="form-control" value="'.$row["email"].'" type="text"> </a></h5>
                        <h5 class="section-heading-upper"> <input required name="phonenumber" class="form-control" value="'.$row["phonenumber"].'" type="text"> </a></h5>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Confirm Info">
                        </form>
                        ';
                        $connection->close();

                        } 
                        else {
                            $connection->close();
                            header("Location: ./login.php");
                            exit();
                        }

                        ?>

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
    </body>
</html>
