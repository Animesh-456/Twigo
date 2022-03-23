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

    if($conn->query($sql)){
        session_start();

        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $sql = "SELECT * FROM customer WHERE C_email='$email' AND C_password='$password'";
        $result = $conn->query($sql);
	$row = $result->fetch_assoc();

        if($row!=null){
            header("location: dash.php");
        }else{
            echo "Error submitting the form!";
        }
        // echo "Logged in succesfully !";
    }else{
        // header("location: ../html/customerlog.html");
        echo "err";
    }
}
?>