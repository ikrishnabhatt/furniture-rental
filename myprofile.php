<!doctype html>
<html lang="zxx">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WittyWarriors</title>
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
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 90%;
            border-radius: 5px;
            padding: 50px 70px;   
        }
        
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .name_card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 90%;
            border-radius: 5px;
            padding: 30px 30px;
            max-height: 150px;
            margin: 0px 30px;
            text-align: center;
        }

        .name_card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .profile {
            /* background-color: rgba(0, 0, 0, 0.025); */
            padding-top: 100px;
            padding-bottom: 100px;
            
        }
    </style>
</head>

<body>
    <?php session_start();
    include("header.php");
    include("config.php");

    /* $booking_id = [];

  $booking_id_stmt = "SELECT booking_id FROM bookings WHERE user_id = '" . $_SESSION['user_id'] . "' ORDER BY booking_id DESC";
  $booking_id_query = mysqli_query($dbh, $booking_id_stmt);
  $booking_id = mysqli_fetch_all($booking_id_query, MYSQLI_ASSOC); */

    ?>
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>My Orders</h2>
                            <p>Home <span>-</span>My Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Profile Area =================-->
    <div class="profile">
        <div class="row">
            <div class="name_card col-lg-2">
                <h4>Hello!</h4><br>
                <p><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></p>
            </div>
            <div class="col-lg-8">
                <div class="card container padding_top">
                    <div class="billing_details">
                        <h3>My Profile</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                First Name: <input type="text" class="form-control" id="first" name="first_name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" value="<?php echo $_SESSION['first_name']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="First name"></span> -->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                Last Name: <input type="text" class="form-control" id="last" name="last_name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" value="<?php echo $_SESSION['last_name']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="Last name"></span> -->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                Phone No: <input type="text" class="form-control" id="number" name="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" value="<?php echo $_SESSION['phone']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="Phone number"></span> -->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                Email Id: <input type="text" class="form-control" id="email" name="email_id" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="<?php echo $_SESSION['email']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="Email Address"></span> -->
                            </div>
                            <div class="col-md-12 form-group p_star">
                                Address: <input type="textarea" class="form-control" id="address" name="address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" value="<?php echo $_SESSION['address']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="Address"></span> -->
                            </div>
                            
                            <div class="col-md-12 form-group p_star">
                                City: <input type="text" class="form-control" id="city" name="city" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" value="<?php echo $_SESSION['city']; ?>" />
                                <!-- <span class="placeholder" data-placeholder="Town/City"></span> -->
                            </div>
                            
                            <div class="col-md-12 form-group">
                                Pincode: <input type="text" class="form-control" id="zip" name="pin_code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" value="<?php echo $_SESSION['pin_code']; ?>" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    
    <!-- jquery plugins here-->
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