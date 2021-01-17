<?php
session_start();
$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');

$body_part = $_POST['body_type'];
$id_users = $_POST['id_users'];
$id_training = $_POST['id_training'];
$id_exercises = $_POST['id_exercises'];
$id = $_POST['id'];
echo $id_users . " ";
echo $id_training . " ";
echo $id_exercises . " ";
echo $body_part . " ";
echo $id . " ";
?>



<?php

$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');
?>
<?php
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$asd = $_SESSION['id_users_status'];
if ($asd == '1') {
    header('Location: adminpanel.php');
}

?>
<?php
include("connect.php");
$id = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>E-Gymnator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <div class="card">
        <p>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-dark display">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Część ciała</th>
                        <th scope="col">Poziom trudności</th>
                        <th scope="col">Typ ćwiczenia</th>
                        <th scope="col">Typ obciążenia</th>
                        <th scope="col">Zmień na to ćwiczenie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "connect.php";
                    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    $query = "SELECT * FROM exercises WHERE body_part = '$body_part'";
                    $query_run = mysqli_query($polaczenie, $query);
                    if ($query_run) {
                        foreach ($query_run as $row) {
                    ?>
                            <tr>
                                <td> <?php echo $row['id_exercises']; ?></td>
                                <td> <?php echo $row['name']; ?></td>
                                <td> <?php echo $row['body_part']; ?></td>
                                <td> <?php echo $row['difficulty']; ?></td>
                                <td> <?php echo $row['exercise_type']; ?></td>
                                <td> <?php echo $row['exercise_weights']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success update_action_page_btn">Zmień na to ćwiczenie</button>
                                </td>
                            </tr>
                    <?php
                        }
                        $polaczenie->close();
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </p>
    </div>

    <div class="modal fade" id="update_action_page" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuń ćwiczenie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update_action_page.php" method="POST">
                    <div class="modal-body ">
                        <input type="hidden" name="change_exercise_id" id="change_exercise_id">
                        <?php echo "<input type ='hidden' name='id_training' value='$id_training' /> "; ?>
                        <?php echo "<input type ='hidden' name='id_exercises' value='$id_exercises' /> "; ?>
                        <h4>Na pewno chcesz zmienić na to ćwiczenie?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                        <button type="submit" name="update_action_page" class="btn btn-primary">Tak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="datatableid1" class="table table-bordered table-dark display">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Część ciała</th>
                        <th scope="col">Poziom trudności</th>
                        <th scope="col">Typ ćwiczenia</th>
                        <th scope="col">Typ obciążenia</th>
                        <th scope="col">Zmień na to ćwiczenie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "connect.php";
                    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    $query = "SELECT * FROM exercises";
                    $query_run = mysqli_query($polaczenie, $query);
                    if ($query_run) {
                        foreach ($query_run as $row) {
                    ?>
                            <tr>
                                <td> <?php echo $row['id_exercises']; ?></td>
                                <td> <?php echo $row['name']; ?></td>
                                <td> <?php echo $row['body_part']; ?></td>
                                <td> <?php echo $row['difficulty']; ?></td>
                                <td> <?php echo $row['exercise_type']; ?></td>
                                <td> <?php echo $row['exercise_weights']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success update_action_page_btn">Zmień na to ćwiczenie</button>
                                </td>
                            </tr>
                    <?php
                        }
                        $polaczenie->close();
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    <div class="modal fade" id="update_action_page" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuń ćwiczenie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update_action_page.php" method="POST">
                    <div class="modal-body ">
                        <input type="hidden" name="change_exercise_id" id="change_exercise_id">
                        <?php echo "<input type ='hidden' name='id_training' value='$id_training' /> "; ?>
                        <?php echo "<input type ='hidden' name='id_exercises' value='$id_exercises' /> "; ?>
                        <h4>Na pewno chcesz zmienić na to ćwiczenie?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                        <button type="submit" name="update_action_page_btn" class="btn btn-primary">Tak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ########################################################################################################################################################-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#datatableid').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Szukaj ćwiczenia",
                    "processing": "Przetwarzanie...",
                    "lengthMenu": "Pokaż _MENU_ pozycji",
                    "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                    "infoEmpty": "Pozycji 0 z 0 dostępnych",
                    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                    "infoPostFix": "",
                    "loadingRecords": "Wczytywanie...",
                    "zeroRecords": "Nie znaleziono pasujących pozycji",
                    "emptyTable": "Brak danych",
                    "paginate": {
                        "first": "Pierwsza",
                        "previous": "Poprzednia",
                        "next": "Następna",
                        "last": "Ostatnia"
                    },
                    "aria": {
                        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#datatableid1').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Szukaj ćwiczenia",
                    "processing": "Przetwarzanie...",
                    "lengthMenu": "Pokaż _MENU_ pozycji",
                    "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                    "infoEmpty": "Pozycji 0 z 0 dostępnych",
                    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                    "infoPostFix": "",
                    "loadingRecords": "Wczytywanie...",
                    "zeroRecords": "Nie znaleziono pasujących pozycji",
                    "emptyTable": "Brak danych",
                    "paginate": {
                        "first": "Pierwsza",
                        "previous": "Poprzednia",
                        "next": "Następna",
                        "last": "Ostatnia"
                    },
                    "aria": {
                        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.update_action_page_btn', function(e) {
                $('#update_action_page').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#change_exercise_id').val(data[0]);
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</body>


</html>