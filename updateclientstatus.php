<?php
session_start();
$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');

if (isset($_POST['makeclient'])) {
    $id = $_POST['updateclient_id'];
    $query = "UPDATE users SET id_users_status='3' WHERE id_users='$id'";
    $query_run = mysqli_query($polaczenie, $query);

    if ($query_run) {
        echo '<script> alert("Dane edytowane"); </script>';
        header('Location: adminpanel.php');
    } else {
        echo '<script> alert("Dane nie zostały edytowane"); </script>';
    }
}

if (isset($_POST['maketrener'])) {
    $id = $_POST['updatetrener_id'];
    $query = "UPDATE users SET id_users_status='2' WHERE id_users='$id'";
    $query_run = mysqli_query($polaczenie, $query);

    if ($query_run) {
        echo '<script> alert("Dane edytowane"); </script>';
        header('Location: adminpanel.php');
    } else {
        echo '<script> alert("Dane nie zostały edytowane"); </script>';
    }
}
