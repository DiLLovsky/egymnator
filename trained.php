<?php
session_start();

$id_users = $_SESSION['id_users'];

if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

if (isset($_POST['submit'])) {
    $id_training = $_POST['training'];
    $mysqli = new mysqli('localhost', 'root', '', 'egymnator');
    $stmt = $mysqli->prepare("INSERT INTO history (id_users, id_training, date) VALUES (?,?,?)");
    $stmt->bind_param('sss', $id_users, $id_training, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Trening został wykonany!</div>";
    $stmt->close();
    $mysqli->close();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="css/nice-select.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style>
        body {
            font-family: 'Poppins';
            background: #fff;
        }

        .box {
            width: 100%;
        }

        .btn-primary {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            font-size: 24px;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Trening z dnia: <?php echo date('d-m-Y', strtotime($date)); ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo isset($msg) ? $msg : ''; ?>
                <form action="" method="post" autocomplete="off">
                    <center>
                        <select name="training" class="select-css">
                            <option disabled selected>Wybierz jaki trening został wykonany:</option>

                            <?php
                            require_once "connect.php";
                            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

                            $sql = "SELECT id_training FROM training WHERE id_users = '$id_users'";
                            $result = mysqli_query($polaczenie, $sql);
                            while ($rows = $result->fetch_assoc()) {
                                $id_training = $rows['id_training'];
                                echo "<option value = '$id_training'>$id_training</option>";
                            }
                            ?>
                        </select>
                    </center>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-primary" type="submit" name="submit">Wykonałem trening</button>
        </div>
        </form>
    </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>