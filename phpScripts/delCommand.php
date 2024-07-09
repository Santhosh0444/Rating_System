<?php

include("sessionLoad.php");

if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $product = $_POST['product'];
    $del = mysqli_query($sql, "DELETE FROM reviews WHERE product = '{$product}' AND reviewer_email = '{$email}'");
    if($del) {
        echo "success";
    }
    else {
        echo "error";
    }
}
else {
    echo "errorDel";
}

?>