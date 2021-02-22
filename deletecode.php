<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if (isset($_POST['deletedata'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM exercises WHERE id_exercises='$id'";
    $query_run = mysqli_query($polaczenie, $query);

    if ($query_run) {
        echo '<script> alert("Dane usunięte"); </script>';
        header('Location: exercises.php');
    } else {
        echo '<script> alert("Dane nie zostały usunięte"); </script>';
    }
}
