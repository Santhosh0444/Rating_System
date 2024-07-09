<?php

include 'sessionLoad.php';

$allReviews = '';
$product = $_POST['product'];
if (isset($_SESSION['email'])) {
    $currentUser = $_SESSION['email'];
} else {
    $currentUser = '';
}

$otherReviews = '';
$currentUsr = '';
$reviews = '';

$Reviews = mysqli_query($sql, "SELECT * FROM reviews WHERE product = '{$product}'");

// echo mysqli_num_rows($Reviews);
if (mysqli_num_rows($Reviews) > 0) {
    while ($rows = mysqli_fetch_assoc($Reviews)) {
        $img = mysqli_query($sql, "SELECT fname, lname, img FROM users WHERE email = '{$rows['reviewer_email']}'");
        $userImg = mysqli_fetch_assoc($img);
        $star = '';

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rows['reviewer_rate']) {
                $star .= '<span class="active"></span>';
            } else {
                $star .= '<span></span>';
            }
        }

        if ($rows['reviewer_email'] == $currentUser) {

            $currentUsr .= "<div class='itemComments'>
                        <div class='Itemreview flexBox'>
                            <img src='Asserts/Users_DB_Images/{$userImg['img']}' alt=''>
                            <span>{$userImg['fname']} {$userImg['lname']}</span>
                        </div>
                        <div class='starRatings flexBox'>{$star}</div>
                        <div class='review'>{$rows['reviewer_message']}</div>
                        <div class='commentBtn'>
                            <button class='del mask-style' onclick='deleteCom()'></button>
                        </div>
                </div>";
        } else {
            $otherReviews .= "
            <div class='itemComments'>
                        <div class='Itemreview flexBox'>
                            <img src='Asserts/Users_DB_Images/{$userImg['img']}' alt=''>
                            <span>{$userImg['fname']} {$userImg['lname']}</span>
                        </div>
                        <div class='starRatings flexBox'>{$star}</div>
                        <div class='review'>{$rows['reviewer_message']}</div>
                </div>
        ";
        }
    }
} else {
    $currentUsr = '<span style="display: block; text-align: center; display: block;font-size: 20px;">No Reviews Found!...</span>';
}

$allReviews .= $currentUsr . $otherReviews;

echo $allReviews;
