<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoBattle</title>
    <script>
        function showError(message) {
            alert(message);
        }
    </script>
</head>
<body>

<?php
include "func.php";
include ("authorization.php"); 

$errMsg = '';
$id = '';
$title = '';
$img = '';
$category = '';

$posts = selectAll();
$cats = selectAllcat();
$postsUname = selectAllforNameAuth('photos', 'users');
$postsCatName = selectAllforNameCat('photos', 'category');
//добавить невс
if(isset($_POST['add_photo']))
{
    $title = trim($_POST['title']);
    $imgs = $_POST['img'];
    $category = trim($_POST['category']);

    if ($title === '' || $category == '')
    {
        $errMsg = "Не все поля заполнены!";

    }
    elseif (mb_strlen($title, 'UTF8') < 3)
    {
        $errMsg = "Название статьи должно быть более 3-x символов";
    }
    else
    {
        $post = [
            //'id' => '',
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'status' => '0',
            'id_category' => $category,
        ];
            $post = insertpost($post);
            $post = selectOne(['title' => $title]);
            print_r($post);
        foreach ($imgs as $img)
        {
            if ($img != '')
            {
                $post_img = [
                    'post_id' => $post[0],
                    'img' => $img,
                ];

                $post_img = insertimg($post_img);
            }
        }

        if($_SESSION['admin'])
        {
            header('location: ../html/work.php');
        }
        else
        {
            header('location: ../html/index.php');
        }
    }
}
else
{
    $title = '';
}


if(isset($_POST['add_cat']))
{
    $name = trim($_POST['title']);
    $date = trim($_POST['date']);

    if ($name === '' || $date == '')
    {
        $errMsg = "Не все поля заполнены!";

    }
    elseif (mb_strlen($name, 'UTF8') < 3)
    {
        $errMsg = "Название статьи должно быть более 3-ми символов";
    }
    else
    {
        $post = [
            'name' => $name,
            'date' => $date,
        ];
        $post = insertpostC($post);
       //$post = selectOne(['id' => $id]);
        header('location: ../html/category.php');
    }
}
else
{
    $name = '';
}

//изменить невс
if(isset($_GET['id']))
{
    $post = selectOneC(['id' => $_GET['id']]);

    $id = $post[0];
    $name = $post[1];
    $date = $post[2];
}


if(isset($_POST['edit_cat']))
{
    $id = $_POST['id'];
    $name = trim($_POST['title']);
    $date = trim($_POST['date']);

    if ($name === '' || $date == '')
    {
        $errMsg = "Не все поля заполнены!";

    }
    elseif (mb_strlen($name, 'UTF8') < 3)
    {
        $errMsg = "Название статьи должно быть более 3-ми символов";
    }
    else
    {
        $post = [
            'name' => $name,
            'date' => $date,
        ];
        print_r($id);
        $post = updateC($id, $post);
        header('location: ../html/category.php');
    }
}
else
{
    $name = '';
}

if(isset($_GET['id_pub']))
{
    // $postCatName = selectOneforNameCat('photos', 'category',$_GET['id_pub']);
    $post_tmp = selectOne(['id' => $_GET['id_pub']]);
    // print_r($postCatName);
    // print_r($postU);
    $id = $_GET['id_pub'];
    $title = $post_tmp[2];
    $category = $post_tmp[5];
    $id_user = $post_tmp[1];
    $data = $post_tmp[4];

        $post = [
            'id_user' => $id_user,
            'title' => $title,
            'status' => '1',
            'data' => $data,
            'id_category' => $category,
        ];
        //print_r($post);
        $post = update($id, $post);
        header('location: ../html/work.php');

}

if(isset($_GET['id_unpub']))
{
    // $postCatName = selectOneforNameCat('photos', 'category',$_GET['id_pub']);
    $post_tmp = selectOne(['id' => $_GET['id_unpub']]);
    // print_r($postCatName);
    // print_r($postU);
    $id = $_GET['id_unpub'];
    $title = $post_tmp[2];
    $category = $post_tmp[5];
    $id_user = $post_tmp[1];
    $data = $post_tmp[4];

        $post = [
            'id_user' => $id_user,
            'title' => $title,
            'status' => '0',
            'data' => $data,
            'id_category' => $category,
        ];
        //print_r($post);
        $post = update($id, $post);
        header('location: ../html/work.php');

}


if(isset($_GET['delete_id']))
{
    if($_SESSION['admin'] === 0){
        echo '<script>';
        echo 'showError(\'Net prav.\');';
        echo '</script>';
        exit();
    }
    $post = selectOne(['id' => $_GET['delete_id']]);
    $id = $post[0];
    del($id);
    header('location: ../html/work.php');
}

if(isset($_GET['deleteC_id']))
{
    if($_SESSION['admin'] === 0){
        echo '<script>';
        echo 'showError(\'Net prav.\');';
        echo '</script>';
        exit();
    }
    $post = selectOneC(['id' => $_GET['deleteC_id']]);
    $id = $post[0];
    delC($id);
    header('location: ../html/category.php');
}

