<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
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
    <link rel="stylesheet" href="css/styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .content {
            background-image: url(background.png) !important;
            background-repeat: repeat-y;
            height: 100vh;
        }
    </style>

</head>

<body>
    <?php include 'menu1.php'; ?>

    <div class="content">
        <div class="card">
            <div class="info">
                <p>"Tym co odróżnia zwykłych ludzi od odnoszących sukces nie jest brak siły, nie jest to też brak wiedzy, ale przeważnie jest to brak woli" ~ Vince Lambardi</p>
            </div>
        </div>
        <div class="card">
            <p>Dieta jest nieodłączną częścią treningu. Pamiętaj, że:<br>
                1g białka = 4kcal<br>
                1g tłuszczu = 9kcal<br>
                1g węglowodanów = 4kcal<br>
            </p>
        </div>
        <div class="card">
            <p>Najlepszym sposobem na kontrolowanie swojej wagi jest codzienne ważenie swojego ciała a następnie wyciąganie średniej z całego tygodnia. <br>Jeżeli średnia jest większa niż z tygodnia poprzedniego to znaczy, że za dużo kalorii spożywamy.
            </p>
        </div>
        <div class="card">
            <div class="info">
                <p>FBW:<br>
                    W pierwszym tygodniu w poniedziałek wykonuj trening A, w środę trening B a w piątek ponownie trening A. Po weekendowej przerwie rozpocznij tydzień od treningu B.<br><br>
                    Push Pull Legs:<br>
                    W poniedziałek zastosuj trening Push a we wtorek trening Pull, po środowej przerwie w czwartek zacznij od ćwiczeń wypychających a następnego dnia od ćwiczeń przyciągających.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="info">
                <p>Dla wagi nie jest ważne z czego dostarczamy kalorie, dla zdrowia już tak.</p>
            </div>
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