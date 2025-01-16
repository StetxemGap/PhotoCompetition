<?php
    include "../php/posts.php";
    //include ("../php/authorization.php"); 
    $today = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>PhotoBattle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css" />
    <link rel="stylesheet" href="../css/main_style.css" />
</head>
<body>
   <?php include ("nav.php"); ?>
   <?php include ("sidebar.php"); ?>
            
            <div class = "posts col-9">

                <div class = "row title-table">
                    <h2>Управление публикациями</h2>
                    <div class = "col-1">ID</div>
                    <div class = "col-1">ID_U</div>
                    <div class = "col-2">Название</div>
                    <div class = "col-2">Категория</div>
                    <div class = "col-3">Изображение</div>
                    <div class = "col-2">Изменить</div>
                    <div class = "col-1">Удалить</div>
                </div>
                <div class = shit>
                    <?php foreach ($postsUname as $key => $postU):
                        $postCatName = selectOneforNameCat('photos', 'category', $postU[0]);
                        $cat = selectOneC(['id' => $postU[5]]);
                        $photos = selectALLforIMG($postU[0]);
                        if($cat[2] > $today) { ?>
                <div class = "row post">
                    <div class = "id col-1"><?=$postU[0]; ?></div>
                    <div class = "id_user col-1"><?=$postU[6]; ?></div>
                    <div class="title col-2"><?=$postU[2]; ?></div>
                    <div class="category col-2"><?=$postCatName[6]; ?></div>
                    <div class="image-container col-3">
                    <?php foreach ($photos as $photo) : ?>
                        <img src="../img/<?=$photo[2]; ?>" alt="<?=$photo[2]; ?>" width=100%>
                    <?php endforeach; ?>
                    </div>
                    <div class = "red col-2">
                    <?php if ($postU[3] == 0): ?>
                    <a href="edit.php?id_pub=<?=$postU[0]; ?>">
                        publish
                    <?php else: ?>
                    <a href="edit.php?id_unpub=<?=$postU[0]; ?>">
                        non-publish
                    <?php endif; ?>
                    </a></div>
                    <div class = "del col-1"><a href="edit.php?delete_id=<?=$postU[0]; ?>">delete</a></div>
                </div>
                <?php } endforeach; ?>
                </div>
                <div class = "button-cr row">
                    <a href="create.php" class = "col-3 btn btn-primary">Добавить</a>
                    <span class="col-1"></span>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>