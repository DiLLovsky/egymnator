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
$id_users = $_SESSION['id_users'];
include("connect.php");
$id = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id_users'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;


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
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="css/nice-select.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/styleprofilecalendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins';
            background: #fff;
        }

        .text-center {
            color: #7a00aa;
            font-weight: 900;
        }

        .left_area {
            margin-bottom: -15px;
        }

        .left_area h3 {
            margin-top: 5px;
        }

        .logout_btn {
            margin-top: -14px;
        }

        label #sidebar_btn {
            margin-top: 15px;
        }

        hr {
            border: 3px solid #fdb827;
            border-radius: 5px;
        }

        .btn-primary {
            margin-top: 30px;
            padding: 10px;
            width: 100%;
            font-size: 24px;
            border-radius: 50px;
            background-color: #fdb827;
        }

        .btn-primary:hover {
            background-color: #7a00aa;
        }
    </style>
</head>

<body>
    <?php include 'menu1.php'; ?>

    <div class="content">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>
</body>

</html>