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
  <link rel="stylesheet" href="css/lightslider.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/range-slider.css">
  <script>
    function addToCart(id, qty, months) {
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
      xmlhttp.open("GET", "carthandler.php?id=" + id + "&oper=add&qty=" + qty + "&months=" + months, true);
      xmlhttp.send();
    }
  </script>
</head>

<body>
  <?php
  include("config.php");
  $id = $_POST['id'];

  $prod_query = "SELECT product_id,name,buying_price,cat_name,renting_price_per_day FROM products p,categories c WHERE product_id='" . $id . "' AND p.category_id = c.category_id";
  $prod_res = mysqli_query($dbh, $prod_query);
  if (!$prod_res) {
    echo "Image fetch Failed";
  }

  $prod_fetch = mysqli_fetch_assoc($prod_res);
  ?>
  <?php include("header.php"); ?>

  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Shop Single</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (1).jpeg">
                <img src="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (1).jpeg" />
              </div>
              <div data-thumb="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (2).jpeg">
                <img src="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (2).jpeg" />
              </div>
              <div data-thumb="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (3).jpeg">
                <img src="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (3).jpeg" />
              </div>
              <div data-thumb="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (4).jpeg">
                <img src="img/product/categories/<?php echo $prod_fetch['cat_name']; ?>/<?php echo $prod_fetch['name'] ?>/<?php echo $prod_fetch['name'] ?> (4).jpeg" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <h3><?php echo $prod_fetch['name']; ?></h3>
            <h2>Rental Price: &#8377;<?php echo $prod_fetch['renting_price_per_day'] ?></h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : Furniture</a>
              </li>
              <li>
                <a href="#"> <span>Availability</span> : In Stock</a>
              </li>
              <li>
                No. of Months: <span id="noofmonths"></span>
                <div class="slidecontainer">
                  <br><input type="range" min="1" max="12" value="1" class="slider" id="myRange"><br>
                </div>
              </li>
            </ul>
            <p>
              First replenish living. Creepeth image image. Creeping can't, won't called.
              Two fruitful let days signs sea together all land fly subdue
            </p>
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count">
                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                <input id="quantity" class="input-number" type="text" value="1" min="0" max="10">
                <span class="number-increment"> <i class="ti-plus"></i></span>
              </div>
              <a href="#" onclick="addToCart(<?php echo $id ?>,document.getElementById('quantity').value,document.getElementById('noofmonths').innerHTML);" class="btn_3" data-toggle="modal" data-target="#exampleModal">add to cart</a>
              <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart Status</h5>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
            <?php echo $prod_fetch["description"]; ?>
          </p>
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
                <h4>Stylish Green Chair</h4>
                <h3>9000</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="img/product/product_2.png" alt="">
              <div class="single_product_text">
                <h4>Stylish Orange Chair</h4>
                <h3>9000</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="img/product/product_3.png" alt="">
              <div class="single_product_text">
                <h4>Aesthetic Chair</h4>
                <h3>15000</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="img/product/product_4.png" alt="">
              <div class="single_product_text">
                <h4>Retro Chair</h4>
                <h3>17000</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="img/product/product_5.png" alt="">
              <div class="single_product_text">
                <h4>Bar Chair</h4>
                <h3>5000</h3>
              </div>
            </div>
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
  <script src="js/lightslider.min.js"></script>
  <script src="js/masonry.pkgd.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/swiper.jquery.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/theme.js"></script>
  <script src="js/custom.js"></script>
  <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("noofmonths");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
  </script>
</body>

</html>