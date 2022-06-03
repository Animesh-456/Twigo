<?php 
session_start();
if ($_SESSION["loggedin"]) {
    include '../php/db.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cemail = $_SESSION["email"];

    $sql = "SELECT * FROM review WHERE C_email='$cemail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row==NULL) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/givereview.css">
    <link rel='icon' type='image/x-icon' href='../img/fav.png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="login-text">
            <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
            <div class="text">
                <a href="">THANK-YOU FOR YOUR TIME</a>
                <hr>
                
                
                <form method="post" action="submitreview.php">
                <br>
                <input type="number" placeholder="RATING OUT OF 5" name="rating">
                <br>
                <input type="text" name="c">
                <br>
                
                <input type="submit" class="login-btn" value="SKIP" style="width: 20%;" name="skip">
                <input type="submit" class="signup-btn" value="SUBMIT" style="width: 20%;" name="comment">
                </form>
                
                <!-- <button >SKIP</button> -->
                <!-- <button >SUBMIT</button> -->
            </div>
        </div>
        <div class="call-text">
            <h1>GIVE YOUR VALUABLE <span style="color: red;">FEEDBACK</span></h1>
        </div>

    </div>
    <script>
        var cta = document.querySelector(".cta");
        var check = 0;

        cta.addEventListener('click', function (e) {
            var text = e.target.nextElementSibling;
            var loginText = e.target.parentElement;
            text.classList.toggle('show-hide');
            loginText.classList.toggle('expand');
            if (check == 0) {
                cta.innerHTML = "<i class=\"fas fa-chevron-up\"></i>";
                check++;
            }
            else {
                cta.innerHTML = "<i class=\"fas fa-chevron-down\"></i>";
                check = 0;
            }
        })
    </script>
</body>

</html>

<?php }else{
    header("location: ../php/logout.php");
} }else{
    echo "<script>alert('Please Login!')
    window.location='../html/customerlog.html';</script>";
}?>