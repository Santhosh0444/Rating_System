<?php
include 'database.php';
$product = $_POST['product'];
$item = mysqli_query($sql, "SELECT * FROM products WHERE product_link = '{$product}'");
$items = mysqli_fetch_assoc($item);
$reviews = mysqli_query($sql, "SELECT reviewer_rate FROM reviews WHERE product = '{$product}'");
$totReviews = mysqli_num_rows($reviews);
$reviewsTot = $totReviews > 0 ? 'Reviews: ' . $totReviews : "No review";
echo $reviewsTot.','.$items['views'];
?>