<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <title>E-Gymnator</title>
</head>

<body>

    <?php

    echo "<p>Witaj " . $_SESSION['login'] . '![<a href="logout.php">Wyloguj się!</a>]</p>';

    echo "<p>Trener " . $_SESSION['id_users'] . '![<a href="exercises.php">Wszystkie ćwiczenia</a>]</p>';

    echo '<p>Edytuj swój profil: [<a href="profile.php">Profil</a>]</p>';

    echo "<p>id_user_status: " . $_SESSION['id_users_status'] . "</p>";

    echo '<p>Admin panel: [<a href="adminpanel.php">Profil</a>]</p>';

    $dataczas = new DateTime();

    echo $dataczas->format('Y-m-d H:i:s');



    ?>

</body>


</html>