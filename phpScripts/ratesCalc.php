<?php
function totStar($sql, $product)
{
    $avg = $five = $four = $three = $two = $one = 0;

    $tot = mysqli_query($sql, "SELECT * FROM  reviews WHERE product = '{$product}'");

    if (mysqli_num_rows($tot) > 0) {
        while ($rows = mysqli_fetch_assoc($tot)) {
            if ($rows['reviewer_rate'] == 5) {
                $five = totRates($sql, 5, $product);
            } else if ($rows['reviewer_rate'] == 4) {
                $four = totRates($sql, 4, $product);
            } else if ($rows['reviewer_rate'] == 3) {
                $three = totRates($sql, 3, $product);
            }
            if ($rows['reviewer_rate'] == 2) {
                $two = totRates($sql, 2, $product);
            } else {
                $one = totRates($sql, 1, $product);
            }
        }
        $avg = ((5 * $five) + (4 * $four) + (3 * $three) + (2 * $two) + (1 * $one)) / mysqli_num_rows($tot);
    }
    return $avg;
}

function totRates($sql, $rates, $product)
{
    $rate = mysqli_query($sql, "SELECT reviewer_rate FROM reviews WHERE product = '{$product}' AND reviewer_rate = '{$rates}'");
    return mysqli_num_rows($rate);
}

?>