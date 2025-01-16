<?php

require ('main.php');

define("ROOT_PATH", realpath(dirname(__FILE__)));

//запись
// $data =[
//     'id' => '3',
//     'title' => 'lorem',
//     'img' => 'none',
//     'content' => 'ipsum',
//     'date' => '2024-12-04',
// ];

function selectAll($params = [])
{
    global $conn;
    $val = "SELECT * FROM photos ";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
              if(!is_numeric($value)){
                  $value = "'" . $value . "'";
              }
            if ($i === 0){
                $val = $val . " WHERE $key = $value"; 
            }else{
                $val = $val . " AND $key = $value";
            }
            $i++;
        }
    }
    // print_r($val);
    $res = mysqli_query($conn, $val);
    // $res = mysqli_fetch_all($res);
    // var_dump($res);
    // exit();
    return $res = mysqli_fetch_all($res);
}

function selectAllusers($params = [])
{
    global $conn;
    $val = "SELECT * FROM users ";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
              if(!is_numeric($value)){
                  $value = "'" . $value . "'";
              }
            if ($i === 0){
                $val = $val . " WHERE $key = $value"; 
            }else{
                $val = $val . " AND $key = $value";
            }
            $i++;
        }
    }
    // print_r($val);
    $res = mysqli_query($conn, $val);
    // $res = mysqli_fetch_all($res);
    // var_dump($res);
    // exit();
    return $res = mysqli_fetch_all($res);
}


function selectAllcat($params = [])
{
    global $conn;
    $val = "SELECT * FROM category ";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
              if(!is_numeric($value)){
                  $value = "'" . $value . "'";
              }
            if ($i === 0){
                $val = $val . " WHERE $key = $value"; 
            }else{
                $val = $val . " AND $key = $value";
            }
            $i++;
        }
    }
    // print_r($val);
    $res = mysqli_query($conn, $val);
    // $res = mysqli_fetch_all($res);
    // var_dump($res);
    // exit();
    return $res = mysqli_fetch_all($res);
}
// $param = [
//     'id' => '3',
// ];
// selectAll($param);

function selectOne($params = [])
{
    global $conn;
    $val = "SELECT * FROM photos ";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
              if(!is_numeric($value)){
                  $value = "'" . $value . "'";
              }
            if ($i === 0){
                $val = $val . " WHERE $key = $value"; 
            }else{
                $val = $val . " AND $key = $value";
            }
            $i++;
        }
    }
    $val = $val . " LIMIT 1";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_row($res);
}

function selectOneC($params = [])
{
    global $conn;
    $val = "SELECT * FROM category ";
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
              if(!is_numeric($value)){
                  $value = "'" . $value . "'";
              }
            if ($i === 0){
                $val = $val . " WHERE $key = $value"; 
            }else{
                $val = $val . " AND $key = $value";
            }
            $i++;
        }
    }
    $val = $val . " LIMIT 1";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_row($res);
}

// print_r(selectOne($param));

function insertpost($params)
{
    global $conn;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'$value'";
        }
        else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $val = "INSERT INTO photos ($coll) VALUES ($mask)";
    $f = fopen("log.txt",'w');
    fwrite($f, $val);
    fclose($f);
    mysqli_query($conn, $val);
}

function insertimg($params)
{
    global $conn;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'$value'";
        }
        else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $val = "INSERT INTO photo ($coll) VALUES ($mask)";
    // $f = fopen("log.txt",'w');
    // fwrite($f, $val);
    // fclose($f);
    mysqli_query($conn, $val);
}

function insertpostC($params)
{
    global $conn;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'$value'";
        }
        else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $val = "INSERT INTO category ($coll) VALUES ($mask)";
    //print_r($val);
    mysqli_query($conn, $val);
}
// $data = [
//     //'id' =>  '3',
//     'title' => 'header',
//     'img' => 'none',
//     'content' => 'lorem',
//     //'date' => '2024-04-12',
// ];
// insert($data);

function del($id)
{
    global $conn;
    $val = "DELETE FROM photos WHERE id = '$id'";
    print_r($val);
    mysqli_query($conn, $val);
}

function delC($id)
{
    global $conn;
    $val = "DELETE FROM category WHERE id = '$id'";
    print_r($val);
    mysqli_query($conn, $val);
}


$param = [
    'content' => 'ipsum',
];

function update($id, $params)
{
    global $conn;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . "= '" . $value . "'";
        }
        else{
            $str = $str . ", " . $key . "= '" . $value . "'";
        }
        $i++;
    }
    $val = "UPDATE photos SET $str WHERE id = $id";
    //print_r($val);
    mysqli_query($conn, $val);
}

function updateC($id, $params)
{
    global $conn;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . "= '" . $value . "'";
        }
        else{
            $str = $str . ", " . $key . "= '" . $value . "'";
        }
        $i++;
    }
    $val = "UPDATE category SET $str WHERE id = $id";
    //print_r($val);
    mysqli_query($conn, $val);
}

function updateU($id, $params)
{
    global $conn;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . "= '" . $value . "'";
        }
        else{
            $str = $str . ", " . $key . "= '" . $value . "'";
        }
        $i++;
    }
    $val = "UPDATE users SET $str WHERE id = $id";
    //print_r($val);
    mysqli_query($conn, $val);
}
//update(1, $param);

function selectAllforNameAuth($t1, $t2)
{
    global $conn;
    $val = "SELECT t1.*,t2.login
    FROM $t1 AS t1 JOIN $t2 AS t2 ON t1.id_user = t2.id";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_all($res);
}

function selectAllAuth($id_user)
{
    global $conn;
    $val = "SELECT * FROM photos WHERE id_user = $id_user";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_all($res);
}

function selectAllforNameCat($t1, $t2)
{
    global $conn;
    $val = "SELECT t1.*,t2.name
    FROM $t1 AS t1 JOIN $t2 AS t2 ON t1.id_category = t2.id";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_all($res);
}

function selectOneforNameAuth($t1, $t2, $id)
{
    global $conn;
    $val = "SELECT t1.*, t2.login
    FROM $t1 AS t1 JOIN $t2 AS t2 ON t1.id_user = t2.id WHERE t1.id = $id";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_row($res);
}

function selectOneforNameCat($t1, $t2, $id)
{
    global $conn;
    $val = "SELECT t1.*, t2.name
    FROM $t1 AS t1 JOIN $t2 AS t2 ON t1.id_category = t2.id WHERE t1.id = $id";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_row($res);
}

function selectAllforIMG($post_id)
{
    global $conn;
    $val = "SELECT * FROM photo WHERE post_id = $post_id";
    $res = mysqli_query($conn, $val);
    return $res = mysqli_fetch_all($res);
}
?>
