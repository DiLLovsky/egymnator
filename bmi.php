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

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator - Oblicz swoje BMI</title>
    <link rel="stylesheet" href="style-bmi.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script>
        function bmi() {
            var height = parseFloat(document.getElementById("h").value)
            var weight = parseFloat(document.getElementById("w").value)
            var bmi = weight / (height * height) * 10000;
            var userBMI = document.getElementById("bmi_index")
            userBMI.textContent = bmi.toFixed(2);
            if (bmi < 18.5) {
                document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Niedowaga";
            } else if ((bmi >= 18.5) && (bmi <= 29.9)) {
                document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Pożądana masa ciała"
            } else if (bmi > 30) {
                document.querySelector("p").innerHTML = "Twoje BMI wynosi: " + (Math.round(bmi * 100) / 100).toFixed(2) + "<br>" + " Otyłość"
            }
        }

        function bmr() {
            var height = parseFloat(document.getElementById("height").value)
            var weight = parseFloat(document.getElementById("weight").value)
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

    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>

    <div class="container">

        <h1> KALKULATOR BMI</h1>
        <hr>
        <label>Wzrost</label>
        <input type="text" maxlength="3" id="h" placeholder="METRY" required>
        <br>
        <label>Waga</label>
        <input type="text" maxlength="2" id="w" placeholder="KILOGRAMY" required>
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
        <input type="text" maxlength="2" id="weight" placeholder="KILOGRAMY" required>
        <br>
        <label>Wiek</label>
        <input type="text" maxlength="2" id="age" placeholder="LATA" required>
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

</body>

</html>