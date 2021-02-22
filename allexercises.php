<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$asd = $_SESSION['id_users_status'];
if ($asd == '2') {
    header('Location: index.php');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title> E-Gymnator - Ćwiczenia </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styleprofile1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<style>
    @media(max-width: 1065px) {
        .content {
            width: calc(100%-3%);
        }

        .card-body {
            margin: 0;
            padding: 0;
            padding-left: 2px;
        }

        thead {
            width: 100%;
        }

        .table thead {
            display: none;
        }

        .table thead h3 {
            font-size: 15px;
            font-weight: bold;
            width: 100%;
            display: block;
        }

        .table thead tr td {
            width: 100%;
        }

        .table tbody {
            width: 100%;
            display: block;
        }

        .table {
            width: 100%;
        }

        .table tr,
        .table td {
            display: block;
            width: 100%;
        }

        .table td {
            text-align: right;
            padding-left: 0%;
            text-align: right;
            position: relative;
        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
        }

    }

    @media(max-width: 490px) {
        .table td::before {
            display: none;
        }

    }
</style>

<body>
    <?php include 'menu1.php'; ?>
    <div class="content">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatableid" class="table table-bordered table-dark display">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Część ciała</th>
                            <th scope="col">Poziom trudności</th>
                            <th scope="col">Typ ćwiczenia</th>
                            <th scope="col">Typ obciążenia</th>
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
                                    <td data-label="#"> <?php echo $row['id_exercises']; ?></td>
                                    <td data-label="Nazwa"> <?php echo $row['name']; ?></td>
                                    <td data-label="Część ciała"> <?php echo $row['body_part']; ?></td>
                                    <td data-label="Poziom trudności"> <?php echo $row['difficulty']; ?></td>
                                    <td data-label="Typ ćwiczenia"> <?php echo $row['exercise_type']; ?></td>
                                    <td data-label="Typ obciążenia"> <?php echo $row['exercise_weights']; ?></td>
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
                                while ($rows = $result->fetch_assoc()) {
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
                                while ($rows = $result->fetch_assoc()) {
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
                                while ($rows = $result->fetch_assoc()) {
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
                                while ($rows = $result->fetch_assoc()) {
                                    $exercise_weights = $rows['exercise_weights'];
                                    echo "<option value = '$exercise_weights'>$exercise_weights</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ########################################################################################################################################################-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#datatableid').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Wszystkie"]
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
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('.nav_btn').click(function() {
            $('.mobile_nav_items').toggleClass('active');
        });
    });
</script>

</html>