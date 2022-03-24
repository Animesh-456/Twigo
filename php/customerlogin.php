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

    $sql = "SELECT * FROM customer WHERE C_email='$email' AND C_password='$password'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
    if($row!=null){
        session_start();

        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        header("location: dash.php");
    }else{
            echo "Error submitting the form!";
        }
        // echo "Logged in succesfully !";
    }else{
        echo "err";
    }
?>