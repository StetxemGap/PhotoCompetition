<?php
    include "../php/posts.php";
    //include ("../php/authorization.php"); ?>


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
                <div class = "button row">
                    <a href="category.php" class = "col-3 btn btn-primary">Назад</a>
                    <span class="col-1"></span>
                </div>

                <div class = "row title-table">
                    <h2>Изменение категории</h2>
                    <p><?=$errMsg?></p>
                </div>
                <div class="shit">
                <div class = "row add-post">
                    <form action="editC.php" method="post" enctype="multipath/form-data">
                    <input type="hidden" name="id" value="<?=$id; ?>">
                        <div class="col mb-4">
                            <input value="<?=$post[1]; ?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>
                        <label for="date_end">Дата окончания конкурса: </label>
                        <input type="date" id="date_end" name="date" value="<?=$post[2]; ?>"/>
                        <div class="col mt-4">
                            <button name="edit_cat" class="btn btn-primary" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="../js/script.js"></script>
</body>
</html>