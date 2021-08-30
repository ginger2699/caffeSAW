<!DOCTYPE html>
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
<!-- Cart -->
<script type="text/javascript">
    function deleteFromCart(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4) {
                if (this.status != 200) {
                    document.getElementById("alerts").innerHTML = '<div class="alert alert-danger" role="alert">An unexpected error occured, please try again.</div>';
                } else {
                    location.reload();
                }
            }
        };
        xmlhttp.open("POST", "utils/removeFromCart.php?productid=" + id, true);
        xmlhttp.send();
    }
</script>
<?php 
    if(isset($_SESSION['userId'])) {
    
    echo '
    <div id="login_bar" style="text-align: right">                                               
                <ul id="login_signup">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                            <i class="fas fa-lg fa-cart-plus"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">';
                            
    if(count($_SESSION['cart']) > 0) {
        $subtotal = 0;

        foreach($_SESSION['cart'] as $cart) {
            $productprice = $cart['priceperunit'] * $cart['quantity'];
            $subtotal += $productprice;
            echo '
                                <div class="cart-element">
                                    <div class="box">
                                        <img class="cart-img" src="'.$cart['picture'].'" class="product-img" alt=""/>
                                    </div>
                                    <div class="box cart-element-info">
                                        <div class="name"><span>'.$cart['name'].'</span></div>
                                        <div class="price"><span>$'.number_format($productprice, 2, '.', '').'</span></div>
                                        <div class="delete">
                                            <span onclick="deleteFromCart('.$cart['id'].')">REMOVE</span>                 
                                        </div>
                                    </div>
                                    <div class="box cart-element-quantity">
                                        <span>'.$cart['quantity'].'</span>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>';
        }

        echo '
                                <div class="cart-element">
                                    <div class="box cart-total-info">
                                        <div class="name"><span>Subtotal:</span></div>
                                        <div class="price"><span>$'.number_format($subtotal, 2, '.', '').'</span></div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>                        
        
                                <div class="cart-checkout">
                                    <form action="utils/checkout.php" method="post"> 
                                        <input name="submit" type="submit" class="btn btn-primary btn-block" value="Proceed to Checkout">
                                    </form>
                                </div>';
                            
    } else {
        echo'                   <div class="cart-element">
                                    <div class="box cart-element-info">
                                        <div><span>The cart is empty</span></div>
                                    </div>
                                </div>';
    }

    echo '              </div>
                    </li>
                </ul>
    </div>';

    } 
?>
<div id="alerts"></div>