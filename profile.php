<?php

session_start();

if (isset($_POST['login'])) {
    //Udana walidacja? Załóżmy, że tak
    $wszystko_OK = true;

    //Sprawdzenie poprwaności login'u
    $login = $_POST['login'];

    //sprawdzenie długości loginu
    if ((strlen($login) < 3) || (strlen($login) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_login'] = "Login musi posiadać od 3 do 20 znaków";
    }

    if (ctype_alnum($login) == false) {
        $wszystko_OK = false;
        $_SESSION['e_login'] = "Login może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    //sprawdz poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail";
    }

    //sprawdzenie długości imienia
    $name = $_POST['name'];
    if ((strlen($name) < 3) || (strlen($name) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_name'] = "Imię musi posiadać od 3 do 20 znaków";
    }

    if (ctype_alnum($name) == false) {
        $wszystko_OK = false;
        $_SESSION['e_name'] = "Imię może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    //sprawdzenie długości nazwiska
    $surname = $_POST['surname'];
    if ((strlen($surname) < 3) || (strlen($surname) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_surname'] = "Nazwisko musi posiadać od 3 do 20 znaków";
    }

    if (ctype_alnum($surname) == false) {
        $wszystko_OK = false;
        $_SESSION['e_surname'] = "Nazwisko może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    //sprawdzenie długości wieku
    $age = $_POST['age'];
    if ((strlen($age) < 1) || (strlen($age) > 3)) {
        $wszystko_OK = false;
        $_SESSION['e_age'] = "Wiek musi posiadać od 1 do 3 znaków";
    }

    if (ctype_digit($age) == false) {
        $wszystko_OK = false;
        $_SESSION['e_age'] = "Wiek może składać się tylko cyfr";
    }

    //sprawdzenie długości wzrostu
    $height = $_POST['height'];
    if ((strlen($height) < 2) || (strlen($height) > 3)) {
        $wszystko_OK = false;
        $_SESSION['e_height'] = "Wiek musi posiadać od 2 do 3 znaków";
    }

    if (ctype_digit($height) == false) {
        $wszystko_OK = false;
        $_SESSION['e_height'] = "Wiek może składać się tylko cyfr";
    }

    //sprawdzenie długości wagi
    $weight = $_POST['weight'];
    if ((strlen($weight) < 2) || (strlen($weight) > 3)) {
        $wszystko_OK = false;
        $_SESSION['e_weight'] = "Waga musi posiadać od 2 do 3 znaków";
    }

    if (ctype_digit($weight) == false) {
        $wszystko_OK = false;
        $_SESSION['e_weight'] = "Waga może składać się tylko cyfr";
    }

    $id_users = $_SESSION['id_users'];

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            if ($wszystko_OK == true) {
                //Aktuliazacja danych użytkownika.
                if ($polaczenie->query("UPDATE users SET login = '$login', email = '$email', name = '$name', surname = '$surname', age = '$age', height = '$height', weight = '$weight' WHERE id_users = '$id_users'")) {
                    $_SESSION['udanaedycjaprofilu'] = true;
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['surname'] = $_POST['surname'];
                    $_SESSION['age'] = $_POST['age'];
                    $_SESSION['height'] = $_POST['height'];
                    $_SESSION['weight'] = $_POST['weight'];

                    header('Location: profile.php');
                } else {
                    throw new Exception($polaczenie->error);
                }
            }

            $polaczenie->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red">Błąd serwera!</span>';
        echo '<br /> Informacja developerska: ' . $e;
    }
}

?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator - Edycja profilu</title>
    </script>

    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    echo "<p>Witaj " . $_SESSION['login'] . '![<a href="logout.php">Wyloguj się!</a>]</p>';

    echo "<p>id_users: " . $_SESSION['id_users'] . '![<a href="logout.php">Wyloguj się!</a>]</p>';

    echo "<p>id_users_status: " . $_SESSION['id_users_status'] . '![<a href="dashboard.php">Wróc na dashboard</a>]</p>';
    ?>

    <form method="POST">
        Login: <br /> <input type="text" value="<?php echo $_SESSION['login']; ?>" name="login" /> <br />
        <?php

        if (isset($_SESSION['e_login'])) {
            echo '<div class="error">' . $_SESSION['e_login'] . '</div>';
            unset($_SESSION['e_login']);
        }

        ?><br />
        E-Mail: <br /> <input type="text" value="<?php echo $_SESSION['email']; ?>" name="email" /> <br />
        <?php

        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
            unset($_SESSION['e_email']);
        }

        ?><br />
        Imię: <br /> <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name" /> <br />
        <?php

        if (isset($_SESSION['e_name'])) {
            echo '<div class="error">' . $_SESSION['e_name'] . '</div>';
            unset($_SESSION['e_name']);
        }

        ?><br />
        Nazwisko: <br /> <input type="text" value="<?php echo $_SESSION['surname']; ?>" name="surname" /> <br />
        <?php

        if (isset($_SESSION['e_surname'])) {
            echo '<div class="error">' . $_SESSION['e_surname'] . '</div>';
            unset($_SESSION['e_surname']);
        }

        ?><br />
        Wiek: <br /> <input type="text" value="<?php echo $_SESSION['age']; ?>" name="age" /> <br />
        <?php

        if (isset($_SESSION['e_age'])) {
            echo '<div class="error">' . $_SESSION['e_age'] . '</div>';
            unset($_SESSION['e_age']);
        }

        ?><br />
        Wzrost: <br /> <input type="text" value="<?php echo $_SESSION['height']; ?>" name="height" /> <br />
        <?php

        if (isset($_SESSION['e_height'])) {
            echo '<div class="error">' . $_SESSION['e_height'] . '</div>';
            unset($_SESSION['e_height']);
        }

        ?><br />
        Waga: <br /> <input type="text" value="<?php echo $_SESSION['weight']; ?>" name="weight" /> <br />
        <?php

        if (isset($_SESSION['e_weight'])) {
            echo '<div class="error">' . $_SESSION['e_weight'] . '</div>';
            unset($_SESSION['e_weight']);
        }

        ?><br />
        <input type="submit" name="update" value="Akutalizuj" />


    </form>
    <?php
    if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
    ?>
    <br>

    <?php
    include("connect.php");

    if (isset($_POST['but_upload'])) {

        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            $id = $_SESSION['id_users'];
            // Insert record
            $query = "UPDATE users SET avatar = '$name' WHERE id_users = '$id'";
            mysqli_query($con, $query);

            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
        }
    }
    ?>

    <?php
    $id = $_SESSION['id_users'];
    $sql = "SELECT avatar FROM users WHERE id_users = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $image = $row['avatar'];
    $image_src = "upload/" . $image;

    ?>

    <img src='<?php echo $image_src;  ?>'>

    <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Save name' name='but_upload'>
    </form>


</body>

</html>