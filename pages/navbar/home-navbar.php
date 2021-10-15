<?php
    GLOBAL $general_path;
    GLOBAL $page_index;
?>
<nav background="#fff">
    <a href="#" class="title">
        <img src="repository/images/logo2.png">
    </a>
    <div class="menu">
        <a href="student-home.php" class="item <?php echo condition($page_index, 1, 'active') ?>">HOME</a>
        <a href="student-profile.php" class="item <?php echo condition($page_index, 2, 'active') ?>">PROFILE</a>
        <a href="sign-out.php" class="item <?php echo condition($page_index, 3, 'active') ?>">SIGN OUT</a>
    </div>
</nav>