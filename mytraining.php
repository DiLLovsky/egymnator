<?php

$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');
?>
<?php

session_start();

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
$id_users = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id_users'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;
$tab = array();
$tab_body_part = array();
$tab_id_exercises = array();
$tab_id = array();
$tab_training = array();
$tab_type = array();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>E-Gymnator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styleprofile1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        .card {
            width: 70%;
            margin-left: 15%;
            margin-top: 20px;
        }

        div.dataTables_wrapper {
            width: 1000px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php include 'menu1.php'; ?>
    <div class="content">
        <?php
        require_once "connect.php";
        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
        $query = "SELECT * FROM training WHERE id_users = '$id_users'";
        $query_run = mysqli_query($polaczenie, $query);
        while ($rows = $query_run->fetch_assoc()) {
            $id_training = $rows['id_training'];
            $start_date = $rows['start_date'];
            array_push($tab_training, $id_training);
            $lenght_train = count($tab_training);

            for ($i = 0; $i < $lenght_train; $i++) {
                $exer = "SELECT * FROM training_exercises WHERE id_training = '$tab_training[$i]'";
                $exer_run = mysqli_query($polaczenie, $exer);
                while ($rowsexer = $exer_run->fetch_assoc()) {
                    $id = $rowsexer['id'];
                    array_push($tab_id, $id);
                    $type = $rowsexer['type'];
                    array_push($tab_type, $type);
                    $id_exercises = $rowsexer['id_exercises'];
                    $exer1 = "SELECT * FROM exercises WHERE id_exercises = '$id_exercises'";
                    $exer1_run = mysqli_query($polaczenie, $exer1);
                    $rows = $exer1_run->fetch_assoc();
                    $name = $rows['name'];
                    $body_part = $rows['body_part'];
                    array_push($tab, $name);
                    array_push($tab_body_part, $body_part);
                    array_push($tab_id_exercises, $id_exercises);
                }
            }
            $lenght = count($tab);
        ?>

            <div class="card">
                <div class="card-body">
                    <table id="datatableid" class="table table-bordered table-dark display">
                        <thead>
                            <tr>
                                <td colspan="4">
                                    <center>
                                        <h3>Trening numer: <?php echo $id_training; ?></h3>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>
                                        <h3>Czas rozpoczęcia: <?php echo $start_date; ?></h3>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Część ciała</th>
                                <th scope="col">Typ treningu</th>
                                <th scope="col">Edytuj</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($j = 0; $j < $lenght; $j++) {        ?>
                                <tr>
                                    <td> <?php echo $tab[$j]; ?></td>
                                    <td> <?php echo $tab_body_part[$j]; ?></td>
                                    <td> <?php echo $tab_type[$j]; ?></td>
                                    <td>
                                        <form action="action_page.php" method="POST">
                                            <?php echo "<input type ='hidden' name='id' value='$tab_id[$j]' /> "; ?>
                                            <?php echo "<input type ='hidden' name='id_users' value='$id_users' /> "; ?>
                                            <?php echo "<input type ='hidden' name='body_type' value='$tab_body_part[$j]' /> "; ?>
                                            <?php echo "<input type ='hidden' name='id_training' value='$id_training' /> "; ?>
                                            <?php echo "<input type ='hidden' name='id_exercises' value='$tab_id_exercises[$j]' /> "; ?>
                                            <button type="submit" name="action_page" class="btn btn-success editbtn">Edytuj</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
            $tab = array();
            $tab_body_part = array();
            $tab_id_exercises = array();
            $tab_id = array();
            $tab_training = array();
            $tab_type = array();
        } ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.table').DataTable({
                "lengthMenu": [
                    [14, 25, 50, -1],
                    [14, 25, 50, "All"]
                ],
                "ordering": false,
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</body>


</html>