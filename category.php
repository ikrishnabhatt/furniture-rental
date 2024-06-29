<!doctype html>
<html lang="zxx">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/price_rangs.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .widgets_inner .price-input {
            width: 50px;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
            padding: 3px 0px 3px 3px;
            margin: 5px 1px 3px 0px;
            border: 1px solid #DDDDDD;
        }

        .widgets_inner .price-input:focus {
            width: 50px;
            box-shadow: 0 0 5px rgba(81, 203, 238, 1);
            padding: 3px 0px 3px 3px;
            margin: 5px 1px 3px 0px;
            border: 1px solid rgba(81, 203, 238, 1);
        }
    </style>
    <script>
        var cat = 1;
        var from = null;
        var to = null;
        var len;
        const urlParams = new URLSearchParams(window.location.search);
        const myParam = urlParams.get('c');
        if (myParam !== null) {
            cat = myParam;
        }

        function showUser(category) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var one = document.getElementsByClassName("dynamic");
                    one[0].innerHTML = this.responseText;
                    len = $.grep($.parseHTML(this.responseText), function(el, i) {
                        return $(el).hasClass("id")
                    }).length;
                    document.getElementById('count').innerHTML = len;
                }
            };
            xmlhttp.open("GET", "dynamichandler.php?q=" + category, true);
            xmlhttp.send();
        }

        function sortByPrice(from, to) {
            if(from == "")
            {
                from = 1;
            }
            if(to == "")
            {
                to = 999999;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var one = document.getElementsByClassName("dynamic");
                    one[0].innerHTML = this.responseText;
                    len = $.grep($.parseHTML(this.responseText), function(el, i) {
                        return $(el).hasClass("id")
                    }).length;
                    document.getElementById('count').innerHTML = len;
                }
            };
            xmlhttp.open("GET", "sortbyprice.php?from=" + from + "&to=" + to, true);
            xmlhttp.send();
        }

        function addToCart(id) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var mod = document.getElementsByClassName("modal-body");
                    mod[0].innerHTML = this.responseText;   
                }
            };
            xmlhttp.open("GET", "carthandler.php?id=" + id + "&oper=add&qty=1", true);
            xmlhttp.send();
        }
        showUser(cat);
    </script>
</head>

<body>
    <?php include("header.php"); ?>
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3 id="noone">Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a style="cursor: pointer;" onclick="showUser(this.name);" name="1">All</a>
                                    </li>
                                    <li>
                                        <a style="cursor: pointer;" onclick="showUser(this.name);" name="table">Tables</a>
                                    </li>
                                    <li>
                                        <a style="cursor: pointer;" onclick="showUser(this.name);" name="sofa">Sofas</a>
                                    </li>
                                    <li>
                                        <a style="cursor: pointer;" onclick="showUser(this.name);" name="chair">Chairs</a>
                                    </li>
                                    <li>
                                        <a style="cursor: pointer;" onclick="showUser(this.name);" name="dining">Dining Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span id="count"></span> Product Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row dynamic align-items-center latest_product_inner">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_list best_seller">
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
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
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
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>