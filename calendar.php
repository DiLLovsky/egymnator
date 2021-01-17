<?php

function build_calendar($month, $year)
{
    session_start();
    $id_users = $_SESSION['id_users'];
    $mysqli = new mysqli('localhost', 'root', '', 'egymnator');
    $stmt = $mysqli->prepare("SELECT * FROM history WHERE MONTH(date) = ? AND YEAR(date) = ? AND id_users = '$id_users'");
    $stmt->bind_param('ss', $month, $year);
    $trained = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $trained[] = $row['date'];
            }

            $stmt->close();
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

    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>< Poprzedni miesiąc</a> ";

    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Obecny miesiąc</a> ";

    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Następny miesiąc ></a></center><br>";

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
    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;

            }



            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Poniedziałek";
            }

            td:nth-of-type(2):before {
                content: "Wtorek";
            }

            td:nth-of-type(3):before {
                content: "Środa";
            }

            td:nth-of-type(4):before {
                content: "Czwartek";
            }

            td:nth-of-type(5):before {
                content: "Piątek";
            }

            td:nth-of-type(6):before {
                content: "Sobota";
            }

            td:nth-of-type(7):before {
                content: "Niedziela";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }

            td {
                width: 33%;
            }
        }

        .row {
            margin-top: 20px;
        }

        .today {
            background: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
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

</html>