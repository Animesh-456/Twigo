<?php
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  $semail = $_SESSION["email"];
  //$spassword = $_SESSION["pass"];
  $V_id = $_SESSION["V_id"];


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM booking WHERE V_id='$V_id'";
  $sq = "SELECT * FROM vehicle WHERE V_id='$V_id'";
  $result = $conn->query($sql);
  $res = $conn->query($sq);
  $row = $result->fetch_assoc();
  $r = $res->fetch_assoc();
  if ($row) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TwiGo Checkout</title>
      <link rel="stylesheet" href="../CSS/checkout.css" />
      <link rel='icon' type='image/x-icon' href='../img/fav.png'>
    </head>
    <style>

    </style>

    <body>
      <header>
        <div class="container">
          <div class="navigation">

            <div class="logo">
              <i class="icon icon-basket"></i>Twi <span style="color: red;">Go</span>
            </div>
            <div class="secure">
              <i class="icon icon-shield"></i>
              <span>Secure Checkout - 29/04/2022</span>

            </div>
          </div>
          <div class="notification">
            <?php echo $row["B_type"] ?>
          </div>

        </div>
      </header>
      <section class="content">

        <div class="container">

        </div>
        <div class="details shadow">
          <div class="details__item">

            <div class="item__image">
              <img class="iphone" src="../img/<?php echo $r["V_name"] ?>.jfif" alt="">
            </div>
            <div class="item__details">
              <div class="item__title">
                <?php $vname = preg_replace('/(?<!\ )[A-Z]/', ' $0', $r["V_name"]); ?>
                <?php echo $vname ?>
              </div>
              <div class="item__price">
                Estimated fare RS <?php echo $row["B_amount"] ?>
              </div>
              <div class="item__quantity">
                <?php echo $r["V_emmision_type"] ?>
              </div>
              <div class="item__description">
                <ul>
                  <li>Distance - <?php echo $row["B_distance"] ?>km</li>
                  <li>Base Fare - 100</li>
                  <li>Driver allowance - 50</li>
                  <li>Taxes - 10 </li>
                  <li>No of seats - <?php echo $r["V_no_seats"]?></li>
                </ul>

              </div>

            </div>
          </div>

        </div>
        <div class="discount"></div>

        <div class="container">
          <div class="payment">
            <div class="payment__title">
              Ride Inclusions
            </div>
            <div class="item__description">
              <ul>
                <li>Regular audited cars</li>
                <li>24x7 on-road assistance</li>
                <li>Real time tracking</li>
              </ul>

            </div>

            <div class="payment__info">
              <div class="payment__cc">
                <div class="payment__title">
                  <i class="icon icon-user"></i>Rules & Restrictions
                </div>
                <form>
                  <div class="form__cc">
                    <div class="row">
                      <div class="field">
                        <div class="item__description">
                          <ul>
                            <li>Excludes toll costs , parking , permits and state tax</li>
                            <li>Rs 18/km will be charged for extra km</li>
                            <li>Night tiime allowance (11:00 PM - 06:00 AM) - Rs200/night</li>
                            <li>Extra fare may apply if you don't end trip at given location </li>
                          </ul>
                          <br>
                          <bold style="color: red;"><h3>TRANSFER THE AMOUNT OF ₹<?php echo $row["B_amount"]?> TO THIS A/C</h3>
                        <bold><h3>A/C NUMBER:- 643070226364</h3>
                        <h3>IFSC CODE:- SBIN0016342</h3>
                        <h3>BRANCH NAME:- RBO 5 BURDWAN</h3></bold></bold>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
              <form action="checkoutsubmit.php" method="POST" enctype="multipart/form-data">
                <div class="payment__shipping">
                  <div class="payment__title">
                    <i class="icon icon-plane"></i>Upload Bank Transfer Screenshot here
                  </div>

                  <div class="details__user">

                    <input type="file" id="myFile" name="filename" onchange="getVal()">
                    <script>
                      function getVal() {
                        const val = document.querySelector('input').value;
                        if (val != null) {
                          document.getElementById("btnimg").style.display = "block";
                        }
                      }
                    </script>
                    <input style="margin-left: 350px; display:none;" type="submit" value="Confirm Booking" class="btn action__submit" name="submit" id="btnimg"></input>

                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>
        <div class="container">
          <div class="actions">

            <a href="#">



            </a>

            <a href="dash.php" class="backBtn" style="text-decoration: none; color:red;">Go Back to Previous Page</a>

          </div>
        </div>
      </section>

    </body>


    </html>
<?php }
} ?>