<?php

include("sessionLoad.php");
$val = mysqli_real_escape_string($sql, $_POST['val']);

$srch = mysqli_query($sql, "SELECT * FROM products  WHERE product_name LIKE '%{$val}%' OR product_detail LIKE '%{$val}%'");
$list = '';

if(mysqli_num_rows($srch) > 0){
    while($row = mysqli_fetch_assoc($srch)){
        $ProName = strlen($row['product_name']) < 40 ? $row['product_name'] : substr($row['product_name'], 0, 36) . '...';
        $list .= "<a class='flexBox' href='http://localhost/rating%20system/product.php?item={$row['product_link']}'><img src='Asserts/Product_Images/{$row['product_image']}'> <span>{$ProName}</span></a>";
    }
}
else {
    $list = "<span style='line-height: 30px; text-align: center; display: block'>NO POST FOUND</span>";
}

echo $list;

?>