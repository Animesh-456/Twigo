<?php 
session_start();
if ($_SESSION["remail"]) {
    include '../php/db.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $V_id=$_SESSION["V_id"];

    if($_POST) {

        $V_num = $_POST["vnumber"];
        $V_chasis = $_POST["vchasis"];
        $V_km_driv = $_POST["vkmdriven"];
        $V_address = $_POST["vaddress"];
        $V_description = $_POST["vdescription"];
        $V_city = $_POST["vcity"];

        $sql = "UPDATE vehicle SET V_no='$V_num', V_address='$V_address', V_Chasis_no='$V_chasis', V_km_driven='$V_km_driv', V_city='$V_city', V_description='$V_description'
         WHERE V_id='$V_id'";


        if ($conn->query($sql)) {
            unset($_SESSION["V_id"]);
            
            // header("location: ../html/customerlog.html");
            echo "<script>window.location='renterdash.php'</script>";
            echo "Data Updated !";
        } else {
            echo "Error submitting the form!";
            echo $conn->error;
        }
    }
}


?>