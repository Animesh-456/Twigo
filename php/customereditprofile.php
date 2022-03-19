<?php
session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  $semail = $_SESSION["email"];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM customer WHERE C_email='$semail'";
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
          margin-left: 30%;
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
          border: 1px solid #ff0000;
          margin-bottom: 25px;
          margin-right: 850px;
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
          padding: 16px 20px;
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

        /* Add a blue text color to links */
        a {
          color: rgb(255, 9, 9);
        }
      </style>
    </head>

    <body>

      <form action="" method="post">
        <div class="container">
          <h1>Twi<span style="color: #ee0000;">Go</span> Customer Edit Profile</h1>
          <hr>

          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo $row["C_name"] ?>" required>

          <label for="address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="address" id="address" value="<?php echo $row["C_address"] ?>" required>

          <label for="contact"><b>Contact</b></label>
          <input type="number" placeholder="Enter Contact" name="contact" id="contact"  value="<?php echo $row["C_contact"] ?>" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $row["C_email"] ?>" required>

          <label for="city" name="city"><b>Choose your city:</b></label>
          <select id="city" name="city">
            <?php
            echo "<option>" . $row['C_city'] . "</option>";
            if ($row['C_city'] == "Kolkata") {
              echo "<option value='Delhi'>Delhi</option>
          <option value='Mumbai'>Mumbai</option>";
            } elseif ($row['C_city'] == "Delhi") {
              echo "<option value='Kolkata'>Kolkata</option>
          <option value='Mumbai'>Mumbai</option>";
            } elseif ($row['C_city'] == "Mumbai") {
              echo "<option value='Kolkata'>Kolkata</option>
          <option value='Delhi'>Delhi</option>";
            }
            ?>

            <!-- <option value="Kolkata">Kolkata</option>
        <option value="Delhi">Delhi</option>
        <option value="Mumbai">Mumbai</option> -->

          </select>

          <table style="width: 100%;">
            <tr>
              <td>
                <label for="liscno"><b>Lisence No:- </b></label>
                <input type="text" placeholder="123XXX" name="liscno" id="liscno" value="<?php echo $row["C_lisence_no"] ?>" required>
              </td>
              <td>
                <label for="dob"><b>DOB</b></label>
                <input type="date" placeholder="Enter DOB" name="dob" id="dob" value="<?php echo $row["C_dob"] ?>" required>
              </td>
            </tr>
            <tr>
              <td>
                <label for="gender" name="gender"><b>Gender:</b></label>
                <select id="gender" name="gender">
                  <?php
                  echo "<option>" . $row['C_gender'] . "</option>";
                  if ($row['C_gender'] == "Others") {
                    echo "<option value='Male'>Male</option>
          <option value='Female'>Female</option>";
                  } elseif ($row['C_gender'] == "Male") {
                    echo "<option value='Others'>Others</option>
          <option value='Female'>Female</option>";
                  } elseif ($row['C_gender'] == "Female") {
                    echo "<option value='Others'>Others</option>
          <option value='Male'>Male</option>";
                  }
                  ?>
                </select>
              </td>
              <td>
                <label for="aadhar"><b>Aadhar ID</b></label>
                <input type="number" placeholder="123xxx555" name="aadhar" id="aadhar" value="<?php echo $row["C_adhar_id"] ?>" required>
              </td>
              <!-- <td><label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
          </td> -->
            </tr>



          </table>
          <br>
          <input type="submit" name="register" value="Update">
          <!-- <button type="submit" class="registerbtn" style="font-size: 20px;" >Register</button> -->
          </input>

          <a href="profiledash.php" class="backbtn" style="font-size: 20px; margin-left: 250px;">Back</a>
          <button type="reset" class="clearbtn" style="font-size: 20px;">Clear</button>
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

      $sql = "UPDATE customer SET C_name='$name', C_address='$address', C_email='$email', C_contact='$contact', C_city='$city', C_lisence_no='$lisence',
    C_dob='$dob', C_gender='$gender', C_adhar_id='$adhar' WHERE C_email='$semail'";

      if ($conn->query($sql)) {
        // header("location: ../html/customerlog.html");
        echo "<script>window.location='profiledash.php'</script>";
        echo "Data Updated !";
      } else {
        echo "Error submitting the form!";
        echo $conn->error;
      }
    } ?>

    </html>
<?php }
} else {
  header("location: ../html/customerlog.html");
} ?>