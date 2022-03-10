<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicle_rent";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

if($_POST){
    // if(!empty($_POST["name"]) && !empty($_POST["address"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["city"]) && !empty($_POST["liscno"]) && !empty($_POST["dob"]) && !empty($_POST["gender"]) && !empty($_POST["psw"]){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $city = $_POST["city"];
        $lisence = $_POST["liscno"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $psw = $_POST["psw"];

        $sql = "INSERT INTO customer(C_name, C_email, C_address, C_contact, C_city, C_lisence_no, C_dob, C_gender, C_password) values('".$name."','".$email."', '".$address."', '".$contact."', '".$city."', '".$lisence."', '".$dob."', '".$gender."', '".$psw."' )";

        if($conn->query($sql)){
            echo "Form submitted succesfully !";
            echo $dob;
        }else{
            echo "Error submitting the form!";
        }
    }
?>
