<?php

include_once "sessionLoad.php";

if (isset($_SESSION['email'])) {
    $productName = mysqli_escape_string($sql, $_POST['productName']);
    $productype = mysqli_escape_string($sql, $_POST['productype']);
    $productDetails = mysqli_escape_string($sql, $_POST['productDetails']);
    $productImg = $_FILES['ProductImg'];
    $pubEmail = $data['email'];
    $pubName = $userName;
    $productImg = $_FILES['ProductImg'];
    $supportExe = ['png', 'jpg', 'jpeg', 'svg'];
    $tn = '';

    $letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];


    if ($productName == '' || $productype == '' || $productDetails == '') {
        echo '<div class="error con">
        <span>Please Fill all inputs</span>
        <span class="canAlert">&times;</span>
    </div>';
    } else {
        $exe = pathinfo($productImg['name'], PATHINFO_EXTENSION);
        if (in_array($exe, $supportExe)) {

            for ($i = 1; $i <= 8; $i++) {
                $rand = rand(1, sizeof($letters)-1);
                $tn .= $letters[$rand];
            }

            $img = $tn . '.' . $exe;

            move_uploaded_file($productImg['tmp_name'], '../Asserts/Product_Images/' . $img);

            $uploadProduct = mysqli_query($sql, "INSERT INTO products (product_link, product_name, product_type, product_detail, publisher_email, publisher_name, product_image, product_upload_date) VALUES ('{$tn}', ' {$productName}', '{$productype}', '{$productDetails}', '{$pubEmail}', '{$pubName}', '{$img}', Now())");

            if ($uploadProduct == 1) {
                echo 'uploaded';
            }

        } else {
            echo '<div class="error con">
        <span>upload only png, jpeg, jpg, svg</span>
        <span class="canAlert">&times;</span>
    </div>';
        }
    }
}

?>