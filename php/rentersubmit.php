<?php
include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

if($_POST){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $city = $_POST["city"];
        $lisence = $_POST["liscno"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $psw = $_POST["psw"];

         echo $name;
         echo $address;
         echo $email;
         echo $contact;
         echo $city;
         echo $lisence;
         echo $dob;
         echo $gender;
         echo $psw;

        $sql = "INSERT INTO renter(R_name, R_email, R_address, R_contact, R_city, R_lisence_no, R_DOB, R_gender, R_password) values('".$name."','".$email."', '".$address."', '".$contact."', '".$city."', '".$lisence."', '".$dob."', '".$gender."', '".$psw."' )";

        if($conn->query($sql)){
            header("location: ../html/RenterLogin.html");
        }else{
            echo "Error submitting the form!";
        }
    }
?>
