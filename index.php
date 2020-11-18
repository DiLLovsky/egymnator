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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="box" action="login.php" method="POST">

        <h1>Login</h1>
        <p class="text-muted"> Proszę podaj swój login i hasło!</p>
        <input type="text" name="login" autocomplete="off" placeholder="Login" />
        <input type="password" name="haslo" autocomplete="off" placeholder="Hasło" />
        <?php
        if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>
        <input type="submit" value="Zaloguj się" />
        <br>
        Nie masz konta? <a href="rejestracja.php"> Zarejestruj się!</a>


    </form>


</body>

</html>