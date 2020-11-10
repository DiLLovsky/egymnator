<?php

session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title> E-Gymnator - Ćwiczenia </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
</head>

<body> 
    <div class="card">
        <div class="card-body">                                        
            <?php
                require_once "connect.php";
                $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

                $query = "SELECT * FROM exercises";
                $query_run = mysqli_query($polaczenie, $query);
            ?>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Część ciała</th>
                <th scope="col">Poziom trudności</th>
                <th scope="col">Typ ćwiczenia</th>
                <th scope="col">Typ obciążenia</th>
                <th scope="col">Edytuj</th>
                </tr>
            </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
            <tbody>
                <tr>
                    <td> <?php echo $row['id_exercises']; ?></td>
                    <td> <?php echo $row['name']; ?></td>
                    <td> <?php echo $row['body_part']; ?></td>
                    <td> <?php echo $row['difficulty']; ?></td>
                    <td> <?php echo $row['exercise_type']; ?></td>
                    <td> <?php echo $row['exercise_weights']; ?></td>
                    <td> 
                        <button type="button" class="btn btn-success editbtn">Edytuj</button>
                    </td>
                </tr>
            </tbody>
            <?php
                    }
                    $polaczenie->close();
                }
                else
                {
                    echo "No Record Found";
                }
            ?>
            </table>
        </div>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="exerciseaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj nowe ćwiczenie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="dodajcwiczenie.php" method="POST">
                    <div class="modal-body ">
                        <div class="form-group select-outline">
                            <label>Nazwa</label>
                            <input type="text" name="exercise_name" class="form-control" placeholder="Wpisz nazwę ćwiczenia">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="body_part" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz grupę mięśniową</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT body_part FROM body_part";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $body_part = $rows['body_part'];
                                            echo "<option value = '$body_part'>$body_part</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="difficulty" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz poziom trudności</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT difficulty FROM difficulty";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $difficulty = $rows['difficulty'];
                                            echo "<option value = '$difficulty'>$difficulty</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="exercise_type" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz typ ćwiczenia</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT exercise_type FROM exercise_type";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $exercise_type = $rows['exercise_type'];
                                            echo "<option value = '$exercise_type'>$exercise_type</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="exercise_weights" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz typ ciężaru</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT exercise_weights FROM exercise_weights";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $exercise_weights = $rows['exercise_weights'];
                                            echo "<option value = '$exercise_weights'>$exercise_weights</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>           
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Dodaj nowe ćwiczenie!</h2>      
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exerciseaddmodal">
                    Dodaj ćwiczenie
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ########################################################################################################################################################-->
    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edytuj ćwiczenie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">
                    <div class="modal-body ">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group select-outline">
                            <label>Nazwa</label>
                            <input type="text" name="exercise_name" id="exercise_name" class="form-control" placeholder="Wpisz nazwę ćwiczenia">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="body_part" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz grupę mięśniową</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT body_part FROM body_part";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $body_part = $rows['body_part'];
                                            echo "<option value = '$body_part'>$body_part</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="difficulty" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz poziom trudności</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT difficulty FROM difficulty";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $difficulty = $rows['difficulty'];
                                            echo "<option value = '$difficulty'>$difficulty</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="exercise_type" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz typ ćwiczenia</option>
                                    
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT exercise_type FROM exercise_type";
                                        $result = mysqli_query($polaczenie, $sql);
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $exercise_type = $rows['exercise_type'];
                                            echo "<option value = '$exercise_type'>$exercise_type</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 select-outline">
                                <select name="exercise_weights" class="custom-select custom-select-lg mb-3">
                                    <option disabled selected>Wybierz typ ciężaru</option>
                                        <?php
                                        require_once "connect.php";
                                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    
                                        $sql = "SELECT exercise_weights FROM exercise_weights";
                                        $result = mysqli_query($polaczenie, $sql);
                                        
                                        while($rows = $result->fetch_assoc())
                                        {
                                            $exercise_weights = $rows['exercise_weights']; 
                                            echo "<option value = '$exercise_weights' >$exercise_weights</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Edytuj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>           
    <!-- ########################################################################################################################################################-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $('.editbtn').on('click', function(){
                $('#editmodal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                
                $('#update_id').val(data[0]);
                $('#exercise_name').val(data[1]);
                $('#body_part').val(data[2]);
                $('#difficulty').val(data[3]);
                $('#exercise_type').val(data[4]);
                $('#exercise_weights').val(data[5]);
            });
        });
    </script>
</body>
</html>