<div class="header col">
        <div class="header-logo col-2">
            <a href="index.php">
            <div class="col-1 mt-4"><img src="../img/icons8-камера-64.png" alt=""></div>
            <div class="name-of col-1 mt-3"><h1>Photo</h1><h2>Battle</h2></div>
            </a>
        </div>
        <div class="some-butt mt-4">
        <?php if(isset($_SESSION['id'])): ?>
            <div class="butt"><a href="archive.php">Галерея</a></div>
            <div class="butt"><a href="active.php">Голосование</a></div>
            <?php if($_SESSION['admin']): ?>
            <div class="butt"><a href="work.php">Админ-панель</a></div>
            <?php endif; ?>
            <div class="butt"><a href="logout.php">Выход</a></div>
        <?php else: ?>
            <div class="butt"><a href="archive.php">Галерея</a></div>
            <div class="butt"><a href="active.php">Голосование</a></div>
            <div class="butt"><a href="author.php">Вход</a></div>
        <?php endif; ?>
        </div>
    </div>