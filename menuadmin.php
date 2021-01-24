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
        <a href="adminpanel.php"><i class="fas fa-exchange-alt"></i></i><span>Trener/Klient</span></a>

    </div>
</div>

<div class="sidebar">
    <div class="profile_info">
        <img src='<?php echo $image_src;  ?>' class="profile_image" alt="">
        <h4><?php echo $_SESSION['login'] ?></h4>
    </div>
    <a href="adminpanel.php"><i class="fas fa-exchange-alt"></i></i><span>Trener/Klient</span></a>
</div>