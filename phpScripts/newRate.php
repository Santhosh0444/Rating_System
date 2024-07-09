<?php
 include 'sessionLoad.php';

 $reviewerEmail = $data['email'];
 $reviewStar = $_POST['rateStar'];
 $product = $_POST['itemLink'];
 $reviewMessage = $_POST['rateMessage'];

    if($reviewStar == '' || $reviewMessage == ''){
        echo "<div class='error con'>
            <span>Please fill all inputs</span>
            <span class='canAlert'>&times;</span>
            </div>";
    }
    else {
        $base = mysqli_query($sql, "SELECT reviewer_email FROM reviews WHERE product = '{$product}' AND reviewer_email = '{$data['email']}'");

        if(mysqli_num_rows($base) <= 0){
            $newPost  = mysqli_query($sql, "INSERT INTO reviews (product, reviewer_email, reviewer_rate, reviewer_message) VALUES ('{$product}', '{$reviewerEmail}', '{$reviewStar}', '{$reviewMessage}')");

            if($newPost == 1){
                echo 'posted';
            }
        }

        else {
            $update = mysqli_query($sql, "UPDATE reviews SET reviewer_rate = '{$reviewStar}', reviewer_message = '{$reviewMessage}' WHERE product = '{$product}' AND reviewer_email = '{$data['email']}'");

            if($update == 1){
                echo 'updated';
            }
        }
    } 

?>