<?php

$polaczenie = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($polaczenie, 'egymnator');

$fbworppl = $_POST['fbworppl'];
$difficulty = $_POST['difficulty'];
$experience = $_POST['experience'];

if (empty($fbworppl) || empty($difficulty) || empty($experience)) {
    header('Location: createtraining.php');
}


if ($fbworppl == 'fbw') {
    if ($difficulty == 'beginner') {
        if ($experience == 'easy') {
            #FBW POCZĄTKUJĄCY ŁATWY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Łatwy' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Łatwy' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND difficulty = 'Łatwy' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type ='Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Łatwy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE difficulty = 'Łatwy' AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Łatwy' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } elseif ($experience == 'medium') {
            #FBW POCZĄTKUJĄCY ŚREDNI
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } else {
            #FBW POCZĄTKUJĄCY TRUDNY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE difficulty = 'Średni' AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        }
    } elseif ($difficulty == 'intermediate') {
        if ($experience == 'easy') {
            #FBW ŚREDNIOZAAWANSOWANY ŁATWY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } elseif ($experience == 'medium') {
            #FBW ŚREDNIOZAAWANSOWANY ŚREDNI
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE difficulty = 'Średni' AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Średni' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } else {
            #FBW ŚREDNIOZAAWANSOWANY TRUDNY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') OR body_part = 'Mięsień czworoboczny grzbietu') OR body_part = 'Mięsień czworoboczny grzbietu') OR body_part = 'Mięsień czworoboczny grzbietu') AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE difficulty = 'Średni' AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        }
    } else {
        if ($experience == 'easy') {
            #FBW DOŚWIADCZONY ŁATWY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE difficulty = 'Średni' AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } elseif ($experience == 'medium') {
            #FBW DOŚWIADCZONY ŚREDNI
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        } else {
            #FBW DOŚWIADCZONY TRUDNY
            $e_legs_A = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_A_run = mysqli_query($polaczenie, $e_legs_A);

            $e_chest = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_chest_run = mysqli_query($polaczenie, $e_chest);

            $e_back = "SELECT * FROM exercises WHERE (body_part = 'Mięsień najszerszy grzbietu' OR body_part = 'Mięsień czworoboczny grzbietu') AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 2";
            $e_back_run = mysqli_query($polaczenie, $e_back);

            $e_triceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Trudny' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_triceps_run = mysqli_query($polaczenie, $e_triceps);

            $e_biceps = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Trudny' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 2";
            $e_biceps_run = mysqli_query($polaczenie, $e_biceps);

            $e_accessory = "SELECT * FROM exercises WHERE (difficulty = 'Średni' OR difficulty = 'Trudny') AND exercise_type ='Akcesoryjny' ORDER BY RAND() LIMIT 4";
            $e_accessory_run = mysqli_query($polaczenie, $e_accessory);

            $e_legs_B = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_B_run = mysqli_query($polaczenie, $e_legs_B);
        }
    }
} else {
    if ($difficulty == 'beginner') {
        if ($experience == 'easy') {
            #PPL POCZĄTKUJĄCY ŁATWY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND difficulty = 'Łatwy' AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND difficulty = 'Łatwy' AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND difficulty = 'Łatwy' AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND difficulty = 'Łatwy' AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } elseif ($experience == 'medium') {
            #PPL POCZĄTKUJĄCY ŚREDNI
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Łatwy' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Łatwy' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } else {
            #PPL POCZĄTKUJĄCY TRUDNY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        }
    } elseif ($difficulty == 'intermediate') {
        if ($experience == 'easy') {
            #PPL ŚREDNIOZAAWANSOWANY ŁATWY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Łatwy' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } elseif ($experience == 'medium') {
            #PPL ŚREDNIOZAAWANSOWANY ŚREDNI
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Średni' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Średni' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } else {
            #PPL ŚREDNIOZAAWANSOWANY TRUDNY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Akcesoryjny' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        }
    } else {
        if ($experience == 'easy') {
            #PPL ZAAWANSOWANY ŁATWY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } elseif ($experience == 'medium') {
            #PPL ZAAWANSOWANY ŚREDNI
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND difficulty = 'Trudny' AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND (exercise_type = 'Główny' OR exercise_type = 'Dodatkowy') ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND (difficulty = 'Trudny' OR difficulty = 'Średni') AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        } else {
            #PPL ZAAWANSOWANY TRUDNY
            $e_legs_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworogłowy uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PUSH_run = mysqli_query($polaczenie, $e_legs_PUSH);

            $e_chest_PUSH_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_main_run = mysqli_query($polaczenie, $e_chest_PUSH_main);

            $e_chest_PUSH_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień klatki piersiowej' AND difficulty = 'Trudny' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_chest_PUSH_additional_run = mysqli_query($polaczenie, $e_chest_PUSH_additional);

            $e_back_PULL_main = "SELECT * FROM exercises WHERE body_part = 'Mięsień czworoboczny grzbietu' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_main_run = mysqli_query($polaczenie, $e_back_PULL_main);

            $e_back_PULL_additional = "SELECT * FROM exercises WHERE body_part = 'Mięsień najszerszy grzbietu' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_back_PULL_additional_run = mysqli_query($polaczenie, $e_back_PULL_additional);

            $e_arms_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część przednia' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_arms_PUSH_run = mysqli_query($polaczenie, $e_arms_PUSH);

            $e_arms_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień naramienny - część środkowa' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_arms_PULL_run = mysqli_query($polaczenie, $e_arms_PULL);

            $e_triceps_PUSH = "SELECT * FROM exercises WHERE body_part = 'Mięsień trójgłowy ramienia' AND difficulty = 'Trudny' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_triceps_PUSH_run = mysqli_query($polaczenie, $e_triceps_PUSH);

            $e_biceps_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowy ramienia' AND difficulty = 'Trudny' AND exercise_type = 'Dodatkowy' ORDER BY RAND() LIMIT 1";
            $e_biceps_PULL_run = mysqli_query($polaczenie, $e_biceps_PULL);

            $e_legs_PULL = "SELECT * FROM exercises WHERE body_part = 'Mięsień dwugłowe uda' AND difficulty = 'Trudny' AND exercise_type = 'Główny' ORDER BY RAND() LIMIT 1";
            $e_legs_PULL_run = mysqli_query($polaczenie, $e_legs_PULL);
        }
    }
}
?>
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

?>
<?php
include("connect.php");
$id = $_SESSION['id_users'];
$sql = "SELECT avatar FROM users WHERE id_users = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$image = $row['avatar'];
$image_src = "upload/" . $image;
$id = $_SESSION['id_users'];
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge, chrome-1" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>E-Gymnator</title>
    <link rel="stylesheet" href="css/styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body>
    <?php include 'menu1.php'; ?>
    <?php if ($fbworppl == 'fbw') { ?>
        <form action="addtraining.php" method="POST">
            <div class="content">
                <div class="card">
                    <p><b>TRENING A</b><br><br>
                        Nogi:
                        <?php
                        echo "<input type ='hidden' name='id' value='$id' /> ";
                        $rows = $e_legs_A_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='legs_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Klatka piersiowa:
                        <?php
                        $rows = $e_chest_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='chest_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Plecy:
                        <?php
                        $rows = $e_back_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='back_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Triceps:
                        <?php
                        $rows = $e_triceps_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='triceps_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Biceps:
                        <?php
                        $rows = $e_biceps_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='biceps_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Akcesoryjne1:
                        <?php
                        $rows = $e_accessory_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='akce1_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Akcesoryjne2:
                        <?php
                        $rows = $e_accessory_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='akce2_A' value='$id_exercises' /><br> 
                    $name";
                        ?><br>
                    </p>
                </div>
                <div class="card">
                    <p><b>TRENING B</b><br><br>
                        Nogi:
                        <?php
                        $rows = $e_legs_B_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='legs_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Klatka piersiowa:
                        <?php
                        $rows = $e_chest_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='chest_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Plecy:
                        <?php
                        $rows = $e_back_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='back_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Triceps:
                        <?php
                        $rows = $e_triceps_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='triceps_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Biceps:
                        <?php
                        $rows = $e_biceps_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='biceps_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Akcesoryjne1:
                        <?php
                        $rows = $e_accessory_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='akce1_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Akcesoryjne2:
                        <?php
                        $rows = $e_accessory_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='akce2_B' value='$id_exercises' /><br> 
                    $name";
                        ?><br>
                    </p>
                </div>
                <div class="card">
                    <div class="info">
                        <p>Oto twój nowy plan trenigowy! Pamiętaj, że zawsze możesz go później edytować.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="info">
                        <p>W pierwszym tygodniu trening A zastosuj w poniedziałek i piątek, zaś trening B w środę. W drugim tygodniu odwróc kolejność zaczynając tydzień od treningu B.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="info">
                        <p><button type="submit" name="addtraining">Zatwierdź</button></p>
                    </div>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <form action="addtrainingPPL.php" method="POST">
            <div class="content">
                <div class="card">
                    <p><b>TRENING PUSH</b><br><br>
                        Nogi:
                        <?php
                        echo "<input type ='hidden' name='id' value='$id' /> ";
                        $rows = $e_legs_PUSH_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='legs_PUSH' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Klatka piersiowa:
                        <?php
                        $rows = $e_chest_PUSH_main_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='chest_PUSH_main' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Klata piersiowa dodatkowe:
                        <?php
                        $rows = $e_chest_PUSH_additional_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='chest_PUSH_additional' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Ramiona:
                        <?php
                        $rows = $e_arms_PUSH_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='arms_PUSH' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Triceps:
                        <?php
                        $rows = $e_triceps_PUSH_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='triceps_PUSH' value='$id_exercises' /><br> 
                    $name";
                        ?><br>
                    </p>
                </div>
                <div class="card">
                    <p><b>TRENING PULL</b><br><br>
                        Nogi:
                        <?php
                        $rows = $e_legs_PULL_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='legs_PULL' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Plecy:
                        <?php
                        $rows = $e_back_PULL_main_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='back_PULL_main' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Plecy dodatkowe:
                        <?php
                        $rows = $e_back_PULL_additional_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='back_PULL_additional' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Ramiona:
                        <?php
                        $rows = $e_arms_PULL_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='arms_PULL' value='$id_exercises' /><br> 
                    $name";
                        ?><br><br>
                        Biceps:
                        <?php
                        $rows = $e_biceps_PULL_run->fetch_assoc();
                        $id_exercises = $rows['id_exercises'];
                        $name = $rows['name'];
                        echo "<input type ='hidden' name='biceps_PULL' value='$id_exercises' /><br> 
                    $name";
                        ?><br>
                    </p>
                </div>
                <div class="card">
                    <div class="info">
                        <p>Oto twój nowy plan trenigowy! Pamiętaj, że zawsze możesz go później edytować.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="info">
                        <p>W poniedziałki i czwartki stosuj plan PUSH a we wtorek i piątek plan PULL.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="info">
                        <p><button type="submit" name="addtraining">Zatwierdź</button></p>
                    </div>
                </div>
            </div>
        </form>

    <?php } ?>
    <!-- ########################################################################################################################################################-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>

</html>