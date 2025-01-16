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
<?php $user_id = $_SESSION['id'];?>
<div class="nameof"><h1>Активные фотоконкурсы</h1></div>
 <div class="gallery">
    <?php foreach ($cats as $cat): if($cat[2] > $today) {?>
    <div class="gallery-item">
        <div class="gallery-title col-2"><h2><?=$cat[1]?></h2></div>
        <div class="card-box">
        <?php foreach ($postsUname as $post): if($post[3] == '1' && $post[5] == $cat[0]) {
            $post_id = $post[0]; 
            $likesCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS likes FROM rating WHERE post_id = $post_id"))['likes'];
            $status = mysqli_query($conn, "SELECT status AS likes FROM rating WHERE post_id = $post_id AND user_id = $user_id");
            $photos = selectALLforIMG($post[0]); ?>
            <div class="card col-2" style="width: 18rem;">
            <div id="carouselExampleControls<?=$post[0]?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php $i=0; foreach ($photos as $photo) : ?>
                    <div class="carousel-item <?php if($i == 0) echo 'active'?> ">
                    <img src="../img/<?=$photo[2]?>" class="d-block w-100" alt="...">
                    </div>
                <?php ++$i; endforeach; ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?=$post[0]?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?=$post[0]?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </div>
                <div class="card-body">
                    <div class="card-text"><div class="descr"><p>Автор: <?=$post[6]?></p><p>Название: <?=$post[2]?></p></div>
                        <button class="like <?php if($status == 'like') echo "selected"?>" data-post-id=<?php echo $post_id; ?>><span class="material-symbols-outlined">favorite</span>
                        <span class="likes_count<?php echo $post_id; ?>" data-count = <?php echo $likesCount; ?>>
                            <?php echo $likesCount; ?>
                        </span>
                        </button>
                    </div>
                </div>
                </div>
                <!-- <img src="../img/<?=$post[3]?>" class="card-img-top" alt="..."> -->
                </button>
            </div>
        <?php } endforeach; ?>
        </div>
        <?php } endforeach; ?>
    </div>
 </div>
<script type="text/javascript">
    $('.like').click(function (){
        var data = {
            post_id: $(this).data('post-id'),
            user_id: <?php echo $user_id; ?>,
            status: $(this).hasClass('like') ? 'like' : '0',
        };

        $.ajax({
            url: 'function.php',
            method: 'post',
            data: data,
            success:function(response){
                var post_id = data['post_id'];
                var likes = $('.likes_count' + post_id);
                var likesCount = likes.data('count');
                var likeButton = $(".like[data-post-id=" + post_id + "]");
                res = response.replace(/\s+/g, ' ');
                console.log(res);
                if(res == ' newlike'){
                    console.log('tyt');
                    likes.html(likesCount + 1);
                    likeButton.addClass('selected');
                }
                // else if(response == 'changetolike'){
                //     likes.html(parseInt($('.likes_count' + post_id).text()) + 1);
                //     likeButton.addClass('selected');
                // }
                else if(res == ' deletelike'){
                    console.log('tyta');
                    likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
                    likeButton.removeClass('selected');
                }
            }
        });
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>