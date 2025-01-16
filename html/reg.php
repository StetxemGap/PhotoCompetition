<?php include ("../php/controls.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>PhotoBattle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main_style.css" />
    <link rel="stylesheet" href="../css/reg.css" />
</head>
<body>
<?php include("nav.php"); ?>

    <div class="container">
        <form class="reg" actions="reg.php" method="POST">
             <h2>Регистрация</h2>
             <div class="mb-3">
                 <p><?=$errorMsg?></p>
             </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите вашу почту...">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Логин</label>
                 <input type="text" name ="login" class="form-control" id="exampleInputLogin" placeholder="придумайте логин...">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="придумайте пароль...">
            </div>
            <div class="click col">
            <button type="submit" name="butt-reg" class="btn btn-primary col-4">Зарегистрироваться</button>
            <div class="col-10">Уже зарегистрированы? <a href="author.php">Войти</a></div>
            </div>
        </form>
    </div><!-- /.container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>