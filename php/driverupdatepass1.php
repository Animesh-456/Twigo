<?php 
session_start();
include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  //echo "Connected successfully";

  if(isset($_POST["login"])){
    // if(!empty($_POST["name"]) && !empty($_POST["address"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["city"]) && !empty($_POST["liscno"]) && !empty($_POST["dob"]) && !empty($_POST["gender"]) && !empty($_POST["psw"]){
       
        $email = $_POST["email"];
        $security = $_POST["sq"];
        

        $sql = "SELECT * FROM driver WHERE D_email='$email' AND D_security='$security'";
        $result = $conn->query($sql);
	$row = $result->fetch_assoc();

        if($row!=null){
            
            $_SESSION["demail"] = $email;
            header("location: driverupdatepass2.php");
        }else{
            echo "<script>alert('Incorrect email Or security!')
            window.location='../html/drivupdatepass.html';</script>";
        }
    }else{
        echo "<script>alert('Please Submit!')
            window.location='../html/driverLogin.html';</script>";
    }
