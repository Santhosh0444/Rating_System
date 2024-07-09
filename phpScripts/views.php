<?php

include ("database.php");

$product = $_POST['product'];

$tot = 0;

$views = mysqli_query($sql, "SELECT views FROM products WHERE product_link = '{$product}'");

$totViews = mysqli_fetch_assoc($views);

$total = (int)$totViews['views'] + 1;

if(mysqli_num_rows($views) > 0){
    mysqli_query($sql, "UPDATE products SET views = '{$total}' WHERE product_link='{$product}'");
}


?>