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


    $legs_PUSH = $_POST['legs_PUSH'];
    $chest_PUSH_main = $_POST['chest_PUSH_main'];
    $chest_PUSH_additional = $_POST['chest_PUSH_additional'];
    $arms_PUSH = $_POST['arms_PUSH'];
    $triceps_PUSH = $_POST['triceps_PUSH'];
    $legs_PULL = $_POST['legs_PULL'];
    $back_PULL_main = $_POST['back_PULL_main'];
    $back_PULL_additional = $_POST['back_PULL_additional'];
    $arms_PULL = $_POST['arms_PULL'];
    $biceps_PULL = $_POST['biceps_PULL'];

    $tab = array(
        $legs_PUSH, $chest_PUSH_main, $chest_PUSH_additional, $arms_PUSH,
        $triceps_PUSH, $legs_PULL, $back_PULL_main, $back_PULL_additional,
        $arms_PULL, $biceps_PULL
    );

    $lenght = count($tab);

    for ($i = 0; $i < $lenght; $i++) {
        if ($i <= 4) {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `reps`, `sets`, `type`) VALUES (NULL, '$id_training','$tab[$i]', '12', '4', 'PUSH')";
            $query_run = mysqli_query($polaczenie, $query);
        } else {
            $query = "INSERT INTO `training_exercises` (`id`, `id_training`, `id_exercises`, `reps`, `sets`, `type`) VALUES (NULL, '$id_training','$tab[$i]', '12', '4', 'PULL')";
            $query_run = mysqli_query($polaczenie, $query);
        }
    }
    header('Location: mytraining.php');
} else {
    echo 'siema';
}
