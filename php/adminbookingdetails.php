<?php
session_start();
if ($_SESSION["aemail"]) {
    include '../php/db.php';

    $aemail = $_SESSION["aemail"];
    //$spassword = $_SESSION["pass"];
    if ($_POST["val"]) {
        // $V_id = $_POST["V_id"];
        $bid = $_POST["B_id"];
    }



    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM booking WHERE B_id='$bid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();




    if ($row) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

            <title>Admin booking Details</title>
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
                            <?php $bdate = $row["B_date"] ?>
                            <!-- <span>Secure Checkout For - <?php echo $bdate ?></span> -->

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
                <?php
                $sq = "SELECT * FROM vehicle WHERE V_id='$row[V_id]'";

                $res = $conn->query($sq);

                $r = $res->fetch_assoc();
                ?>
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
                                <?php echo "Booking ID:- ", $row["B_id"] ?>
                            </div>
                            <div class="item__description">
                                <ul>
                                    <li>Distance - <?php echo $row["B_distance"] ?>km</li>
                                    <li>Vehicle ID - <?php echo $r["V_id"] ?></li>
                                    <li>Customer Name - <?php
                                                        $C_email = $row["C_email"];
                                                        $csq = "SELECT * FROM customer WHERE C_email='$row[C_email]'";

                                                        $cres = $conn->query($csq);

                                                        $cr = $cres->fetch_assoc();
                                                        $contact = $cr["C_contact"];
                                                        echo $cr["C_name"];
                                                       ?></li>
                                    <li>Customer Contact Number - <?php echo $contact?> </li>
                                    <li>Booking Date - <?php echo $row["B_date"] ?></li>
                                    <li>Driver - <?php 
                                    $demail=$row["D_email"];
                                    $dsql = "SELECT D_name FROM driver WHERE D_email = '$demail'";
                                    $dres = $conn->query($dsql);
                                    $drow = $dres->fetch_assoc();
                                    
                                    if($drow!=NULL){
                                        echo $drow["D_name"];
                                    }else{
                                        echo "NO Driver";
                                    }
                                    
                                    ?></li>
                                    <li><?php if($row["B_pickup_address"]!=NULL){
                                        echo "Pickup address -" .$row["B_pickup_address"];
                                    }else{
                                    echo "No Pickup Address Available";
                                    }?></li>
                                    <li><?php if($row["B_drop_address"]!=NULL){
                                        echo "Drop address -" .$row["B_drop_address"];
                                    }else{
                                    echo "No Drop Address Available";
                                    }?></li>
                                    

                                    <li><?php if($row["B_round_trip"]==0){
                                        echo "Round Trip -
                                         <i class='bx bxs-x-square' style='color: #ee0000; font-size: 150%;'></i>";
                                    }else{
                                    echo "Round Trip - <i class='bx bxs-check-square' style='color: #ee0000;'></i>";
                                    }?></li>
                                    <li>Payment Screenshot - <?php if($row["B_img_pay"]==NULL){
                                        echo "No payment Done";
                                    }else{
                                        $imageurl = $row["B_img_pay"];
                                        echo " <a style='text-decoration: none;'  href='../uploads/$row[B_img_pay]' target='none'><span style='color: red;'>View</span></a></li>";
                                    }
                                    ?>
                                        
                                   
                                </ul>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="discount"></div>

                <div class="container">
                    <div class="payment">
                        <!-- <div class="payment__title">
                                Ride Inclusions
                            </div> -->
                        <!-- <div class="item__description">
                            <ul>
                                <li>Regular audited cars</li>
                                <li>24x7 on-road assistance</li>
                                <li>Real time tracking</li>
                            </ul>

                        </div> -->

                        <div class="payment__info">
                            <div class="payment__cc">
                                <!-- <div class="payment__title">
                                    <i class="icon icon-user"></i>Rules & Restrictions
                                </div> -->
                                <form>
                                    <div class="form__cc">
                                        <div class="row">
                                            <div class="field">
                                                <!-- <div class="item__description">
                                                    <ul>
                                                        <li>Excludes toll costs , parking , permits and state tax</li>
                                                        <li>Rs 18/km will be charged for extra km</li>
                                                        <li>Night tiime allowance (11:00 PM - 06:00 AM) - Rs200/night</li>
                                                        <li>Extra fare may apply if you don't end trip at given location </li>
                                                    </ul>
                                                    <br>
                                                    <bold style="color: red;">
                                                        <h3>TRANSFER THE AMOUNT OF ₹<?php echo $row["B_amount"] ?> TO THIS A/C</h3>
                                                        <bold>
                                                            <h3>A/C NUMBER:- 643070226364</h3>
                                                            <h3>IFSC CODE:- SBIN0016342</h3>
                                                            <h3>BRANCH NAME:- RBO 5 BURDWAN</h3>
                                                        </bold>
                                                    </bold>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- <?php
                                                $drivq = "SELECT * FROM driver WHERE D_status=0";
                                                $drivresult = $conn->query($drivq);
                                                $drow = $drivresult->fetch_assoc();
                                                ?>

                                        <?php if ($drow) {
                                            $driveremail = $drow["D_email"];
                                            echo "Your Driver's name :- ", $drow["D_name"];
                                        } else {
                                            echo "<h1 style='color: red;'>No Driver available please cancel your booking</h1>";
                                        }
                                        ?>
                                        </select> -->

                                </form>
                            </div>
                            <form action="admincancelboooking.php" method="POST" >
                                <div class="payment__shipping">
                                    <!-- <div class="payment__title">
                                        <i class="icon icon-plane"></i>Upload Bank Transfer Screenshot here
                                    </div> -->

                                    <div class="details__user">
                                        <?php $demail=$row["D_email"] ?>

                                        <?php if($row["B_ridestatus"] == 0){
                                            echo "<input type='text' style='display: none;' name='de' value='$demail' readonly>
                                            <input type='text' style='display: none;' name='bid' value='$bid' readonly>
                                           
                                            <input style='margin-left: 350px;' type='submit' value='Cancel Booking' class='btn action__submit' name='cancel' id='btnimg'></input>
                                           
                                            <br>
                                            <br>
                                            <input style='margin-left: 340px;' type='submit' value='Returned Vehicle' class='btn action__submit' name='complete'id='btnimg'></input>";
                                        }?>
                                        
                                           
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

                        <!-- <a href="cancelbooking.php" class="backBtn" style="text-decoration: none; color:red;"><B>CANCEL BOOKING</B></a> -->

                    </div>
                </div>
            </section>

        </body>
        <script type="text/javascript" src="../JS/checkout.js"></script>

        </html>
    <?php } ?>
<?php } ?>