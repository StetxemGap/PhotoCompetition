<div <?php if($_SESSION['admin']): ?> class = "container"  <?php else: ?> class = "containerU" <?php endif; ?>>
        <div class = "row">
        <?php if($_SESSION['admin']): ?>
            <div class = "sidebar col-3">
                <ul>
                <li>
                        <a href="work.php">Публикации</a>
                    </li>
                    <li>
                        <a href="category.php">Категории</a>
                    </li>
                </ul>
            </div>
            <?php endif; ?>