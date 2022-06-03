<?php
session_start();
if ($_SESSION["loggedin"]) {
    include '../php/db.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cemail = $_SESSION["email"];

    if ($_POST["comment"]) {

        $rating = $_POST["rating"];
        $comm = $_POST["c"];

        $sql = "INSERT INTO review(C_email, RV_comment, RV_rate) 
        values('" . $cemail . "', '" . $comm . "' , '" . $rating . "')";

        if ($conn->query($sql)) {
            header("location: ../php/logout.php");
        } else {
            echo "Error submitting the form!";
        }
    } elseif ($_POST["skip"]) {
        header("location: ../php/logout.php");
    }
} else {
    echo "<script>alert('Please Login!')
    window.location='../html/customerlog.html';</script>";
}
