<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');
$id = $_POST['id'];
if (isset($_POST['addtraining'])) {
    $sql = "INSERT INTO `training` (`id_training`, `id_users`) VALUES (NULL, '$id')";

    if ($polaczenie->query($sql) === TRUE) {
        $id_training = $polaczenie->insert_id;
    }


    $legs_A = $_POST['legs_A'];
    $chest_A = $_POST['chest_A'];
    $back_A = $_POST['back_A'];
    $triceps_A = $_POST['triceps_A'];
    $biceps_A = $_POST['biceps_A'];
    $akce1_A = $_POST['akce1_A'];
    $akce2_A = $_POST['akce2_A'];
    $legs_B = $_POST['legs_B'];
    $chest_B = $_POST['chest_B'];
    $back_B = $_POST['back_B'];
    $triceps_B = $_POST['triceps_B'];
    $biceps_B = $_POST['biceps_B'];
    $akce1_B = $_POST['akce1_B'];
    $akce2_B = $_POST['akce2_B'];

    $tab = array(
        $legs_A, $chest_A, $back_A, $triceps_A,
        $biceps_A, $akce1_A, $akce2_A, $legs_B,
        $chest_B, $back_B, $triceps_B, $biceps_B,
        $akce1_B, $akce2_B
    );

    $lenght = count($tab);
    echo $tab[3];

    for ($i = 0; $i < $lenght; $i++) {
        if ($i <= 6) {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `reps`, `sets`, `type`) VALUES (NULL, '$id_training','$tab[$i]', '12', '4', 'A')";
            $query_run = mysqli_query($polaczenie, $query);
        } else {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `reps`, `sets`, `type`) VALUES (NULL, '$id_training','$tab[$i]', '12', '4', 'B')";
            $query_run = mysqli_query($polaczenie, $query);
        }
    }
    header('Location: mytraining.php');
} else {
    echo 'siema';
}
