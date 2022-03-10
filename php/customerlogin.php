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
    $email = $_POST["email"];
    $password = $_POST["psw"];

    $sql = "SELECT * FROM customer WHERE C_email='$email' AND C_password='$password'";
    
    if($conn->query($sql)){
        echo "Logged in succesfully !";
    }else{
        echo "Error login!" . $conn->error;
    }
}
?>