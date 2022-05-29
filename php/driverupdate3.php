<?php 

include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
//   echo "Connected successfully";

  if(isset($_POST["l"])){
    
    $ps1 = $_POST["psw1"];
    $ps = $_POST["psw"];
     $email = $_POST["email"];

     $sql = "UPDATE driver SET D_psw='$ps1' WHERE D_email='$email'";
    
    if($ps1==$ps){
        
        $conn->query($sql);
            
            echo "<script>alert('Password Updated!')
            window.location='../html/driverLogin.html';</script>";
        }
    }else{
        echo "<script>alert('Error Occured! Please enter correct credentials!')
        window.location='../php/driverupdatepass2.php';</script>";
    }
//   }else{
//     echo "<script>alert('Error Occured!')
//     window.location='../html/driverLogin.html';</script>";
//   }
?>