<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating System</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/main.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
</head>

<body class="">

    <?php
    include 'phpScripts/ratesCalc.php';
    include 'header.php';
	include 'errorDisplay.php';
    ?>
    <?php $post = mysqli_query($sql, "SELECT * FROM products ORDER BY RAND() LIMIT 0, 6") ?>
    <?php $postAdvance = mysqli_query($sql, "SELECT * FROM products ORDER BY RAND() LIMIT 0, 4") ?>

    <!-- main section -->
    <main class="main">

    <?php include ('sliders.php') ?>

    <noscript>
        <p style="color: red">PLEASE ENABLE JAVASCRIPT FOR USE THIS WEBSITE. <strong>JAVASCRIPT REQURIED</strong></p>
    </noscript>

        <div class="container">
            <div class="featuredPost">
                <h4>Fearured</h4>
                <div class="featuredItems flexBox">
                    <?php

                    if (mysqli_num_rows($post) > 0) {
                        while ($featured = mysqli_fetch_assoc($post)) {
                            $product = $featured["product_link"];

                            $ProName = strlen($featured['product_name']) < 40 ? $featured['product_name'] : substr($featured['product_name'], 0, 40) . '...';

                            $detail = strlen($featured['product_detail']) < 70 ? $featured['product_detail'] : substr($featured['product_detail'], 0, 70) . '...';


                            $avg = totStar($sql, $product);

                            $totStar = round((float) $avg, 1);
                            $half = $totStar - floor($totStar);

                            $starElement = '';
                            if ($avg > 0) {
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $totStar) {
                                        $starElement .= "<span class='full'></span>";
                                    } else if ((0.0 < $half) && (1.0 > $half)) {
                                        $starElement .= "<span class='half'></span>";
                                        $half = 0;
                                    } else {
                                        $starElement .= "<span></span>";
                                    }
                                }
                            } else {
                                $starElement = "<span></span><span></span><span></span><span></span><span></span>";
                            }

                            echo "<div class='featuredItem'>
                                <div class='itemContent'>
                                    <div class='imgContent'>
                                        <a href='http://localhost/rating%20system/product.php?item={$featured['product_link']}'></href><img src='Asserts/Product_Images/{$featured['product_image']}'></a>
                                    </div>
                                    <div class='textContent'>
                                        <a href='http://localhost/rating%20system/product.php?item={$featured['product_link']}'>
                                            <h4>{$ProName}</h4>
                                        </a>
                                        <a href='http://localhost/rating%20system/product.php?item={$featured['product_link']}'>
                                            <p>{$detail}</p>
                                        </a>
                                        <div class='more'>
                                            <a href='http://localhost/rating%20system/product.php?item={$featured['product_link']}' class='ratings' rate='{$totStar}'>$starElement</a>
                                            <div class='view flexBox'>{$featured['views']}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<span style='font-weight: bold; display: block; text-align: center;font-size: 17px; width: 100%;'>NO POSTS YET....</span>";
                    }
                    ?>
                </div>
            </div>

            <!-- more for liked for you -->

            <div class="advancedPost">
                <div class="moreAdvancePost">
                    <h3>For more Posts!!</h3>
                    <p>More posts for you liked</p>
                </div>
                <div class="advacePosts">
                    <?php
                    if (mysqli_num_rows($post) > 0) {

                        while ($advanced = mysqli_fetch_assoc($postAdvance)) {

                            $product = $advanced['product_link'];

                            $ProName = strlen($advanced['product_name']) < 40 ? $advanced['product_name'] : substr($advanced['product_name'], 0, 40) . '...';


                            $avg = totStar($sql, $product);

                            $totStar = round((float) $avg, 1);
                            $half = $totStar - floor($totStar);

                            $starElement = '';
                            if ($avg > 0) {
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $totStar) {
                                        $starElement .= "<span class='full'></span>";
                                    } else if ((0.0 < $half) && (1.0 > $half)) {
                                        $starElement .= "<span class='half'></span>";
                                        $half = 0;
                                    } else {
                                        $starElement .= "<span></span>";
                                    }
                                }
                            } else {
                                $starElement = "<span></span><span></span><span></span><span></span><span></span>";
                            }

                            echo "<div class='advancedPostsItems'>
                                    <div class='advacedItems'>
                                        <div class='imgContent'>
                                            <a href='http://localhost/rating%20system/product.php?item={$advanced['product_link']}'><img src='Asserts/Product_Images/{$advanced['product_image']}'></a>
                                        </div>
                                        <div class='advacedPostContent'>
                                            <a href='http://localhost/rating%20system/product.php?item={$advanced['product_link']}'>
                                                <h3>{$ProName}</h3>
                                            </a>
                                            <a href='http://localhost/rating%20system/product.php?item={$advanced['product_link']}' class='advacedRates' rate='{$totStar}'>{$starElement}</a>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    } else {
                        echo "<span style='font-weight: bold; display: block; text-align: center;font-size: 17px; width: 100%;'>NO POSTS YET....</span>";
                    }
                    ?>


                </div>
            </div>
        </div>

        <div class="allPosts">
            <h3>Posts</h3>
            <div class="postItems flexBox"></div>
        </div>

    </main>

    <?php include 'footer.php' ?>

    <script>
        allPost();
        function allPost() {
            $.ajax({
                url: 'phpScripts/allPost.php',
                method: 'post',
                type: 'post',
                dataType: 'html',
                success: function (e) {
                    $('.allPosts .postItems').html(e);
                }
            })
        } 
    </script>

</body>

</html>