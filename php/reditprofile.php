<?php
session_start();
if ($_SESSION["remail"]) {
    include '../php/db.php';

    // $V_id = $_POST["V_id"];
    $remail = $_SESSION["remail"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM renter WHERE R_email='$remail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) {
?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/x-icon" href="../img/fav.png">
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-color: rgb(255, 255, 255);
                }

                * {
                    box-sizing: border-box;
                }

                /* Add padding to containers */
                .container {
                    margin-left: 10%;
                    padding: 16px;
                    background-color: white;
                    margin-top: -30px;
                }

                /* Full-width input fields */
                input[type=text],
                input[type=password],
                select[id=city],
                input[type=number],
                input[type=tel],
                input[type=date],
                select[id=gender] {
                    width: 50%;
                    padding: 15px;
                    margin: 5px 0px 33px 0px;
                    display: block;
                    border: none;
                    background: #f1f1f1;
                    border-radius: 30px;
                }

                input[type=text]:focus,
                input[type=password]:focus,
                select[id=city]:focus,
                input[type=number]:focus,
                input[type=date]:focus,
                input[type=tel]:focus,
                select[id=gender]:focus {
                    background-color: #ddd;
                    outline: none;
                }

                /* Overwrite default styles of hr */
                hr {
                    border: 0.5px solid #ff0000;
                    margin-bottom: 25px;
                    margin-right: 850px;
                    width: 20%;
                }

                /* Set a style for the submit button */
                /* .registerbtn {
      background-color: #ee0000;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 35%;
      display:inline-block;
      opacity: 0.9;
      border-radius: 30px;
      
    } */

                .registerbtn:hover {
                    opacity: 1;
                }

                .clearbtn {
                    background-color: #ee0000;
                    color: white;
                    padding: 12px 15px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 10%;
                    display: inline-block;
                    opacity: 0.9;
                    border-radius: 30px;
                }

                .clearbtn:hover {
                    opacity: 1;
                }

                input[type=file] {
                    z-index: -1;
                    top: 10px;
                    left: 8px;
                    font-size: 17px;
                    color: #b8b8b8;
                    display: none;
                }

                .backbtn {
                    background-color: #ee0000;
                    display: inline-block;
                    text-decoration: none;
                    color: rgb(255, 255, 255);
                    cursor: pointer;
                    padding: 16px 30px;
                    font-size: 13px;
                    position: relative;
                    border: none;
                    border-radius: 30px;

                }

                .backbtn:hover {
                    opacity: 1;
                }

                input[type=submit] {
                    background-color: #ee0000;
                    color: white;
                    padding: 16px 20px;
                    margin: 8px 0;
                    border: none;
                    cursor: pointer;
                    width: 35%;
                    display: inline-block;
                    opacity: 0.9;
                    border-radius: 30px;
                }

                .image {
                    /* padding: 10px ; */
                    width: 80%;
                    padding-right: 10px;
                }

                /* Add a blue text color to links */
                a {
                    color: rgb(255, 9, 9);
                }

                .card {
                    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
                    max-width: 500px;
                    /* margin: auto; */
                    margin-left: -80%;
                    margin-top: -130%;
                    text-align: center;
                    padding-top: 10px;
                    /* font-family: arial; */
                }

                .title {
                    color: grey;
                    font-size: 18px;
                }

                .button {
                    display: inline-block;
                    padding: 12px 18px;
                    cursor: pointer;
                    border-radius: 5px;
                    background-color: #ee0000;
                    font-size: 16px;
                    font-weight: bold;
                    color: #f1f1f1;
                }

                a {
                    text-decoration: none;
                    font-size: 22px;
                    color: black;
                }
            </style>
        </head>

        <body>
            <form action="" method="post">
                <div class="container">
                    <table>
                        <tr>
                            <td>
                                <br>
                                <h1>Twi<span style="color: #ee0000;">Go</span> Edit Renter Profile </h1>
                                <hr>
                                <br>


                                <!-- <table style="width: 100%;"> -->
                                <label for="name"><b>Name</b></label>
                                <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo $row["R_name"] ?>" required>

                                <label for="address"><b>Address</b></label>
                                <input type="text" placeholder="Enter Address" name="address" id="address" value="<?php echo $row["R_address"] ?>" required>

                                <label for="contact"><b>Contact</b></label>
                                <input type="number" placeholder="Enter Contact" name="contact" id="contact" value="<?php echo $row["R_contact"] ?>" required>

                                <label for="email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $row["R_email"] ?>" required>

                                <label for="city" name="city"><b>Choose your city:</b></label>
                                <select id="city" name="city">
                                    <?php
                                    echo "<option>" . $row['R_city'] . "</option>";
                                    if ($row['R_city'] == "Kolkata") {
                                        echo "<option value='Delhi'>Delhi</option>
          <option value='Mumbai'>Mumbai</option>";
                                    } elseif ($row['R_city'] == "Delhi") {
                                        echo "<option value='Kolkata'>Kolkata</option>
          <option value='Mumbai'>Mumbai</option>";
                                    } elseif ($row['R_city'] == "Mumbai") {
                                        echo "<option value='Kolkata'>Kolkata</option>
          <option value='Delhi'>Delhi</option>";
                                    }
                                    ?>

                                </select>

                                <label for="gender" name="gender"><b>Gender:</b></label>
                                <select id="gender" name="gender">
                                    <?php
                                    echo "<option>" . $row['R_gender'] . "</option>";
                                    if ($row['R_gender'] == "Others") {
                                        echo "<option value='Male'>Male</option>
          <option value='Female'>Female</option>";
                                    } elseif ($row['R_gender'] == "Male") {
                                        echo "<option value='Others'>Others</option>
          <option value='Female'>Female</option>";
                                    } elseif ($row['R_gender'] == "Female") {
                                        echo "<option value='Others'>Others</option>
          <option value='Male'>Male</option>";
                                    }
                                    ?>
                                </select>

                                <label for="aadhar"><b>Aadhar ID</b></label>
                                <input type="number" placeholder="123xxx555" name="aadhar" id="aadhar" value="<?php echo $row["R_aadhar_id"] ?>" required>

                                <label for="liscno"><b>Lisence No:- </b></label>
                                <input type="text" placeholder="123XXX" name="liscno" id="liscno" value="<?php echo $row["R_lisence_no"] ?>" required>

                                <label for="dob"><b>DOB</b></label>
                                <input type="date" placeholder="Enter DOB" name="dob" id="dob" value="<?php echo $row["R_DOB"] ?>" required>

                                <input type="submit" name="Update" value="Update" style="font-size: 20px;">
                                </input>
                                <a href="renterprofiledash.php" class="backbtn" style="font-size: 20px; margin-left: 250px;">Back</a>


                                <button type="reset" class="clearbtn" style="font-size: 20px;">Clear</button>
                            </td>
                            <!-- <td>
                <div class="card">
                  <img src="../img/undraw_male_avatar_323b.svg" alt="John" style="width:50%">
                  <p>
                  
        <label class="button" for="upload">Upload Image</label>
        <input id="upload" type="file">
      
                   
                  </p>
                </div>
              </td> -->
                            <!-- <td><img src="../img/undraw_travel_booking_re_6umu.svg" class="image"></img></td> -->
                        </tr>
                    </table>
                </div>
            </form>

        </body>
        <?php
        if ($_POST) {
            $name = $_POST["name"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $city = $_POST["city"];
            $lisence = $_POST["liscno"];
            $dob = $_POST["dob"];
            $gender = $_POST["gender"];
            $adhar = $_POST["aadhar"];


            $sql = "UPDATE renter SET R_name='$name', R_address='$address', R_email='$email', R_contact='$contact', R_city='$city', R_lisence_no='$lisence',
    R_dob='$dob', R_gender='$gender',  R_aadhar_id='$adhar' WHERE R_email='$remail'";

            if ($conn->query($sql)) {
                // header("location: ../html/customerlog.html");
                echo "<script>window.location='renterprofiledash.php'</script>";
                echo "Data Updated !";
            } else {
                echo "Error submitting the form!";
                echo $conn->error;
            }
        } ?>

        </html>
<?php }
} else {
    header("location: ../html/RenterLogin.html");
} ?>