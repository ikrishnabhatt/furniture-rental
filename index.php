<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WittyWarriors</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    session_start();

    ?>
    <?php include("header.php"); ?>
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Ultra Premium Sofas
                                                </h1>
                                            <p>Experience the comfort of our most premium sofas at an affordable price.</p>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth & Wood Sofa</h1>
                                            <p> Elegance and Comfort everything packed in one !</p>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Vegan leather Sofas</h1>
                                            <p>Sofas made from 100 % vegan material , we care for them just like you care for your furniture.</p>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest from Chairs</h3>
                    <img src="img/chair_nobg.png" alt="Chair" style="max-width: 100%; height: auto;">
                    <form id="form1" method="get" action="category.php?c=chair">
                        <button type="submit" name="c" value="chair" class="feature_btn" style="background: none;">EXPLORE NOW <i class="fas fa-play"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest from Tables</h3>
                    <img src="img/product/categories/table/table 1/table 1 (1).jpeg" alt="Table" style="max-width: 50%; height: auto;">
                    <form id="form2" method="get" action="category.php?c=table">
                        <button type="submit" name="c" value="table" class="feature_btn" style="background: none;">EXPLORE NOW <i class="fas fa-play"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest from Dining Tables</h3>
                    <img src="img/table_nobg.png" alt="Dining Table" style="max-width: 100%; height: auto;">
                    <form id="form3" method="get" action="category.php?c=dining">
                        <button type="submit" name="c" value="dining" class="feature_btn" style="background: none;">EXPLORE NOW <i class="fas fa-play"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>Latest from Sofa</h3>
                    <img src="img/sofa.jpeg" alt="Sofa" style="max-width: 100%; height: auto;">
                    <form id="form4" method="get" action="category.php?c=sofa">
                        <button type="submit" name="c" value="sofa" class="feature_btn" style="background: none;">EXPLORE NOW <i class="fas fa-play"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <?php for ($j = 0; $j < 2; $j++) { ?>
                            <div class="single_product_list_slider">
                                <div class="row align-items-center justify-content-between">
                                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">
                                                <form method="post" action="single-product.php">
                                                    <button type="submit" name="id" value="<?php echo $i ?>">
                                                        <img src="img/product/product_<?php echo $i ?>.png" alt="">
                                                    </button>
                                                </form>
                                                <div class="single_product_text">
                                                    <h4>Cafe Chairs</h4>
                                                    <h3>₹7120</h3>
                                                    <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_offer section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="offer_img">
                        <img src="img/offer_img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="offer_text">
                        <h2>Weekly Sale on
                            60% Off All Products</h2>
                        <div class="date_countdown">
                            <div id="timer">
                                <div id="days" class="date"></div>
                                <div id="hours" class="date"></div>
                                <div id="minutes" class="date"></div>
                                <div id="seconds" class="date"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Basic Green Chair </h4>
                                <h3>₹ 6200</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Basic Orange Chair</h4>
                                <h3>₹ 6200</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Designer Chair</h4>
                                <h3>₹ 6750</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Cushioned Chair</h4>
                                <h3>₹ 7500</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Aesthetic Photoshoot Chair</h4>
                                <h3>₹ 6900</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Join Our Newsletter</h5>
                        <h2>Subscribe to get Updated
                            with new offers</h2>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_5.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("footer.php") ?>
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>