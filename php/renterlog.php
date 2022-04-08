<?php
include '../php/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

if($_POST){
    $email = $_POST["email"];
    $password = $_POST["psw"];

    echo $email;

    $sql = "SELECT * FROM renter WHERE R_email='$email' AND R_password='$password'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row!=null){
        session_start();

        // $_SESSION["rloggedin"] = true;
        $_SESSION["remail"] = $email;
        header("location: renterdash.php");
    }else{
            echo "Error submitting the form!";
        }
        // echo "Logged in succesfully !";
    }else{
        echo "err";
    }
