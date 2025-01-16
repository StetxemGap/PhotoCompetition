<?php //include ("../php/authorization.php"); 
include "../php/posts.php";  
$today = date('Y-m-d');?>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style media="screen">
    .selected{
        color: green;
        outline: 1px solid black;
    }
</style>
<body>
<?php include ("nav.php"); ?>
<!-- <?php $user_id = $_SESSION['id'];?> -->
<div class="nameof"><h1>Архив фотоконкурсов</h1></div>
 <div class="gallery">
    <?php foreach ($cats as $cat): if($cat[2] < $today) { ?>
    <div class="gallery-item">
        <div class="gallery-title col-2"><h2><?=$cat[1]?></h2></div>
        <div class="card-box">
        <?php foreach ($postsUname as $post): if($post[4] == '1' && $post[6] == $cat[0]) {
                    $post_id = $post[0]; 
                    $likesCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS likes FROM rating WHERE post_id = $post_id"))['likes']; ?>
            <div class="card col-2" style="width: 18rem;">
                <img src="../img/<?=$post[3]?>" class="card-img-top" alt="...">
                <div class="card-body">
                <div class="card-text"><div class="descr"><p>Автор: <?=$post[7]?></p><p>Название: <?=$post[2]?></p></div>
                <button class="like" data-post-id=<?php echo $post_id; ?>><span class="material-symbols-outlined">favorite</span>
                        <span class="likes_count<?php echo $post_id; ?>" data-count = <?php echo $likesCount; ?>>
                            <?php echo $likesCount; ?>
                        </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php } endforeach; ?>
        </div>
        <?php } endforeach; ?>
    </div>
 </div>
 </body>
</html>