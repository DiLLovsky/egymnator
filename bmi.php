<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$asd = $_SESSION['id_users_status'];
if ($asd == '1') {
    header('Location: adminpanel.php');
}

?>

<?php
include("connect.php");
$id = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;

?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator - Oblicz swoje BMI</title>
    <link rel="stylesheet" href="styleprofilebmi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script>
        func

        function bmr() {
            var height = parseFloat(document.getElementById("height").value);
            var weight = parseFloat(document.getElementById("weight").value);
            var age = parseInt(document.getElementById("age").value)

            if (document.getElementById('gender_Male').checked) {
                var bmr = 66.47 + (13.75 * weight) + (5.003 * height) - (6.755 * age);
                document.getElementById("bmr_index").innerHTML = "Twoje zapotrzebowanie kaloryczne wynosi: " + Math.round(bmr) + " kcal";
            } else if (document.getElementById('gender_Female').checked) {
                var bmr = 655.1 + (9.563 * weight) + (1.85 * height) - (4.676 * age);
                document.getElementById("bmr_index").innerHTML = "Twoje zapotrzebowanie kaloryczne wynosi: " + Math.round(bmr) + " kcal";
            }

        }
    </script>

</head>

<body>
    <?php include 'menu1.php'; ?>

    <div class="content">
        <div class="container">

            <h1> KALKULATOR BMI</h1>
            <hr>
            <label>Wzrost</label>
            <input type="text" maxlength="3" id="h" placeholder="METRY" required>
            <br>
            <label>Waga</label>
            <input type="text" maxlength="3" id="w" placeholder="KILOGRAMY" required>
            <br>
            <input type="button" value="Oblicz" onclick="bmi()">
            <p id="bmi_index"></p>

        </div>
        <div class="container">
            <h1>TWOJE ZAPOTRZEBOWANIE KALORYCZNE (BMR)</h1>
            <hr>
            <label>Wzrost</label>
            <input type="text" maxlength="3" id="height" placeholder="METRY" required>
            <br>
            <label>Waga</label>
            <input type=" text" maxlength="3" id="weight" placeholder="KILOGRAMY" required>
            <br>
            <label>Wiek</label>
            <input type=" text" maxlength="2" id="age" placeholder="LATA" required>
            <br>
            <label class="radiocont">Mężczyzna
                <input type="radio" checked="checked" name="radio" id="gender_Male" required>
                <span class="checkmark"></span>
            </label>
            <label class="radiocont">Kobieta
                <input type="radio" name="radio" id="gender_Female">
                <span class="checkmark"></span>
            </label>
            <input type="button" value="Oblicz" onclick="bmr()">
            <p id="bmr_index"></p>
        </div>
    </div>

</body>
<script src="js/bmi.js"></script>

</html>