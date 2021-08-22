<!DOCTYPE html>
<div id="login_bar" style="text-align: right">                                               
            <ul id="login_signup">
                <li><a href="login.php" id="login_link">Login </a></li>
                <!-- <li><a href="#" id="sign_link">SignUp </a></li> -->
            </ul>
</div>
<h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">PURRfect Coffee</span>
    <span class="site-heading-lower">Our cat café in the middle of the city</span>
</h1>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="index.php">PURRfect Coffee</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul id="navbar-nav" class="navbar-nav mx-auto">
                <?php        
                    if(isset($page)){                
                        if($page==='home') {
                            echo '<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="index.php">Home<span class="sr-only">(current)</span></a></li>';
                        } else {
                            echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="index.php">Home</a></li>';
                        }
                        if($page==='about') {
                            echo '<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="about.php">About</a></li>';
                        } else {
                            echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="about.php">About</a></li>';
                        }
                        if($page==='menu') {
                            echo '<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="menu.php">Menu</a></li>';
                        } else {
                            echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="menu.php">Menu</a></li>';
                        }
                        if($page==='store') {
                            echo '<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="store.php">Store</a></li>';
                        } else {
                            echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="store.php">Store</a></li>';
                        }
                    } else {
                        echo '<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="index.php">Home</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="about.php">About</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="menu.php">Menu</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="store.php">Store</a></li>';
                    }
                ?>
                <?php
                session_start();
                if(isset($_SESSION['userId'])){
                    echo'<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                    PROFILE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="show_profile.php">View Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="utils/logout.php">Logout</a>
                    </div>
                  </li>';
                }
                else{
                    if(isset($page)){ 
                        if($page==='login') {
                            echo'<li class="nav-item active px-lg-4"><a class="nav-link text-uppercase text-expanded" href="login.php">Login</a></li>';
                        } else {
                            echo'<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="login.php">Login</a></li>';
                        }
                    } else {
                        echo'<li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="login.php">Login</a></li>';
                    }
                }
                ?>
                <form class="form-inline my-2 ml-4 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </div>
</nav>