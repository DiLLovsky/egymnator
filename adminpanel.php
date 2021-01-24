<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$asd = $_SESSION['id_users_status'];
if ($asd == '3' || $asd == '2') {
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

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styleprofile1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <?php include 'menuadmin.php'; ?>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <table id="datatableid" class="table table-bordered table-dark display">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Login</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Wiek</th>
                            <th scope="col">Wzrost</th>
                            <th scope="col">Waga</th>
                            <th scope="col">Typ użytkownika</th>
                            <th scope="col">Trener</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "connect.php";
                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

                        $query = "SELECT * FROM users WHERE NOT (login = 'admin')";
                        $query_run = mysqli_query($polaczenie, $query);

                        if ($query_run) {
                            foreach ($query_run as $row) {
                        ?>
                                <tr>
                                    <td> <?php echo $row['id_users']; ?></td>
                                    <td> <?php echo $row['login']; ?></td>
                                    <td> <?php echo $row['email']; ?></td>
                                    <td> <?php echo $row['name']; ?></td>
                                    <td> <?php echo $row['surname']; ?></td>
                                    <td> <?php echo $row['age']; ?></td>
                                    <td> <?php echo $row['height']; ?></td>
                                    <td> <?php echo $row['weight']; ?></td>
                                    <td> <?php if ($row['id_users_status'] == '2') {
                                                echo 'Trener';
                                            } else {
                                                echo 'Klient';
                                            } ?></td>
                                    <td>
                                        <?php
                                        if ($row['id_users_status'] == '2') {
                                        ?>
                                            <button type="sumbit" class="btn btn-warning makeclientbtn">Klient</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="submit" class="btn btn-success maketrenerbtn">Trener</button>
                                        <?php
                                        }
                                        ?>
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

        <!-- Trener -> Client Modal -->
        <div class="modal fade" id="makeclientmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Trener -> Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="updateclientstatus.php" method="POST">
                        <div class="modal-body ">
                            <input type="hidden" name="updateclient_id" id="updateclient_id">
                            <h4>Na pewno chcesz zmienić tego użytkownika na klineta?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                            <button type="submit" name="makeclient" class="btn btn-primary">Tak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ########################################################################################################################################################-->

        <!-- Client -> Trener Modal -->
        <div class="modal fade" id="maketrenermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client -> Trener</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="updateclientstatus.php" method="POST">
                        <div class="modal-body ">
                            <input type="hidden" name="updatetrener_id" id="updatetrener_id">
                            <h4>Na pewno chcesz zmienić tego użytkownika na trenera?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                            <button type="submit" name="maketrener" class="btn btn-primary">Tak</button>
                        </div>
                    </form>
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
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Szukaj użytkownika",
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
            $('.makeclientbtn').on('click', function() {
                $('#makeclientmodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#updateclient_id').val(data[0]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.maketrenerbtn').on('click', function() {
                $('#maketrenermodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#updatetrener_id').val(data[0]);
            });
        });
    </script>
</body>

</html>