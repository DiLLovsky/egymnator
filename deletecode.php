<?php
    $polaczenie = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($polaczenie, 'egymnator');

    if(isset($_POST['deletedata']))
    {
        $id = $_POST['delete_id'];

        $id = $_POST['delete_id'];

        $query = "DELETE FROM exercises WHERE id_exercises='$id'";
        $query_run = mysqli_query($polaczenie, $query);
        
        if($query_run)
        {
            echo '<script> alert("Dane usunięte"); </script>';
            header('Location: exercises.php');
        }
        else
        {
            echo '<script> alert("Dane nie zostały usunięte"); </script>';
        }
    }

?>