<?php

session_start();

if (isset($_POST['email'])) {
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

    //Sprawdź poprawność hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //Czy zaakceptowano regulamin?
    if (!isset($_POST['regulamin'])) {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwiedź akceptacje regulaminu!";
    }

    //Bot or not
    $sekret = "6Lcdy9wZAAAAAGDlC4WkNgRfK7-WP_hcz3Y9mMtO";

    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $sekret . '&response=' . $_POST['g-recaptcha-response']);
    $odpowiedz = json_decode($sprawdz);
    if ($odpowiedz->success == false) {
        $wszystko_OK = false;
        $_SESSION['e_bot'] = "Potwiedź, że nie jesteś BOTem";
    }

    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_login'] = $login;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;


    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //czy email juz istnieje?
            $rezultat = $polaczenie->query("SELECT id_users FROM users WHERE email='$email'");
            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto z tym kontem email";
            }

            //czy login juz istnieje?
            $rezultat = $polaczenie->query("SELECT id_users FROM users WHERE login='$login'");
            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_loginow = $rezultat->num_rows;
            if ($ile_takich_loginow > 0) {
                $wszystko_OK = false;
                $_SESSION['e_login'] = "Istnieje już użytkownik o takim loginie";
            }

            if ($wszystko_OK == true) {
                //Zaliczone, dodajemy użytkownika do bazy danych
                if ($polaczenie->query("INSERT INTO users (`id_users`, `login`, `pass`, `email`, `id_users_status`) VALUES (NULL, '$login','$haslo_hash', '$email', '3')")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: witamy.php');
                } else {
                    throw new Exception($polaczenie->error);
                }
            }


            $polaczenie->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym treminie!</span>';
        echo '<br /> Informacja developerska: ' . $e;
    }
}

?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator - załóż darmowe konto</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </script>

    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="box" method="POST">

                        <input type="text" autocomplete="off" value="<?php
                                                                        if (isset($_SESSION['fr_login'])) {
                                                                            echo $_SESSION['fr_login'];
                                                                            unset($_SESSION['fr_login']);
                                                                        }
                                                                        ?>" name="login" placeholder="Login" />

                        <?php

                        if (isset($_SESSION['e_login'])) {
                            echo '<div class="error">' . $_SESSION['e_login'] . '</div>';
                            unset($_SESSION['e_login']);
                        }

                        ?>

                        <input type="text" autocomplete="off" value="<?php
                                                                        if (isset($_SESSION['fr_email'])) {
                                                                            echo $_SESSION['fr_email'];
                                                                            unset($_SESSION['fr_email']);
                                                                        }
                                                                        ?>" name="email" placeholder="E-Mail" />

                        <?php

                        if (isset($_SESSION['e_email'])) {
                            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                            unset($_SESSION['e_email']);
                        }

                        ?>

                        <input type="password" autocomplete="off" value="<?php
                                                                            if (isset($_SESSION['fr_haslo1'])) {
                                                                                echo $_SESSION['fr_haslo1'];
                                                                                unset($_SESSION['fr_haslo1']);
                                                                            }
                                                                            ?>" name="haslo1" placeholder="Hasło" />

                        <?php

                        if (isset($_SESSION['e_haslo'])) {
                            echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
                            unset($_SESSION['e_haslo']);
                        }

                        ?>

                        <input type="password" autocomplete="off" value="<?php
                                                                            if (isset($_SESSION['fr_haslo2'])) {
                                                                                echo $_SESSION['fr_haslo2'];
                                                                                unset($_SESSION['fr_haslo2']);
                                                                            }
                                                                            ?>" name="haslo2" placeholder="Powtórz hasło" />

                        <label class="label">
                            <input type="checkbox" class="checkmark" name="regulamin" <?php
                                                                                        if (isset($_SESSION['fr_regulamin'])) {
                                                                                            echo "checked";
                                                                                            unset($_SESSION['fr_regulamin']);
                                                                                        }

                                                                                        ?> />
                            <div class="reg">Akeceptuje regulamin</div>
                        </label>

                        <?php

                        if (isset($_SESSION['e_regulamin'])) {
                            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
                            unset($_SESSION['e_regulamin']);
                        }

                        ?>
                        <div class="g-recaptcha" data-sitekey="6Lcdy9wZAAAAADd_TKIx4m4dN_Iw1VmUNejXlGLO"></div>
                        <?php

                        if (isset($_SESSION['e_bot'])) {
                            echo '<div class="error">' . $_SESSION['e_bot'] . '</div>';
                            unset($_SESSION['e_bot']);
                        }

                        ?>

                        <input type="submit" value="Zarejestruj się!">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>