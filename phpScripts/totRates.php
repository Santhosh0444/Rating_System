<?php

include "database.php";

include "ratesCalc.php";

$product =  $_POST['prodcut'];

$avg = totStar($sql, $product);

echo $avg;

?>