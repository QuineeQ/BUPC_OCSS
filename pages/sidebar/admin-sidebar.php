<?php
    GLOBAL $general_path;
    GLOBAL $page_index;
?>
<div class="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo $general_path ?>repository/images/logo3.png" class="big-screen">
        <img src="<?php echo $general_path ?>repository/images/logo.png" class="small-screen">
    </div>
    <div class="sidebar-body">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item <?php echo condition($page_index, 1, 'active') ?>">
                <a href="admin-dashboard.php"><i class="    fas fa-home sidebar-icon"></i><span>Home</span></a>
            </li>
            <li class="sidebar-menu-item <?php echo condition($page_index, 2, 'active') ?>">
                <a href="admin-surveys.php"><i class="fas fa-poll sidebar-icon"></i><span>Surveys</span></a>
            </li>
            <li class="sidebar-menu-item <?php echo condition($page_index, 3, 'active') ?>">
                <a href="admin-setup-survey.php"><i class="fas fa-cogs sidebar-icon"></i><span>Setup Survey</span></a>
            </li>
        </ul>
        <br>
        <br>
        <ul class="sidebar-menu dedicated-sign-out">
            <li class="sidebar-menu-item">
                <a href="sign-out.php"><i class="fas fa-power-off sidebar-icon"></i><span>Sign Out</span></a>
            </li>
        </ul>
    </div>
</div>
<div class="topbar">
    <a type="button" class="toggler"><i class="fas fa-bars" class="toggler"></i></a>
    <a href="sign-out.php" class="sign-out"><i class="fas fa-power-off mr-3"></i>Sign Out</a>
</div>
