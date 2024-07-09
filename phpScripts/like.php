<?php

include 'database.php';
session_start();

$product = $_POST['productLink'];

if(isset($_SESSION['email'])){

$event = $_POST['events'];
$email = $_SESSION['email'];
$commendLike = '';

$data = mysqli_query($sql, "SELECT * FROM product_like WHERE product = '{$product}' AND liker_email = '{$email}'");
$checkLikedCommend = mysqli_fetch_assoc($data);

if($event == 'like'){

    if((mysqli_num_rows($data) > 0)){
        if($checkLikedCommend['likeCommend'] == 'like'){
            $like = mysqli_query($sql, "DELETE FROM product_like WHERE product = '{$product}' AND liker_email = '{$email}'");
            $commendLike = '';
        }
        else{
            $like = mysqli_query($sql, "UPDATE product_like SET likeCommend = '{$event}' WHERE product = '{$product}' AND liker_email = '{$email}'");
            $commendLike = 'active';
        }
    }
    else {
        $like = mysqli_query($sql, "INSERT INTO product_like (product, liker_email, likeCommend) VALUES ('{$product}', '{$email}', '{$event}');");
        $commendLike = 'active';

    }

    $totLike = likes($product, $sql);
    $totDislike = dislikes($product, $sql);
    echo "{$commendLike},{$totLike},{$totDislike},{$event}";
}

elseif($event == 'dislike') {

    if((mysqli_num_rows($data) > 0)){
        if($checkLikedCommend['likeCommend'] == 'dislike'){
            $dislike = mysqli_query($sql, "DELETE FROM product_like WHERE product = '{$product}' AND liker_email = '{$email}'");
            $commendLike = '';
        }
        else{
            $dislike = mysqli_query($sql, "UPDATE product_like SET likeCommend = '{$event}' WHERE product = '{$product}' AND liker_email = '{$email}'");
            $commendLike = 'active';
        }    
    }
    else {
        $dislike = mysqli_query($sql, "INSERT INTO product_like (product, liker_email, likeCommend) VALUES ('{$product}', '{$email}', '{$event}');");
        $commendLike = 'active';
    }

    $totLike = likes($product, $sql);
    $totDislike = dislikes($product, $sql);
    echo "{$commendLike},{$totLike},{$totDislike},{$event}";
}


else {
    $data = mysqli_query($sql, "SELECT * FROM product_like WHERE product = '{$product}' AND liker_email = '{$email}'");

    $totLike = likes($product, $sql);
    $totDislike = dislikes($product, $sql);

    if(mysqli_num_rows($data) > 0){
        $likeCommend = mysqli_fetch_assoc($data);

        if($likeCommend['likeCommend'] == 'like'){
            echo "active,{$totLike},{$totDislike},like";
        }
        if($likeCommend['likeCommend'] == 'dislike'){
            echo "active,{$totLike},{$totDislike},dislike";
        }
    }
    else {
        echo "'',{$totLike},{$totDislike},''";
    }
}

}

else {
    $totLike = likes($product, $sql);
    $totDislike = dislikes($product, $sql);
    echo "error,{$totLike},{$totDislike}";
}





function likes($product, $sql) {
    $like = mysqli_query($sql, "SELECT * FROM product_like WHERE product = '{$product}' AND likeCommend = 'like'");
    return mysqli_num_rows($like);
}

function dislikes($product, $sql) {
    $dislike = mysqli_query($sql, "SELECT * FROM product_like WHERE product = '{$product}' AND likeCommend = 'dislike'");
    return mysqli_num_rows($dislike);
}

?>