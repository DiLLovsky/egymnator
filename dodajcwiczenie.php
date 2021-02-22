<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if (isset($_POST['insertdata'])) {
    $exercise_name = $_POST['exercise_name'];
    $body_part = $_POST['body_part'];
    $difficulty = $_POST['difficulty'];
    $exercise_type = $_POST['exercise_type'];
    $exercise_weights = $_POST['exercise_weights'];

    $query = "INSERT INTO `exercises` (`id_exercises`, `name`, `body_part`, `difficulty`, `exercise_type`, `exercise_weights`) VALUES (NULL, '$exercise_name','$body_part', '$difficulty', '$exercise_type', '$exercise_weights')";
    $query_run = mysqli_query($polaczenie, $query);

    if ($query_run) {
        echo '<script> alert("Dane zapisane"); </script>';
        header('Location: exercises.php');
    } else {
        echo '<script> alert("Dane nie zostały zapisane"); </script>';
    }
}
