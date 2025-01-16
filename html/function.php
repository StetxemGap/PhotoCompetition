
<?php
require '../php/main.php';

$post_id = $_POST["post_id"];
$user_id = $_POST["user_id"];
$status = $_POST["status"];
$f = fopen("log.txt", 'w');

$rating = mysqli_query($conn, "SELECT * FROM rating WHERE post_id = $post_id AND user_id = $user_id");
if(mysqli_num_rows($rating) > 0){
    $rating = mysqli_fetch_assoc($rating);
    if($rating['status'] == $status){
        mysqli_query($conn, "DELETE FROM rating WHERE post_id = $post_id AND user_id = $user_id");
        print_r("delete" . $status);
    }
}
else{
    mysqli_query($conn, "INSERT INTO rating (`post_id`, `user_id`, `status`) VALUES ('$post_id', '$user_id', '$status')");
    print_r("new" . $status);
}
fclose($f);
?>