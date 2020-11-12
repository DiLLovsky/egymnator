<?php
$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');

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
