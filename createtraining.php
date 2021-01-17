<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="css/nice-select.css">
    <title>E-Gymnator</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/button.js"></script>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <form action="training.php" method="POST">
        <div class="box">
            <h2>Stwórz swoj plan treningowy</h2>
            <select name="fbworppl" class="select-css">
                <option disabled selected>Jaki chcesz trening?</option>
                <option value="fbw">Trzydniowy - Full Body Workout</option>
                <option value="ppl">Czterodniowy - Push Pull Legs Workout</option>
            </select>

            <select name="difficulty" class="select-css">
                <option disabled selected>Jak jesteś doświadczony?</option>
                <option value="beginner">Początkujący</option>
                <option value="intermediate">Średniozaawansowany</option>
                <option value="advanced">Zaawansowany</option>
            </select>

            <select name="experience" class="select-css">
                <option disabled selected>Jak ciężko chcesz ćwiczyć?</option>
                <option value="easy">Lekko</option>
                <option value="medium">Średnio</option>
                <option value="hard">Ciężko</option>
            </select>
            <button type="submit" class="btn-liquid">
                <span class="inner">Stwórz plan</span>
            </button>
        </div>
    </form>
</body>

</html>