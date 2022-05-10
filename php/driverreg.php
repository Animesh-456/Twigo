<?php
include '../php/db.php';

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
       
        $gender = $_POST["gender"];
        $psw = $_POST["psw"];
        $security = $_POST["sq"];
        
        $dob= $_POST["dob"];
        $adhar = $_POST["adhar"];

        $sql = "INSERT INTO driver(D_name, D_email, D_address, D_contact, D_city, D_lisence, D_dob, D_gender, 
        D_psw, D_security, D_adhar) values('$name','$email', '$address', '$contact', 
        '$city', '$lisence', '$dob', '$gender', '$psw', '$security', '$adhar')";

        if($conn->query($sql)){
            header("location: ../html/DriverLogin.html");
        }else{
            echo $conn->error;
        }
    }
