<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo" target="index.php"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php">All Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?c=table">Tables</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?c=chair">Chairs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?c=sofa">Sofas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?c=dining">Dining Tables</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a href=""><i class="ti-heart"></i></a>
                        <a href="cart.php">
                            <i title="Cart" class="fas fa-cart-plus"></i>
                        </a>
                        <?php if (isset($_SESSION['login_status'])) { ?>
                            <div class="dropdown">
                                <a href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="myprofile.php"> My Profile </a>
                                    <a class="dropdown-item" href="orders.php">My Orders</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a href="login.php" style="margin-left: 15px; line-height: 30px" class="genric-btn primary small">Log In </a>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>