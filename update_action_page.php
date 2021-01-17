<?php
$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');
$id_training = $_POST['id_training'];
$id_exercises = $_POST['id_exercises'];
if (isset($_POST['update_action_page'])) {
    $id = $_POST['change_exercise_id'];

    echo $id;
    echo $id_training;
    echo $id_exercises;

    $query = "UPDATE training_exercises SET id_exercises = '$id' WHERE id_exercises='$id_exercises' AND id_training='$id_training'";
    $query_run = mysqli_query($polaczenie, $query);

    if ($query_run) {
        echo '<script> alert("Dane edytowane"); </script>';
        header('Location: mytraining.php');
    } else {
        echo '<script> alert("Dane nie zostały edytowane"); </script>';
    }
}
