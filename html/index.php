<?php include ("../php/authorization.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>PhotoBattle</title>
    <link rel=”icon” href=”favicon.ico” type=”image/x-icon”>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main_style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>

<body>
<?php include ("nav.php"); ?>

    <div class="info-container">
      <div class="item col">
        <div class="info col-4"><h2>Приветствуем тебя, путник!</h2>
        <p>Мы приглашаем тебя стать судьей в великом турнире фотографии и отдать свой голос за самых достойных мастеров объектива. Твой голос будет подобен удару меча, который определит судьбу этих отважных фотографов. Каждый голос имеет значение, ведь он может привести победителя к вершине пьедестала почета.</p></div>
        <div class="image col-7"><span><a 
        <?php if(isset($_SESSION['id'])): ?>
        href="active.php"
        <?php else: ?>
        href="author.php"
        <?php endif; ?>
        ><button>Хочу голосовать!</button></a></span><img src="../img/8401.jpg" class="w-100" alt=""></div>
      </div>
      <div class="item col">
        <div class="info col-4"><h2>Если же ты опытный искатель приключений...</h2>
        <p>...то ты несомненно захочешь принять участие! Кликай на кнопку справа и нацеливай свой объектив, потому что мы объявляем наш сайт открытым! Пусть ваши навыки ориентирования и фоторедактирования будут на высоте, ведь мы вознаградим (похвалой) тех, кто отправит нам поистине шедевры.</p></div>
        <div class="image col-7"><span><a 
        <?php if(isset($_SESSION['id'])): ?>
          href="create.php"
        <?php else: ?>
          href="author.php"
        <?php endif; ?>
        ><button>Хочу участвовать!</button></a></span><img src="../img/Happy travel photographer taking picture of nature.jpg" class="w-100" alt=""></div>
      </div>
    </div>
</body>

</html>