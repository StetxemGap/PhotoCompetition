<?php
    include "../php/posts.php";
    //include ("../php/authorization.php"); 
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
                <h2>Управление категориями</h2>
                <div class = "col-1">ID</div>
                <div class = "col-2">Название</div>
                <div class = "col-3">Срок</div>
                <div class = "col-2">Изменить</div>
                <div class = "col-2">Удалить</div>
            </div>
            <div class = shit>
                <?php foreach ($cats as $key => $cat): ?>
            <div class = "row post">
                <div class = "id col-1"><?=$cat[0]; ?></div>
                <div class="title col-2"><?=$cat[1]; ?></div>
                <div class = "date col-3"><?=$cat[2]; ?></div>
                <div class = "red col-2"><a href="editC.php?id=<?=$cat[0]; ?>">edit</a></div>
                <div class = "del col-2"><a href="edit.php?deleteC_id=<?=$cat[0]; ?>">delete</a></div>
            </div>
            <?php endforeach; ?>
            </div>
            <div class = "button-cr row">
                <a href="createC.php" class = "col-3 btn btn-primary">Добавить</a>
                <span class="col-1"></span>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>