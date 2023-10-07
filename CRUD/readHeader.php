<?php session_start(); error_reporting(0);?>
<section class="table_header">
    <nav class="nav-bar">
        <div class="logo">
            <a></a>
        </div>
        <div class="nav-list">
            <ul>
            <?php if (empty($_SESSION['user'])): ?>
                <li class="nav-item"><a onclick="openModal('feedbackModal')">Обратная связь</a></li>
                <li class="nav-item"><a href="config/export.php" class="nav-link">Экспорт</a></li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="mobile-menu-icon">
        <?php if (empty($_SESSION['user'])): ?>
            <a onclick="openModal('authModal')" class="mobile-menu-icon exit"><i class='bx bx-log-in bx-sm'></i></a>
            <a onclick="menuShow()"><img class="icon" src="img/menu.png" alt="Menu"></a>
        <?php else: ?>
            <a onclick="logout()" class="mobile-menu-icon exit"><i class='bx bx-log-out bx-sm'></i></a>
            <a onclick="menuShow()"><img class="icon" src="img/menu.png" alt="Menu"></a>
        <?php endif; ?>
        </div>
    </nav>
    <div class="mobile-menu">
        <ul>
        <?php if (empty($_SESSION['user'])): ?>
            <li class="nav-item"><a onclick="openModal('feedbackModal')">Обратная связь</a></li>
            <li class="nav-item"><a href="config/export.php" class="nav-link">Экспорт</a></li>
            <a onclick="openModal('authModal')" class="mobile-menu-icon exit"><i class='bx bx-log-in bx-sm'></i></a>
        <?php else: ?>
            <li class="nav-item"><a onclick="logout()" class="nav-link"><i class='bx bx-log-out bx-sm'></i></a></li>
        <?php endif; ?>
        </ul>
    </div>
</section>