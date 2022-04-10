<?php
include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

if ($_POST) {
    // if(!empty($_POST["name"]) && !empty($_POST["address"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["city"]) && !empty($_POST["liscno"]) && !empty($_POST["dob"]) && !empty($_POST["gender"]) && !empty($_POST["psw"]){

    $remail = $_POST["email"];
    $security = $_POST["sq"];


    $sql = "SELECT * FROM renter WHERE R_email='$remail' AND R_security='$security'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row != null) {
        session_start();
        $_SESSION["remail"] = $remail;
        header("location: renterupdatepass2.php");
    } else {
        echo "Error submitting the form!";
    }
}
