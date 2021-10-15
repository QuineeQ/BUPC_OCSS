<?php
    GLOBAL $page_index;
?>
<nav background="#fff">
    <a href="#" class="title">
        <img src="repository/images/logo3.png">
    </a>
    <div class="menu">
        <a href="index.php" class="item <?php echo condition($page_index, 1, 'active') ?>">SURVEY</a>
    </div>
</nav>