

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/newProduct.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/main.js" defer></script>
    <script src="scriptsServer/product_upload.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
    

    

</head>

<body class="">
    
<?php include 'errorDisplay.php' ?>
<?php include 'header.php' ?>

    <!-- main section -->
    <main class="main">
        <div class="card feildBox">
            <h3>Upload product</h3>
            <form action="#" class="formFeild" enctype='multipart/form-data'>
                <div class="formContainers flexBox">
                    <div class="feildBox" max-val="MAX: 20">
                        <input type="text" name="productName" class="productName" required>
                        <span>Product Name</span>
                    </div>
                    <div class="feildBox" max-val="MAX: 40">
                        <input type="text" name="productype" class="productype" required>
                        <span>Product type</span>
                    </div>
                    <div class="feildBox fileUpload" max-val="ONLY: JPG, PNG, JPEG, SVG">
                        <input type="file" name="ProductImg" class="ProductImg" required>
                        <span class="icon"></span>
                        <span class='txt'>upload Image</span>
                    </div>
                    <div class="feildBox" max-val="MAX: 500">
                        <textarea name="productDetails" class="productDetails" required></textarea>
                        <span>Product Details</span>
                    </div>

                    <div class="productBtn flexBox">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        $('.fileUpload input[type="file"]').on('input', function() {
            name = $(this).val().split('\\').pop().split('.')[0];
			exe =  $(this).val().split('.').pop();
            $('.fileUpload').addClass('uploaded');
            fileName = name.length < 15 ? name+' ('+exe+')' : name.slice(0, 15)+'... ('+exe+')';
            $('.fileUpload span.txt').html(fileName);
        })
    </script>

<?php
        if(!isset($_SESSION['email']))
        {
            echo "
            <script>
                alert('Sign In To Upload a Product');
                location.href='index.php';
            </script>
            ";
        }
    ?>
</body>

</html>