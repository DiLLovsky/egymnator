<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: dashboard.php');
    exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator</title>
</head>

<body>

    <a href="rejestracja.php"> Rejestracja - załóż darmowe konto!</a>
    <br /><br />
    <form action="login.php" method="POST">

        Login: <br /> <input type="text" name="login" /> <br />
        Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
        <input type="submit" value="Zaloguj się" />

    </form>

    <?php
    if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
    ?>

</body>

</html>