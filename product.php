<?php
include 'phpScripts/database.php';
if (isset($_GET['item']) && $_GET['item'] != '') {
    $product = $_GET['item'];
    $item = mysqli_query($sql, "SELECT * FROM products WHERE product_link = '{$product}'");
    $items = mysqli_fetch_assoc($item);
    $reviews = mysqli_query($sql, "SELECT reviewer_rate FROM reviews WHERE product = '{$product}'");
    $totReviews = mysqli_num_rows($reviews);
    $reviewsTot = $totReviews > 0 ? 'Reviews: ' . $totReviews : "No review";
}

$title = (!isset($_GET['item']) || $_GET['item'] == '' || (!mysqli_num_rows($item) > 0))? '404 page not found': $items['product_name'] ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <script src="jsfiles/main.js" defer></script>
    <link rel="stylesheet" href="stylesheet/product.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/product.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
    <script src="scriptsServer/like.js" defer></script>
    <script src="scriptsServer/totRates.js" defer></script>
</head>

<body>

    <!-- header section -->
    <?php include 'header.php' ?>

    <!-- error section -->

    <?php include 'errorDisplay.php' ?>

    <!-- main section -->
    <main class="main">
        <div class="product">
            <div class="productDetails">
                <div class="imgContainer">
                    <img src="<?= './Asserts/Product_Images/' . $items['product_image'] ?>" alt="#">
                </div>
                <h3><?= $items['product_name'] ?></h3>
                <div class="ratings flexBox" data-rate="0">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
                <div class="totalReview">
                    <?= $reviewsTot ?>
                </div>
                <div class="moreCotent flexBox">
                    <div class="likeDislike flexBox">
                        <div class='like active flexBox'></div>
                        <div class='dislike flexBox'></div>
                    </div>
                    <div class="views flexBox" style="gap: 2px;">
                        <?= $items['views'] ?>
                    </div>
                </div>
                <button class="review formOpenBtn">Review</button>
                <button class="share shareOpenBtn">Share</button>
            </div>
        </div>
        <div class="productContents">
            <div class="productDetails">
                <p class="type">
                    <?= $items['product_type'] ?>
                </p>
                <h4>Details: </h4>
                <p class="describe">
                    <?= $items['product_detail'] ?>
                </p>
                <div class="pubDetailsPub">
                    <h4>publisher: </h4>
                    <span data-name="name">
                        <?= $items['publisher_name'] ?>
                    </span>
                    <span data-name="email">
                        <?= $items['publisher_email'] ?>
                    </span>
                    <span data-name="date">
                        <?= $items['product_upload_date'] ?>
                    </span>
                </div>
            </div>
            <div class="productReveiws">
                <h3>Comments</h3>
                <div class="postCommands"></div>
            </div>
            <div class="mobileReviewBtn">
                <button class="mobReviewBtn formOpenBtn">comment Now</button>
            </div>
        </div>
    </main>

    <!-- review form section -->
    <div class="newReviewForm">
        <div class="formBg formOpenBtn"></div>
        <div class="fromReview">
            <h3>Write a Review: </h3>
            <div class="formSection">
                <form action="#" method='post' class="formReview">
                    <div class="userProfile flexBox">
                        <img src="<?= './Asserts/Users_DB_Images/' . $data['img'] ?>" alt="#">
                        <span class="userName">
                            <?= $data['fname'] . ' ' . $data['lname'] ?>
                        </span>
                    </div>
                    <div class="starReview flexBox">
                        <span data-value="1"></span>
                        <span data-value="2"></span>
                        <span data-value="3"></span>
                        <span data-value="4"></span>
                        <span data-value="5"></span>
                    </div>
                    <input type="number" name="rateStar" class="ratesBox" readonly required>
                    <input type="text" name="itemLink" class="productLink" readonly required value="<?= $product ?>">
                    <div class="feildSection">
                        <textarea name="rateMessage" placeholder="write review" required></textarea>
                    </div>
                    <div class="formBtn flexBox">
                        <button type="submit" class="subBtn">Submit</button>
                        <button type="button" class="cancleBtn formOpenBtn">cancel</button>
                    </div>
                </form>
            </div>
            <input type="text" name="itemLink" class="productLink" readonly required value="<?= $product ?>">
        </div>
    </div>


    <?php
    if (!isset($_SESSION['email'])) {
        echo "
                <script>
                $('.newReviewForm .formSection').html(`
                <span style='display:block; text-align: center; width: 100%; font-size: 20px'>
                    Sign in to write a Review
                </span>
                <div class='formBtn flexBox'>
                        <a href='login.php' class='logIn'>Sign In</a>
                        <button type='button' class='cancleBtn formOpenBtn'>cancel</button>
                    </div>
                `);
                </script>
                ";
    }
    ?>

    <?php

    if (!isset($_GET['item']) || $_GET['item'] == '' || (!mysqli_num_rows($item) > 0)) {
        echo "
    <script type='text/javascript'>
        
        $('main.main').html(`
        <div style='display: flex; flex-direction: column; justify-content: center; align-items: center; height: calc(100vh - 200px)'>
        <h1 style='font-size: 5em;'>404</h1>
        <p>This Page is Not available....</p>
        <a style=' margin-top: 10px;color: var(--bgColor);' href='index.php'>Home</a>
        </div>
        <style>
        footer.footer {
            display: none;
        }
        </style>
        `);
    </script>
    ";
    }

    ?>

    <?php include 'footer.php' ?>

    <script type="text/javascript">
        let product = $('input.productLink').val();

        setTimeout(function () {
            $.ajax({
                url: 'phpScripts/views.php',
                method: "post",
                type: 'post',
                data: { product }
            });
        }, 3000);
    </script>

    <script>
        function deleteCom() {

            let product = $('.newReviewForm input.productLink').val();
            let con = confirm("Du yo want delete this commend");
            if (con) {
                $.ajax({
                    url: 'phpScripts/delCommand.php',
                    method: 'post',
                    type: 'post',
                    dataType: 'html',
                    data: { product },
                    success: function (e) {
                        if (e == 'success') {
                            popAlerts(`
                <div class="success con">
                    <span>Success...</span>
                    <span class="canAlert">&times;</span>
                </div>`);
                            allCommants();
                        }
                        else if (e = 'error') {
                            popAlerts(`
                        <div class="success con">
                        <span>error</span>
                        <span class="canAlert">&times;</span>
                        </div>`);
                        }
                        else {
                            popAlerts(`
                <div class="success con">
                    <span>some error..</span>
                    <span class="canAlert">&times;</span>
                </div>`);
                        }
                    }
                });
            }
        }

        allCommants();


        function allCommants() {
            let product = $('.newReviewForm input.productLink').val();
            $.ajax({
                url: 'phpScripts/reviews.php',
                method: 'post',
                type: 'post',
                dataType: 'html',
                data: { product },
                success: function (e) {
                    $('.productReveiws .postCommands').html(e);
                }
            });
        }
    </script>

    <script src="scriptsServer/product.js"></script>

    <script>
        prodcut = $(".fromReview .productLink").val();

        setInterval(function(){
            totReview();
        },1000);

        function totReview(){
            $.ajax({
                url: 'phpScripts/liveRate.php',
                method: 'post',
                type: 'post',
                dataType: 'html',
                data: { product },
                success: function (e) {
                    data = e.split(',');
                    reviews = data[0];
                    views = data[1];
                    $('.totalReview').html(reviews);
                    $('.views').html(views);
                }
            });
        }
    </script>
</body>

</html>