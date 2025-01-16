<?php
    include "../php/posts.php";
    //include ("../php/authorization.php"); 
    $today = date('Y-m-d');
    $count = 5;
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
            <?php if($_SESSION['admin']): ?>
                <div class = "button row">
                    <a href="work.php" class = "col-3 btn btn-primary">Назад</a>
                    <span class="col-1"></span>
                </div>
                <?php else: ?> 
                <div class = "button row">
                    <a href="index.php" class = "col-3 btn btn-primary">Назад</a>
                    <span class="col-1"></span>
                </div>
                <?php endif; ?>
                <div class = "row title-table">
                    <h2>Добавление фотографии</h2>
                    <p><?=$errMsg?></p>
                </div>
                <div class="shit">
                <div class = "row add-post">
                    <form action="create.php" method="post" enctype="multipath/form-data">
                        <div class="col mb-4">
                            <input name="title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>
                        <div class="input-group сol mb-4 mt-4">
                            <div class="row col-5"> 
                            <input name="img[]" type="file" class="formcontrol" id="inputGroupFile02">
                            <input name="img[]" type="file" class="formcontrol mt-2" id="inputGroupFile02">
                            <input name="img[]" type="file" class="formcontrol mt-2" id="inputGroupFile02">
                            </div>
                            <select name="category" id="form-select" aria-label="Default select example" class="select-cat">
                            <?php foreach ($cats as $key => $cat): if ($cat[2] > $today) {?>
                                <option value="<?=$cat[0]; ?>"><?=$cat[1]; ?></option>
                            <?php } endforeach; ?>
                            </select>
                        </div>
                        <div class="col mb-4">
                            <button name="add_photo" class="btn btn-primary" type="submit">Сохранить</button>
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