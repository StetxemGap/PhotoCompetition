<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        function showError(message) {
            alert(message);
        }
    </script>
</head>
<body>
<?php include ("authorization.php"); ?>

<?php

if (isset($_POST['butt-click'])) {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    if (isset($_POST['login'])) {      
        $passwordFromDb = login($login, $password);
        if ($passwordFromDb) {
            $admn = session($login);
            $id = getId($login);
            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['admin'] = $admn;
            $_SESSION['part'] = '0';
                header('Location: index.php');
                exit;
         
        } else {
            echo '<script>';
            echo 'showError(\'Invalid login or password.\');';
            echo '</script>';
        }
    }
}
$state = false;
$errorMsg = '';
if (isset($_POST['butt-reg'])) {
    $admin = '0';
    $part = '0';
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    if ($login === '' || $email === '' || $password === '') {
        $errorMsg = 'Не все поля заполнены';
    } elseif(mb_strlen($login,'UTF8') < 2){
        $errorMsg = 'Слишком короткий логин';
    }elseif(exam($login)){
        $errorMsg = 'Логин уже занят другим пользователем';
    }
    else {
        $post = [
            'login' => $login,
            'pass' => $password,
            'email' => $email,
            'admin' => $admin,
            'part' => $part,
        ];
        $id = insert($post);
        $admn = session($login);
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
        $_SESSION['admin'] = $admn;
        header('Location: index.php');
        exit;

    }
}
?>


</body>
</html>