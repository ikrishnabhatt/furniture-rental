<!doctype html>
<html lang="zxx">
<?php session_start(); ?>

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

  <link rel="stylesheet" href="css/quantity.css" />
  <script>
    function updateCart(id, qty, months) {
      var priceId = 'price' + id;
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          update = JSON.parse(this.responseText);
          document.getElementById(priceId).innerHTML = '&#8377;' + update.total_price;
          document.getElementById('grand_total').innerHTML = '&#8377;' + update.grand_total;
          console.log(update);
        }
      };
      xmlhttp.open("GET", "carthandler.php?id=" + id + "&oper=update&qty=" + qty + "&months=" + months, true);
      xmlhttp.send();
    }

    function deleteProduct(id) {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var mod = document.getElementsByTagName('tbody');
          mod[0].innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "carthandler.php?id=" + id + "&oper=delete", true);
      xmlhttp.send();
    }
  </script>
</head>

<body>
  <?php include("header.php");
  $grand_total = 0;
  ?>
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <section class="cart_area padding_top">
    <div class="container">
      <?php if (isset($_SESSION['login_status'])) { ?>
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <?php if (isset($_SESSION['cart']) && !(empty($_SESSION['cart']))) { ?>
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">No. of Months</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($_SESSION['cart'] as $value) {
                  ?>
                    <tr>
                      <td>
                        <div class="media">
                          <div class="d-flex">
                            <img width="100px" height="160px" src="img/product/categories/<?php echo $value['cat_name'] ?>/<?php echo $value['product_name'] ?>/<?php echo $value['product_name'] ?> (1).jpeg" alt="" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <p><?php echo $value['product_name'] ?></p>
                      </td>
                      <td>
                        <h5>&#8377;<?php echo $value['renting_price'] ?></h5>
                      </td>
                      <td>
                        <div class="quantity buttons_added">
                          <input type="button" value="-" class="minus">
                          <input onchange="updateCart(<?php echo $value['product_id'] ?>,
                      document.getElementById('<?php echo 'quantity ' . $value['product_id']; ?>').value, 
                      document.getElementById('<?php echo 'months ' . $value['product_id']; ?>').value);" id="<?php echo 'quantity ' . $value['product_id'] ?>" type="number" step="1" min="1" max="" name="quantity" value="<?php echo $value['quantity']; ?>" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                          <input type="button" value="+" class="plus">
                        </div>
                      </td>
                      <td>
                        <div class="quantity buttons_added">
                          <input type="button" value="-" class="minus">
                          <input onchange="updateCart(<?php echo $value['product_id'] ?>,
                      document.getElementById('<?php echo 'quantity ' . $value['product_id'] ?>').value, 
                      document.getElementById('<?php echo 'months ' . $value['product_id']; ?>').value);" id="<?php echo 'months ' . $value['product_id'] ?>" type="number" step="1" min="1" max="" name="noofmonths" value="<?php echo $value['no_of_months']; ?>" title="Months" class="input-text qty text" size="4" pattern="" inputmode="">
                          <input type="button" value="+" class="plus">
                        </div>
                      </td>
                      <td>
                        <h5 id="price<?php echo $value['product_id'] ?>">&#8377;<?php echo $value['total_price'] ?></h5>
                      </td>
                      <td>
                        <button onclick="deleteProduct(<?php echo $value['product_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                      <h5 id="grand_total">&#8377;<?php echo $_SESSION['grand_total']; ?></h5>
                    </td>
                  </tr>
                </tbody>
              <?php } else {
                echo "<h4 align = \"center\">Sorry, no items in the cart!!</h4>";
              }
              ?>
            </table>
            <div class="checkout_btn_inner float-right">
              <a class="btn_1" href="#" onclick="history.back(-1);">Continue Shopping</a>
              <?php if (isset($_SESSION['cart']) && !(empty($_SESSION['cart']))) { ?>
                <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div align="center" class="checkout_btn_inner">
          <h3>You are not logged in. Please log in </h3><br><br>
          <a class="btn_2" href="login.php">Log In</a>
        </div>
      <?php  } ?>
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
  <script src="js/stellar.js"></script>
  <script src="js/price_rangs.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/script.js"></script>
</body>

</html>