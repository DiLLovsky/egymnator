<?php
    $polaczenie = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($polaczenie, 'egymnator');

    if(isset($_POST['updatedata']))
    {
        $id = $_POST['update_id'];

        $exercise_name = $_POST['exercise_name'];
        $body_part = $_POST['body_part'];
        $difficulty = $_POST['difficulty'];
        $exercise_type = $_POST['exercise_type'];
        $exercise_weights = $_POST['exercise_weights'];

        $query = "UPDATE exercises SET name='$exercise_name', body_part='$body_part', difficulty='$difficulty', exercise_type='$exercise_type', exercise_weights='$exercise_weights' WHERE id_exercises='$id' "; 
        $query_run = mysqli_query($polaczenie, $query);
        
        if($query_run)
        {
            echo '<script> alert("Dane edytowane"); </script>';
            header('Location: exercises.php');
        }
        else
        {
            echo '<script> alert("Dane nie zostały edytowane"); </script>';
        }
    }

?>