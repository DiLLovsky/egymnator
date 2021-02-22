<input type="checkbox" id="check">
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>E-<span>Gymnator</span></h3>
    </div>
    <div class="right_area">
        <a href="logout.php" class="logout_btn">Wyloguj się</a>
    </div>
</header>

<div class="mobile_nav">
    <div class="nav_bar">
        <img src='<?php echo $image_src;  ?>' class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="createtraining.php"><i class="fas fa-desktop"></i><span>Stwórz plan</span></a>
        <?php if ($asd == '2') { ?>
            <a href="exercises.php"><i class="fas fa-plus"></i><span>Dodaj ćwiczenia</span></a>
        <?php } else { ?>
            <a href="allexercises.php"><i class="fas fa-eye"></i></i><span>Ćwiczenia</span></a>
        <?php
        }
        ?>
        <a href="mytraining.php"><i class="fas fa-dumbbell"></i><span>Moje treningi</span></a>
        <a href="bmi.php"><i class="fas fa-weight"></i><span>Oblicz BMI i BMR</span></a>
        <a href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Kalendarz</span></a>
        <a href="profile.php"><i class="far fa-user"></i><span>Edytuj profil</span></a>
    </div>
</div>

<div class="sidebar">
    <div class="profile_info">
        <img src='<?php echo $image_src;  ?>' class="profile_image" alt="">
        <h4><?php echo $_SESSION['login'] ?></h4>
    </div>
    <a href="dashboard.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
    <a href="createtraining.php"><i class="fas fa-desktop"></i><span>Stwórz plan</span></a>
    <?php if ($asd == '2') { ?>
        <a href="exercises.php"><i class="fas fa-plus"></i><span>Dodaj ćwiczenia</span></a>
    <?php } else { ?>
        <a href="allexercises.php"><i class="fas fa-eye"></i></i><span>Ćwiczenia</span></a>
    <?php
    }
    ?>
    <a href="mytraining.php"><i class="fas fa-dumbbell"></i><span>Moje treningi</span></a>
    <a href="bmi.php"><i class="fas fa-weight"></i><span>Oblicz BMI i BMR</span></a>
    <a href="calendar.php"><i class="fas fa-calendar-alt"></i><span>Kalendarz</span></a>
    <a href="profile.php"><i class="far fa-user"></i><span>Edytuj profil</span></a>
</div>