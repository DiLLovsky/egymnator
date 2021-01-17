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

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>E-Gymnator</title>
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
    <input type="checkbox" id="check">
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>E-<span>Gymnator</span></h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Wyloguj się</a>
        </div>
    </header>

    <div class="mobile_nav">
        <div class="nav_bar">
            <img src='<?php echo $image_src;  ?>' class="mobile_profile_image" alt="">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <a href="createtraining.php"><i class="fas fa-desktop"></i><span>Stwórz plan</span></a>
            <a href="exercises.php"><i class="fas fa-plus"></i><span>Dodaj ćwiczenia</span></a>
            <a href="mytraining.php"><i class="fas fa-dumbbell"></i><span>Moje treningi</span></a>
            <a href="bmi.php"><i class="fas fa-weight"></i><span>Oblicz BMI i BMR</span></a>
            <a href="profile.php"><i class="far fa-user"></i><span>Edytuj profil</span></a>
            <a href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Kalendarz</span></a>
        </div>
    </div>

    <div class="sidebar">
        <div class="profile_info">
            <img src='<?php echo $image_src;  ?>' class="profile_image" alt="">
            <h4><?php echo $_SESSION['login'] ?></h4>
        </div>
        <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="createtraining.php"><i class="fas fa-desktop"></i><span>Stwórz plan</span></a>
        <a href="exercises.php"><i class="fas fa-plus"></i><span>Dodaj ćwiczenia</span></a>
        <a href="mytraining.php"><i class="fas fa-dumbbell"></i><span>Moje treningi</span></a>
        <a href="bmi.php"><i class="fas fa-weight"></i><span>Oblicz BMI i BMR</span></a>
        <a href="profile.php"><i class="far fa-user"></i><span>Edytuj profil</span></a>
        <a href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Kalendarz</span></a>
    </div>

    <div class="content">
        <div class="card">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur molestie dolor, sed elementum risus venenatis et. Praesent vitae orci sit amet erat sagittis suscipit ac nec turpis. Maecenas eu varius turpis. Pellentesque fermentum, lorem sit amet auctor dignissim, mauris velit venenatis neque, non vulputate sem lacus non diam. Curabitur eget scelerisque nulla. Donec augue libero, ullamcorper ac dictum sit amet, semper sodales quam. Mauris volutpat accumsan arcu ac porta. Sed lectus arcu, egestas sit amet fermentum sed, sollicitudin eu turpis. Vivamus nec efficitur ipsum, nec fermentum quam. Suspendisse nec volutpat tellus. Cras at consequat quam. Cras pretium eros ipsum, nec sagittis turpis gravida et.</p>
        </div>
        <div class="card">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur molestie dolor, sed elementum risus venenatis et. Praesent vitae orci sit amet erat sagittis suscipit ac nec turpis. Maecenas eu varius turpis. Pellentesque fermentum, lorem sit amet auctor dignissim, mauris velit venenatis neque, non vulputate sem lacus non diam. Curabitur eget scelerisque nulla. Donec augue libero, ullamcorper ac dictum sit amet, semper sodales quam. Mauris volutpat accumsan arcu ac porta. Sed lectus arcu, egestas sit amet fermentum sed, sollicitudin eu turpis. Vivamus nec efficitur ipsum, nec fermentum quam. Suspendisse nec volutpat tellus. Cras at consequat quam. Cras pretium eros ipsum, nec sagittis turpis gravida et.</p>
        </div>
        <div class="card">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur molestie dolor, sed elementum risus venenatis et. Praesent vitae orci sit amet erat sagittis suscipit ac nec turpis. Maecenas eu varius turpis. Pellentesque fermentum, lorem sit amet auctor dignissim, mauris velit venenatis neque, non vulputate sem lacus non diam. Curabitur eget scelerisque nulla. Donec augue libero, ullamcorper ac dictum sit amet, semper sodales quam. Mauris volutpat accumsan arcu ac porta. Sed lectus arcu, egestas sit amet fermentum sed, sollicitudin eu turpis. Vivamus nec efficitur ipsum, nec fermentum quam. Suspendisse nec volutpat tellus. Cras at consequat quam. Cras pretium eros ipsum, nec sagittis turpis gravida et.</p>
        </div>
        <div class="card">
            <?php
            echo "<p>Ćwiczenia " . $_SESSION['id_users'] . '![<a href="exercises.php">Wszystkie ćwiczenia</a>]</p>';
            echo '<p>Edytuj swój profil: [<a href="profile.php">Profil</a>]</p>';
            $dataczas = new DateTime();
            echo '<p>' . $dataczas->format('Y-m-d') . '</p>';
            echo '<p>' . date('Y-m-d') . '</p>';
            ?>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>


</body>


</html>