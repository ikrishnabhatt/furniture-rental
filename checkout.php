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
  <link rel="stylesheet" href="css/style.css">
  <!-- <script>
    function register() {
      $(document).ready(function() {
            // process the form
            $('#registration_form').submit(function(event) {
                  // get the form data
                  // there are many ways to get this data using jQuery (you can use the class or id also)
                  var formData = {
                    'user_name': $('input[name=first_name]').val() + ' ' + $('input[name=last_name]').val(),
                    'email': $('input[name=email]').val(),
                    'phone': $('input[name=phone]').val(),
                    'password': $('input[name=password]').val(),
                    'city': $('input[name=city]').val(),
                    'address': $('input[name=address]').val(),
                    'pin_code': $('input[name=pincode]').val()
                  };
                  // process the form
                  $.ajax({
                      type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                      url: 'register.php', // the url where we want to POST
                      data: formData, // our data object
                      dataType: 'json', // what type of data do we expect back from the server
                      encode: true
                    })
                    // using the done promise callback
                    .done(function(data) {

                      // log data to the console so we can see
                      var mod = document.getElementsByClassName('modal-body');
                      mod[0].innerHTML = data;  
                      // here we will handle errors and validation messages
                    });

                    event.preventDefault();
            });
      });
    }
  </script> -->
</head>

<body>
  <?php session_start();
  include("header.php");
  include("config.php");

  $_SESSION['booking_id'] = 0;

  if (isset($_POST['login'])) {
    $email = $_POST['name'];
    $password = $_POST['password'];

    $search = "SELECT * FROM users WHERE email_id = '" . $email . "' AND password = '" . $password . "'";
    $dosearch = mysqli_query($dbh, $search);
    $userinfo = mysqli_fetch_assoc($dosearch);
    $num_rows  = mysqli_num_rows($dosearch);

    if ($num_rows) {
      $_SESSION['login_status'] = 1;
      $_SESSION['user_id'] = $userinfo['user_id'];
      $_SESSION['first_name'] = $userinfo['first_name'];
      $_SESSION['last_name'] = $userinfo['last_name'];
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $userinfo['phone'];
      $_SESSION['city'] = $userinfo['city'];
      $_SESSION['address'] = $userinfo['address'];
      $_SESSION['pin_code'] = $userinfo['pin_code'];
    } else {
      echo "<script>alert('Please try again');</script>";
    }
  }

  if (isset($_POST['register']) && ($_POST['password'] == $_POST['conf_pass'])) {
    $em = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];

    $query = "select email_id from users";
    $email = mysqli_query($dbh, $query);
    if (!$email) {
      echo "Try again!!";
    } else {
      $emfetch = mysqli_fetch_all($email, MYSQLI_ASSOC);
    }
    if (in_array($em, $emfetch)) {
      echo "User already exists";
    } else {
      $finquery = "INSERT INTO users VALUES ('',1, '$em', '$password', '$fname', '$lname', '$phone', '$city', '$address', '$pincode')";
      $reg = mysqli_query($dbh, $finquery);
      if (!$reg) {
        echo mysqli_error($dbh);
      } else {
        $uid_query_stmt = "SELECT user_id from users where email_id = '" . $em . "'";
        $uid_query = mysqli_query($dbh, $uid_query_stmt);
        $user_id = mysqli_fetch_assoc($uid_query);

        $_SESSION['login_status'] = 1;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['first_name'] = $fname;
        $_SESSION['last_name'] = $lname;
        $_SESSION['email'] = $em;
        $_SESSION['phone'] = $phone;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        $_SESSION['pin_code'] = $pincode;
        echo "<script>alert('Registered Successfully!!');</script>";
      }
    }
  }

  if (isset($_POST['checkout'])) {
    /* date_default_timezone_set("Asia/Kolkata");
    $from_date = date("Y-m-d h:i:s");
    $date = date_create($from_date);

    $booking_query_stmt = "INSERT INTO bookings VALUES ('',1,'" . $_SESSION['user_id'] . "',now(),now(),'" . $_SESSION['grand_total'] . "','0','0','" . $_SESSION['grand_total'] . "','success')";
    $booking_query = mysqli_query($dbh, $booking_query_stmt);

    if ($booking_query) {
      $booking_id_stmt = "SELECT booking_id FROM bookings WHERE user_id = '" . $_SESSION['user_id'] . "' ORDER BY booking_id DESC LIMIT 1";
      $booking_id_query = mysqli_query($dbh, $booking_id_stmt);
      $booking_id = mysqli_fetch_assoc($booking_id_query);
      $_SESSION['booking_id'] = $booking_id['booking_id'];
      
      foreach ($_SESSION['cart'] as $product) {
        date_add($date, date_interval_create_from_date_string($product['no_of_months'] . " months"));
        $to_date = date_format($date, "Y-m-d h:i:s");

        $bpm_query_stmt = "INSERT INTO booking_product_map VALUES ('','" . $booking_id['booking_id'] . "','" . $product['product_id'] . "','" . $product['quantity'] . "', '" . $from_date . "', '" . $to_date . "', '" . $product['total_price'] . "', '', '" . $product['total_price'] . "')";
        $bpm_query = mysqli_query($dbh, $bpm_query_stmt);

        if ($bpm_query) {
          continue;
        } else {
          echo "<script>alert('Something Went Wrong in bpm_query');</script>";
        }
      }
    } else {
      echo "<script>alert('Something Went Wrong in booking_query');</script>";
    } */
    $_SESSION['checkout'] = true;
    
  }
  ?>
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Product Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <?php if (!isset($_SESSION['login_status'])) {
      ?>
        <div class="returning_customer">
          <div class="check_title">
            <h2>
              Returning Customer?
              <a href="#">Click here to login</a>
            </h2>
          </div>
          <p>
            If you have shopped with us before, please enter your details in the
            boxes below. If you are a new customer, please proceed to the
            Billing & Shipping section.
          </p>
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-6 form-group p_star">
              <input type="email" class="form-control" id="name" name="name" value=" " />
              <span class="placeholder" data-placeholder="Email"></span>
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="password" class="form-control" id="password" name="password" value="" />
              <span class="placeholder" data-placeholder="Password"></span>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="login" value="log in" class="btn_3">
                log in
              </button>
              <div class="creat_account">
                <input type="checkbox" id="f-option" name="selector" />
                <label for="f-option">Remember me</label>
              </div>
              <div class="row">
                <a class="lost_pass col-sm-3" href="#">Lost your password?</a>
                <a class="lost_pass col-sm-3" href="#" data-toggle="modal" data-target="#exampleModalCenter">New User?</a>
              </div>
            </div>
          </form>
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="registration_form" method="post" action="#">
                  <div class="modal-body">

                    <div class="mt-10">
                      <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                    </div>
                    <div class="mt-10 ">
                      <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                    </div>

                    <div class="mt-10 ">
                      <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
                    </div>
                    <div class="mt-10 ">
                      <input type="text" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                    </div>

                    <div class="mt-10">
                      <input type="textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                    </div>


                    <div class="mt-10 ">
                      <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                    </div>
                    <div class="mt-10 ">
                      <input type="password" name="conf_pass" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required class="single-input">
                    </div>


                    <div class="mt-10 ">
                      <input type="text" name="pincode" placeholder="Pincode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" required class="single-input">
                    </div>

                    <div class="input-group-icon mt-10">
                      <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                      <div class="form-select" id="default-select">
                        <select name="city">
                          <option value="City" selected>City</option>
                          <option value="Belagavi">Belagavi</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Mumbai">Mumbai</option>
                          <option value="Bengaluru">Bengaluru</option>
                        </select>
                      </div>
                    </div>

                    <div class="input-group-icon mt-10">
                      <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="form-select" id="default-select_1">
                        <select>
                          <option value="1" selected>Country</option>
                          <option value="1">Bangladesh</option>
                          <option value="1">India</option>
                          <option value="1">England</option>
                          <option value="1">Srilanka</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_3" data-dismiss="modal">Close</button>
                    <input type="submit" style="color: white" class="btn btn_3" name="register" value="Register" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="billing_details">
        <div class="row">
          <?php if (isset($_SESSION['login_status'])) { ?>
            <div class="col-lg-8">
              <h3>Billing Details</h3>
              <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                  <input type="text" class="form-control" id="first" name="first_name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" value="<?php echo $_SESSION['first_name']; ?>" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <input type="text" class="form-control" id="last" name="last_name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" value="<?php echo $_SESSION['last_name']; ?>" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <input type="text" class="form-control" id="email" name="email_id" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="<?php echo $_SESSION['email']; ?>" />
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="textarea" class="form-control" id="address" name="address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" value="<?php echo $_SESSION['address']; ?>" />                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" id="city" name="city" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" value="<?php echo $_SESSION['city']; ?>" />                </div>
                <div class="col-md-12 form-group">
                  <input type="text" class="form-control" id="zip" name="pin_code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pincode'" value="<?php echo $_SESSION['pin_code']; ?>" />
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <input type="checkbox" id="f-option2" name="selector" />
                    <label for="f-option2">Create an account?</label>
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account">
                    <h3>Shipping Details</h3>
                    <input type="checkbox" id="f-option3" name="selector" />
                    <label for="f-option3">Ship to a different address?</label>
                  </div>
                  <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                </div>
              </form>
            </div>
            <div class="col-lg-4">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="#">Product
                      <span>Total</span>
                    </a>
                  </li>
                  <?php foreach ($_SESSION['cart'] as $value) { ?>
                    <li>
                      <a href="#"><?php echo $value['product_name']; ?>
                        <span class="middle">x <?php echo $value['quantity']; ?></span>
                        <span class="last">&#8377;<?php echo $value['total_price']; ?></span>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
                <ul class="list list_2">
              
                  <li>
                    <a href="#">Total
                      <span>&#8377;<?php echo $_SESSION['grand_total']; ?></span>
                    </a>
                  </li>
                </ul>
                <div class="payment_item">
                  <div class="radion_btn">
                    <input type="radio" id="f-option5" name="selector" />
                    <label for="f-option5">Check payments</label>
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check to Store Name, Store Street, Store Town,
                    Store State / County, Store Postcode.
                  </p>
                </div>
                <div class="payment_item active">
                  <div class="radion_btn">
                    <input type="radio" id="f-option6" name="selector" />
                    <label for="f-option6">Paypal </label>
                    <img src="img/product/single-product/card.jpg" alt="" />
                    <div class="check"></div>
                  </div>
                  <p>
                    Please send a check to Store Name, Store Street, Store Town,
                    Store State / County, Store Postcode.
                  </p>
                </div>
                <div class="creat_account">
                  <input type="checkbox" id="f-option4" name="selector" />
                  <label for="f-option4">I’ve read and accept the </label>
                  <a href="#">terms & conditions*</a>
                </div>
                <form method="post" action="confirmation.php">
                  <input type="submit" name="checkout" class="btn_3" href="#" value="Order Now!!" />
               </form>
              </div>
            </div>
          <?php } ?>
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