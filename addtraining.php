<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$id = $_POST['id'];
if (isset($_POST['addtraining'])) {
    $sql = "INSERT INTO `training` (`id_training`, `id_users`) VALUES (NULL, '$id')";

    if ($polaczenie->query($sql) === TRUE) {
        $id_training = $polaczenie->insert_id;
    }


    $legs_A = $_POST['legs_A'];
    $chest_A = $_POST['chest_A'];
    $back_A = $_POST['back_A'];
    $arms_A = $_POST['arms_A'];
    $triceps_A = $_POST['triceps_A'];
    $biceps_A = $_POST['biceps_A'];
    $akce1_A = $_POST['akce1_A'];
    $akce2_A = $_POST['akce2_A'];
    $legs_B = $_POST['legs_B'];
    $chest_B = $_POST['chest_B'];
    $back_B = $_POST['back_B'];
    $arms_B = $_POST['arms_B'];
    $triceps_B = $_POST['triceps_B'];
    $biceps_B = $_POST['biceps_B'];
    $akce1_B = $_POST['akce1_B'];
    $akce2_B = $_POST['akce2_B'];

    $tab = array(
        $legs_A, $chest_A, $back_A, $arms_A, $triceps_A,
        $biceps_A, $akce1_A, $akce2_A, $legs_B,
        $chest_B, $back_B, $arms_B, $triceps_B, $biceps_B,
        $akce1_B, $akce2_B
    );

    $lenght = count($tab);

    for ($i = 0; $i < $lenght; $i++) {
        if ($i <= 7) {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `type`) VALUES (NULL, '$id_training','$tab[$i]', 'A')";
            $query_run = mysqli_query($polaczenie, $query);
        } else {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `type`) VALUES (NULL, '$id_training','$tab[$i]', 'B')";
            $query_run = mysqli_query($polaczenie, $query);
        }
    }
    header('Location: mytraining.php');
} else {
    header('Location: dashboard.php');
}
