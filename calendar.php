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
include("connect.php");
$id = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;
function build_calendar($month, $year)
{

    $id = $_SESSION['id_users'];
    $mysqli = new mysqli('localhost', 'root', '', 'egymnator');
    $stmt = $mysqli->prepare("SELECT * FROM history WHERE MONTH(date) = ? AND YEAR(date) = ? AND id_users = '$id'");
    $stmt->bind_param('ss', $month, $year);
    $trained = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $trained[] = $row['date'];
            }
        }
    }

    $daysOfWeek = array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    if ($monthName == 'January') {
        $monthName = 'Styczeń';
    } elseif ($monthName == 'February') {
        $monthName = 'Luty';
    } elseif ($monthName == 'March') {
        $monthName = 'Marzec';
    } elseif ($monthName == 'April') {
        $monthName = 'Kwiecień';
    } elseif ($monthName == 'May') {
        $monthName = 'Maj';
    } elseif ($monthName == 'June') {
        $monthName = 'Czerwiec';
    } elseif ($monthName == 'July') {
        $monthName = 'Lipiec';
    } elseif ($monthName == 'August') {
        $monthName = 'Sierpień';
    } elseif ($monthName == 'September') {
        $monthName = 'Wrzesień';
    } elseif ($monthName == 'October') {
        $monthName = 'Październik';
    } elseif ($monthName == 'November') {
        $monthName = 'Listopad';
    } else {
        $monthName = 'Grudzień';
    }

    $dayOfWeek = $dateComponents['wday'];

    if ($dayOfWeek == 0) {
        $dayOfWeek = 6;
    } else {
        $dayOfWeek = $dayOfWeek - 1;
    }

    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";

    $calendar .= "<a class='btn btn-s btn-warning' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>< Poprzedni miesiąc</a> ";

    $calendar .= " <a class='btn btn-s btn-warning' href='?month=" . date('m') . "&year=" . date('Y') . "'>Obecny miesiąc</a> ";

    $calendar .= "<a class='btn btn-s btn-warning' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Następny miesiąc ></a></center><br>";

    $calendar .= "<tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }

    $currentDay = 1;

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td  class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        // Seventh column (Saturday) reached. Start a new row.

        if ($dayOfWeek == 7) {

            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";

        if (in_array($date, $trained)) {
            $calendar .= "<td class='$today'><h1>$currentDay</h1> <button class='btn btn-success btn-sm'>Trening wykonany</button>";
        } else {
            $calendar .= "<td><h1>$currentDay</h1> <a href='trained.php?date=" . $date . "' class='btn btn-warning btn-sm'>Trening</a>";
        }


        $calendar .= "</td>";
        // Increment counters

        $currentDay++;
        $dayOfWeek++;
    }


    if ($dayOfWeek != 7) {

        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr>";

    $calendar .= "</table>";

    echo $calendar;
}

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleprofilecalendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <?php include 'menu1.php'; ?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>

    </div>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('.nav_btn').click(function() {
            $('.mobile_nav_items').toggleClass('active');
        });
    });
</script>

</html>