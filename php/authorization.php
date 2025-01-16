<?php
session_start();
require_once ('main.php');


function getId($login){
    global $conn;
    $sql = "SELECT id FROM users WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Return the ID or false if the login was not found
    return $row ? $row['id'] : false;
   
}
//�������� ��� ����������� ���� �� ����� �������
function login($login, $password)
{
    global $conn;
    $sql = "SELECT pass FROM users WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row !== null && $password == $row["pass"]) {
        return true;
    } else {
        return false;
    }
}
//�������� admin ��� ���
function session($login)
{
    global $conn;
    $sql = "SELECT admin FROM users WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row !== null && $row["admin"] == 1) {
        return true;
    } else {
        return false;
    }
}

function partof($login)
{
    global $conn;
    $sql = "SELECT part FROM users WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row !== null && $row["part"] == 1) {
        return true;
    } else {
        return false;
    }
}
//�������� �� �� ���������� �� ������������ � ����� ������� 
function exam($login)
{
    global $conn;

    $sql = "SELECT COUNT(*) as count FROM users WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        return true; 
    } else {
        return false;
    }
    
}

//���������� � �� 
function insert($array)
{
    global $conn;

    $i=0;
    $colm = '';
    $mask = '';
    foreach ($array as $key => $value) {
        if ($i == 0) {
            $colm = $colm . "$key";
            $mask = $mask . "'"."$value"."'";
        } else {
            $colm = $colm . ", $key";
            $mask = $mask .   ", '$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO users ($colm) VALUES ($mask)";
    print_r($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->insert_id;
}
// print_r('hey');
// $data = [
//     'login' => 'sad',
//     'pass' => '111',
//     'email' => 'oki@mail.ru',
//     'admin' => '0',
// ];
// insert($data);

//$password_hash = login('admin', 'admin');
//if($password_hash){
//    echo '<pre>';
//    echo 'yes';
//    echo '</pre>';
//}
//echo '<pre>';
//echo $password_hash;
//echo '</pre>';
//if (login('admin1', 'adminfirst')) {
//    echo '<pre>';
//    echo "Login successful!";
//    echo '</pre>';
//} else {
//    echo '<pre>';
//    echo "Invalid login or password.";
//    echo '</pre>';
//}


