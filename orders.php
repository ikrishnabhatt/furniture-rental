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
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <?php session_start();
  include("header.php");
  include("config.php");

  $booking_id = [];

  $booking_id_stmt = "SELECT booking_id FROM bookings WHERE user_id = '" . $_SESSION['user_id'] . "' ORDER BY booking_id DESC";
  $booking_id_query = mysqli_query($dbh, $booking_id_stmt);
  $booking_id = mysqli_fetch_all($booking_id_query, MYSQLI_ASSOC);

  ?>

  <!--================Home Banner Area =================-->
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

  <!--================Cart Area =================-->
  <?php if (mysqli_num_rows($booking_id_query)) { ?>
    <section class="cart_area">
      <?php
      for ($i = 0; $i < mysqli_num_rows($booking_id_query); $i++) {

        $order_details_stmt = "SELECT * FROM bookings WHERE booking_id = '" . $booking_id[$i]['booking_id'] . "'";
        $order_details_query = mysqli_query($dbh, $order_details_stmt);
        $order_details = mysqli_fetch_assoc($order_details_query);
      ?>
        <div class="container">
          <a href="orderdetails.php?orderid=<?php echo $booking_id[$i]['booking_id']; ?>" onclick="document.getElementById('order <?php echo $booking_id[$i]['booking_id']; ?>').submit();">
            <div style="margin-top: 30px;" class="card">
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Order ID<br><?php echo $order_details['booking_id']; ?> </th>
                      <th scope="col">Total<br> &#8377;<?php echo $order_details['grand_total']; ?></th>
                    </tr>
                  </thead>
                </table>
                <table class="table table-borderless">
                  <tbody>
                    <?php

                    $products_stmt = "SELECT booking_id,category_id,p.name as product_name,bpm.product_id,qty,from_date,to_date,total,p.name FROM booking_product_map bpm, products p WHERE booking_id = '" . $order_details['booking_id'] . "' AND bpm.product_id = p.product_id";
                    $products_query = mysqli_query($dbh, $products_stmt);
                    $products = mysqli_fetch_all($products_query, MYSQLI_ASSOC);

                    for ($j = 0; $j < mysqli_num_rows($products_query); $j++) {

                      $cat_name_stmt = "SELECT cat_name FROM categories WHERE category_id = '" . $products[$j]['category_id'] . "'";
                      $cat_name_query = mysqli_query($dbh, $cat_name_stmt);
                      $cat_name = mysqli_fetch_assoc($cat_name_query);

                    ?>
                      <tr>
                        <td style="padding: 20px;">
                          <div class="media">
                            <div class="d-flex">
                              <img style="margin: 20px;" width="90px" height="120px" src="img/product/categories/<?php echo $cat_name['cat_name']; ?>/<?php echo $products[$j]['product_name']; ?>/<?php echo $products[$j]['product_name']; ?> (1).jpeg" alt="" />
                            </div>
                            <div class="media-body">
                              <p><strong>Name: </strong><?php echo $products[$j]['name']; ?></p>
                              <p><strong> Quantity: </strong> <?php echo $products[$j]['qty']; ?></p>
                              <p><strong> Price: </strong>&#8377;<?php echo $products[$j]['total']; ?></p>
                            </div>
                          </div>
                        </td>
                        <td style="padding: 20px;">
                          <p> <strong> From: </strong><?php echo date_format(date_create($products[$j]['from_date']), "d-m-Y"); ?></p>
                        </td>
                        <td style="padding: 20px;">
                          <p> <strong> To: </strong><?php echo date_format(date_create($products[$j]['from_date']), "d-m-Y"); ?></p>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </a>

        </div>
      <?php } ?>
    </section>
  <?php } else { ?>
    <div align="center" class="checkout_btn_inner">
      <h3 class="padding_top">Sorry, no orders found!!</h3><br>
      <a class="btn_2" href="#" onclick="history.back(-1);" target="index.php">Continue Shopping</a>
    </div>
  <?php } ?>

  <!--================End Cart Area =================-->
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