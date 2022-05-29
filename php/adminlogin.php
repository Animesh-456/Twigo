<?php 
include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["psw"];
    
       
    
        $sql = "SELECT * FROM adm WHERE A_email='$email' AND A_password='$password'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row!=null){
            session_start();
    
            $_SESSION["aloggedin"] = true;
            $_SESSION["aemail"] = $email;
            header("location: admindash.php");
        }else{
           echo "<script>alert('Incorrect Username or Password!')
           window.location='../html/customerlog.html';</script>";
            }
            // echo "Logged in succesfully !";
        }else{
            echo "<script>alert('Incorrect Username or Password!')
            window.location='../html/adminlog.html';</script>";
        }
?>
