<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/main.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
    <style>
        .moreActions {
            display: flex;
            gap: 10px;
        }

        .moreActions button {
            position: relative;
            width: 20px;
            height: 20px;
            justify-content: center;
            cursor: pointer;
            mask-image: url(Asserts/icons/other/trash-bin.svg);
            background: var(--bgColor);
        }
        .moreActions button:hover {
            background: red;
        }
        body.dark main.main .postItem {
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- header section -->

    <?php include ('header.php'); ?>
    <?php include ('errorDisplay.php');?>


    <main class="main">
        <div class="allPosts">
            <h3>Your Products: </h3>
            <div class="postItems flexBox"></div>
        </div>
    </main>


    <script>
        loadDash();


        function loadDash(event = 'load', product = '') {
            $.ajax({
                url: 'phpScripts/dashboard.php',
                method: "post",
                type: "post",
                dataType: 'html',
                data: {product,event},
                success: function (e) {
                    if(e == 'nouser'){
						$('.allPosts .postItems').html(`
						<center style='width: 100%; margin-top: 20px'><h3>Sign in to know your Products</h3><br><br>
							<a style='display: block; text-align: center; width: 100%'><a style='background: var(--bgColor); padding: 10px 15px; color: #fff; border-radius: 20px;' href="login.php">Sign In</a></center>
						`);
					}
					else {
						$('.allPosts .postItems').html(e);
					}
                }
            });
        }

        function delProduct(event ,product) {
            let alerts = confirm('DO YO WANT DELETE THIS?');
            if (alerts) {
                $.ajax({
                    url: 'phpScripts/dashboard.php',
                    method: "post",
                    type: "post",
                    dataType: 'html',
                    data: {product,event},
                    success: function (e) {
                        if (e == 'error') {
                            popAlerts(`
                        <div class="error con">
                            <span>some error</span>
                            <span class="canAlert">&times;</span>
                        </div>`);
                        }
                        else {
                            popAlerts(`
                            <div class="success con">
                                <span>success</span>
                                <span class="canAlert">&times;</span>
                            </div>`);
                            $('.allPosts .postItems').html(e);
                        }
                    }
                });
            }
        }


    </script>
</body>

</html>