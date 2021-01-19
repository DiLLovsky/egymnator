<!DOCTYPE html>
<html lang="pl">
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

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="css/nice-select.css">
    <title>E-Gymnator</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/button.js"></script>
    <link rel="stylesheet" href="styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <?php include 'menu1.php'; ?>
    <div class="content">
        <form action="training.php" method="POST">
            <div class="box">
                <h2>Stwórz swoj plan treningowy</h2>
                <select name="fbworppl" class="select-css">
                    <option disabled selected>Jaki chcesz trening?</option>
                    <option value="fbw">Trzydniowy - Full Body Workout</option>
                    <option value="ppl">Czterodniowy - Push Pull Legs Workout</option>
                </select>

                <select name="difficulty" class="select-css">
                    <option disabled selected>Jak jesteś doświadczony?</option>
                    <option value="beginner">Początkujący</option>
                    <option value="intermediate">Średniozaawansowany</option>
                    <option value="advanced">Zaawansowany</option>
                </select>

                <select name="experience" class="select-css">
                    <option disabled selected>Jak ciężko chcesz ćwiczyć?</option>
                    <option value="easy">Lekko</option>
                    <option value="medium">Średnio</option>
                    <option value="hard">Ciężko</option>
                </select>
                <button type="submit" class="btn-liquid">
                    <span class="inner">Stwórz plan</span>
                </button>
            </div>
        </form>
    </div>
</body>

</html>